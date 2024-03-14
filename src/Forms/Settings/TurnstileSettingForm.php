<?php

namespace FriendsOfBotble\Turnstile\Forms\Settings;

use Botble\Base\Forms\FieldOptions\AlertFieldOption;
use Botble\Base\Forms\FieldOptions\LabelFieldOption;
use Botble\Base\Forms\FieldOptions\OnOffFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\AlertField;
use Botble\Base\Forms\Fields\LabelField;
use Botble\Base\Forms\Fields\OnOffField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;
use Botble\Base\Forms\FormCollapse;
use Botble\Setting\Forms\SettingForm;
use FriendsOfBotble\Turnstile\Http\Requests\Settings\TurnstileSettingRequest;

class TurnstileSettingForm extends SettingForm
{
    public function setup(): void
    {
        parent::setup();

        $this
            ->setUrl(route('turnstile.settings'))
            ->setSectionTitle(trans('plugins/fob-turnstile::turnstile.settings.title'))
            ->setSectionDescription(trans('plugins/fob-turnstile::turnstile.settings.description'))
            ->setValidatorClass(TurnstileSettingRequest::class)
            ->add(
                'description',
                AlertField::class,
                AlertFieldOption::make()
                    ->content(
                        str_replace(
                            '<a>',
                            '<a href="https://dash.cloudflare.com/sign-up?to=/:account/turnstile" target="_blank">',
                            trans('plugins/fob-turnstile::turnstile.settings.help_text')
                        )
                    )
                    ->toArray()
            )
            ->add(
                'fob_turnstile_site_key',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-turnstile::turnstile.settings.site_key'))
                    ->value(setting('fob_turnstile_site_key'))
                    ->toArray()
            )
            ->add(
                'fob_turnstile_secret_key',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-turnstile::turnstile.settings.secret_key'))
                    ->value(setting('fob_turnstile_secret_key'))
                    ->toArray()
            )
            ->add(
                'fob_turnstile_modules',
                LabelField::class,
                LabelFieldOption::make()
                    ->label(trans('plugins/fob-turnstile::turnstile.settings.enable_modules'))
                    ->toArray()
            )
            ->addCollapsible(
                FormCollapse::make('fob-turnstile-member-settings')
                    ->targetField(
                        'fob_turnstile_member_enabled',
                        OnOffField::class,
                        OnOffFieldOption::make()
                            ->label(trans('plugins/fob-turnstile::turnstile.settings.member'))
                            ->value(setting('fob_turnstile_member_enabled'))
                    )
                    ->fieldset(function (TurnstileSettingForm $form) {
                        $form
                            ->add(
                                'fob_turnstile_member_login_enabled',
                                OnOffField::class,
                                OnOffFieldOption::make()
                                    ->label(trans('plugins/fob-turnstile::turnstile.settings.modules.login'))
                                    ->toArray(),
                            )
                            ->add(
                                'fob_turnstile_member_registration_enabled',
                                OnOffField::class,
                                OnOffFieldOption::make()
                                    ->label(trans('plugins/fob-turnstile::turnstile.settings.modules.registration'))
                                    ->toArray(),
                            )
                            ->add(
                                'fob_turnstile_member_forgot_password_enabled',
                                OnOffField::class,
                                OnOffFieldOption::make()
                                    ->label(trans('plugins/fob-turnstile::turnstile.settings.modules.forgot_password'))
                                    ->toArray(),
                            );
                    })
            )
            ->when(is_plugin_active('contact'), function (FormAbstract $form) {
                $form->add(
                    'fob_turnstile_contact_enabled',
                    OnOffField::class,
                    OnOffFieldOption::make()
                        ->label(trans('plugins/fob-turnstile::turnstile.settings.modules.contact'))
                        ->toArray()
                );
            })
            ->when(is_plugin_active('newsletter'), function (FormAbstract $form) {
                $form->add(
                    'fob_turnstile_newsletter_enabled',
                    OnOffField::class,
                    OnOffFieldOption::make()
                        ->label(trans('plugins/fob-turnstile::turnstile.settings.modules.newsletter'))
                        ->toArray()
                );
            });
    }
}
