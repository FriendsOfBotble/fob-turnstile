<?php

namespace FriendsOfBotble\Turnstile\Providers;

use Botble\Base\Facades\PanelSectionManager;
use Botble\Base\PanelSections\PanelSectionItem;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Member\Forms\Fronts\Auth\LoginForm;
use Botble\Member\Http\Requests\Fronts\Auth\LoginRequest;
use Botble\Setting\PanelSections\SettingOthersPanelSection;
use Botble\Support\Http\Requests\Request;
use FriendsOfBotble\Turnstile\Contracts\Turnstile as TurnstileContract;
use FriendsOfBotble\Turnstile\Forms\Fields\TurnstileField;
use FriendsOfBotble\Turnstile\Rules\Turnstile as TurnstileRule;
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
            ->loadRoutes();

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

        $this->app['events']->listen(RouteMatched::class, function () {
            LoginForm::extend(function (LoginForm $form) {
                $form->addAfter('password', 'turnstile', TurnstileField::class);
            });

            add_filter('core_request_rules', function (array $rules, Request $request) {
                if ($request instanceof LoginRequest) {
                    $rules['turnstile'] = [new TurnstileRule()];
                }

                return $rules;
            }, 1, 2);
        });
    }
}
