<?php

namespace FriendsOfBotble\Turnstile\Providers;

use Botble\ACL\Forms\Auth\ForgotPasswordForm;
use Botble\ACL\Forms\Auth\LoginForm;
use Botble\ACL\Forms\Auth\ResetPasswordForm;
use Botble\ACL\Http\Requests\ForgotPasswordRequest;
use Botble\ACL\Http\Requests\LoginRequest;
use Botble\ACL\Http\Requests\ResetPasswordRequest;
use Botble\Base\Facades\PanelSectionManager;
use Botble\Base\Forms\FormAbstract;
use Botble\Base\PanelSections\PanelSectionItem;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Setting\PanelSections\SettingOthersPanelSection;
use Botble\Support\Http\Requests\Request;
use Botble\Theme\FormFront;
use FriendsOfBotble\Turnstile\Contracts\Turnstile as TurnstileContract;
use FriendsOfBotble\Turnstile\Facades\Turnstile as TurnstileFacade;
use FriendsOfBotble\Turnstile\Forms\Fields\TurnstileField;
use FriendsOfBotble\Turnstile\Rules\Turnstile as TurnstileRule;
use FriendsOfBotble\Turnstile\Turnstile;
use Illuminate\Routing\Events\Routing;
use Illuminate\Support\Facades\Event;

class TurnstileServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
        $this->app->singleton(TurnstileContract::class, function () {
            $siteKey = setting('fob_turnstile_site_key');
            $secretKey = setting('fob_turnstile_secret_key');

            return new Turnstile($siteKey, $secretKey);
        });
    }

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/fob-turnstile')
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes()
            ->registerPanelSection()
            ->loadAndPublishConfigurations('permissions')
            ->registerTurnstile();
    }

    protected function registerPanelSection(): self
    {
        PanelSectionManager::default()->beforeRendering(function () {
            PanelSectionManager::registerItem(
                SettingOthersPanelSection::class,
                fn () => PanelSectionItem::make('turnstile')
                    ->setTitle(trans('plugins/fob-turnstile::turnstile.settings.title'))
                    ->withIcon('ti ti-mail-cog')
                    ->withPriority(10)
                    ->withDescription(trans('plugins/fob-turnstile::turnstile.settings.description'))
                    ->withRoute('turnstile.settings')
            );
        });

        return $this;
    }

    protected function registerTurnstile(): self
    {
        TurnstileFacade::registerForm(
            LoginForm::class,
            LoginRequest::class,
            trans('plugins/fob-turnstile::turnstile.forms.admin_login')
        );

        TurnstileFacade::registerForm(
            ForgotPasswordForm::class,
            ForgotPasswordRequest::class,
            trans('plugins/fob-turnstile::turnstile.forms.admin_forgot_password')
        );

        TurnstileFacade::registerForm(
            ResetPasswordForm::class,
            ResetPasswordRequest::class,
            trans('plugins/fob-turnstile::turnstile.forms.admin_reset_password')
        );

        if (! TurnstileFacade::isEnabled()) {
            return $this;
        }

        FormAbstract::beforeRendering(function (FormAbstract $form): void {
            $fieldKey = 'submit';

            if ($form instanceof FormFront) {
                $fieldKey = $form->has($fieldKey) ? $fieldKey : array_key_last($form->getFields());
            }

            if (! TurnstileFacade::isEnabledForForm($form::class)) {
                return;
            }

            $form->addBefore(
                $fieldKey,
                'turnstile',
                TurnstileField::class
            );
        });

        Event::listen(Routing::class, function () {
            add_filter('core_request_rules', function (array $rules, Request $request) {
                TurnstileFacade::getForms();

                if (TurnstileFacade::isEnabledForForm(
                    TurnstileFacade::getFormByRequest($request::class)
                )) {
                    $rules['cf-turnstile-response'] = [new TurnstileRule()];
                }

                return $rules;
            }, 999, 2);

            add_filter('core_request_attributes', function (array $attributes, Request $request) {
                TurnstileFacade::getForms();

                if (TurnstileFacade::isEnabledForForm(
                    TurnstileFacade::getFormByRequest($request::class)
                )) {
                    $attributes['cf-turnstile-response'] = 'Turnstile';
                }

                return $attributes;
            }, 999, 2);
        });

        return $this;
    }
}
