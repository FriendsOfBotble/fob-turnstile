<?php

namespace FriendsOfBotble\Turnstile\Forms\Settings;

use Botble\Base\Forms\FieldOptions\AlertFieldOption;
use Botble\Base\Forms\FieldOptions\CheckboxFieldOption;
use Botble\Base\Forms\FieldOptions\HtmlFieldOption;
use Botble\Base\Forms\FieldOptions\OnOffFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\AlertField;
use Botble\Base\Forms\Fields\HtmlField;
use Botble\Base\Forms\Fields\OnOffCheckboxField;
use Botble\Base\Forms\Fields\OnOffField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormCollapse;
use Botble\Setting\Forms\SettingForm;
use Botble\SocialLogin\Forms\SocialLoginSettingForm;
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
            ->addCollapsible(
                FormCollapse::make('fob-turnstile-member-settings')
                    ->targetField(
                        'fob_turnstile_enable',
                        OnOffField::class,
                        OnOffFieldOption::make()
                            ->label(trans('plugins/fob-turnstile::turnstile.settings.member'))
                    )
                    ->fieldset(function (TurnstileSettingForm $form) {
                        $form
                            ->add(
                                'fob_turnstile_member_login',
                                OnOffField::class,
                                OnOffFieldOption::make()
                                    ->label(trans('plugins/fob-turnstile::turnstile.settings.login'))
                                    ->toArray(),
                            )
                            ->add(
                                'fob_turnstile_member_registration',
                                OnOffField::class,
                                OnOffFieldOption::make()
                                    ->label(trans('plugins/fob-turnstile::turnstile.settings.registration'))
                                    ->toArray(),
                            )
                            ->add(
                                'fob_turnstile_member_forgot_password',
                                OnOffField::class,
                                OnOffFieldOption::make()
                                    ->label(trans('plugins/fob-turnstile::turnstile.settings.forgot_password'))
                                    ->toArray(),
                            );
                    })
            );
    }
}
