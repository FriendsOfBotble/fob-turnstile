<?php

namespace FriendsOfBotble\Turnstile\Providers;

use Botble\Base\Facades\AdminHelper;
use Botble\Base\Facades\PanelSectionManager;
use Botble\Base\PanelSections\PanelSectionItem;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Contact\Forms\Fronts\ContactForm;
use Botble\Contact\Http\Requests\ContactRequest;
use Botble\Member\Forms\Fronts\Auth\LoginForm;
use Botble\Member\Http\Requests\Fronts\Auth\LoginRequest;
use Botble\Newsletter\Forms\Fronts\NewsletterForm;
use Botble\Newsletter\Http\Requests\NewsletterRequest;
use Botble\Setting\PanelSections\SettingOthersPanelSection;
use FriendsOfBotble\Turnstile\Contracts\Turnstile as TurnstileContract;
use FriendsOfBotble\Turnstile\Facades\Turnstile as TurnstileFacade;
use FriendsOfBotble\Turnstile\Turnstile;
use Illuminate\Routing\Events\RouteMatched;

class TurnstileServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
        $this->app->singleton(TurnstileContract::class, function () {
            return new Turnstile(
                setting('fob_turnstile_site_key'),
                setting('fob_turnstile_secret_key'),
            );
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
        $this->app['events']->listen(RouteMatched::class, function () {
            //            if (AdminHelper::isInAdmin(true)) {
            //                return;
            //            }

            if (is_plugin_active('member')) {
                TurnstileFacade::register(
                    LoginForm::class,
                    LoginRequest::class,
                    'password',
                );
            }

            if (is_plugin_active('contact')) {
                TurnstileFacade::register(
                    ContactForm::class,
                    ContactRequest::class,
                    'content',
                );
            }

            if (is_plugin_active('newsletter')) {
                TurnstileFacade::register(
                    NewsletterForm::class,
                    NewsletterRequest::class,
                    'submit',
                );
            }

            TurnstileFacade::register(
                \Botble\ACL\Forms\Auth\LoginForm::class,
                \Botble\ACL\Http\Requests\LoginRequest::class,
                'password',
            );
        });

        return $this;
    }
}
