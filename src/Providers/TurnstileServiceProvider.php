<?php

namespace FriendsOfBotble\Turnstile\Providers;

use Botble\Base\Facades\PanelSectionManager;
use Botble\Base\Forms\FieldOptions\HtmlFieldOption;
use Botble\Base\Forms\Fields\HtmlField;
use Botble\Base\PanelSections\PanelSectionItem;
use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Member\Forms\Fronts\Auth\LoginForm;
use Botble\Member\Http\Requests\Fronts\Auth\LoginRequest;
use Botble\Setting\PanelSections\SettingOthersPanelSection;
use Botble\Support\Http\Requests\Request;
use Botble\Theme\Facades\Theme;
use FriendsOfBotble\Turnstile\Rules\Turnstile;
use Illuminate\Routing\Events\RouteMatched;

class TurnstileServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register(): void
    {
    }

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/turnstile')
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->loadRoutes();

        PanelSectionManager::default()->beforeRendering(function () {
            PanelSectionManager::registerItem(
                SettingOthersPanelSection::class,
                fn () => PanelSectionItem::make('turnstile')
                    ->setTitle(trans('plugins/turnstile::turnstile.settings.title'))
                    ->withIcon('ti ti-mail-cog')
                    ->withPriority(10)
                    ->withDescription(trans('plugins/turnstile::turnstile.settings.description'))
                    ->withRoute('turnstile.settings')
            );
        });

        $this->app['events']->listen(RouteMatched::class, function () {
            $siteKey = setting('fob_turnstile_site_key');

            Theme::asset()
                ->container('header')
                ->usePath(false)
                ->add('turnstile-js', 'https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit', attributes: [
                    'rel' => 'preload',
                ]);

            LoginForm::extend(function (LoginForm $form) {
                $form->addAfter(
                    'password',
                    'turnstile',
                    HtmlField::class,
                    HtmlFieldOption::make()
                        ->content('<input type="hidden" name="turnstile"><div class="mb-3 cf-turnstile"></div>')
                        ->toArray()
                );
            });

            Theme::asset()
                ->container('footer')
                ->writeContent(
                    'turnstile-script',
                    view('plugins/turnstile::script', compact('siteKey'))->render()
                );

            add_filter('core_request_rules', function (array $rules, Request $request) {
                if ($request instanceof LoginRequest) {
                    $rules['turnstile'] = [new Turnstile()];
                }

                return $rules;
            }, 1, 2);
        });
    }
}
