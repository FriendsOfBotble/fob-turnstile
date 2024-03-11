<?php

namespace FriendsOfBotble\Turnstile\Forms\Settings;

use Botble\Base\Forms\FieldOptions\AlertFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\AlertField;
use Botble\Base\Forms\Fields\TextField;
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
            );
    }
}
