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
use FriendsOfBotble\Turnstile\Facades\Turnstile;
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
                    ->content(str_replace(
                        '<a>',
                        '<a href="https://dash.cloudflare.com/sign-up?to=/:account/turnstile" target="_blank">',
                        trans('plugins/fob-turnstile::turnstile.settings.help_text')
                    ))
                    ->toArray()
            )
            ->add(
                Turnstile::getSettingKey('site_key'),
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-turnstile::turnstile.settings.site_key'))
                    ->value(Turnstile::getSetting('site_key'))
                    ->toArray()
            )
            ->add(
                Turnstile::getSettingKey('secret_key'),
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-turnstile::turnstile.settings.secret_key'))
                    ->value(Turnstile::getSetting('secret_key'))
                    ->toArray()
            )
            ->addCollapsible(
                FormCollapse::make('settings')
                    ->targetField(
                        Turnstile::getSettingKey('enabled'),
                        OnOffField::class,
                        OnOffFieldOption::make()
                            ->label(trans('plugins/fob-turnstile::turnstile.settings.enable'))
                            ->value(Turnstile::isEnabled())
                            ->toArray(),
                    )
                    ->isOpened(Turnstile::isEnabled())
                    ->fieldset(function (FormAbstract $form) {
                        $form->add(
                            Turnstile::getSettingKey('enable_form_label'),
                            LabelField::class,
                            LabelFieldOption::make()
                                ->label(trans('plugins/fob-turnstile::turnstile.settings.enable_form'))
                                ->toArray()
                        );
                        foreach (Turnstile::getForms() as $form => $title) {
                            $this->add(
                                Turnstile::getFormSettingKey($form),
                                OnOffField::class,
                                OnOffFieldOption::make()
                                    ->label($title)
                                    ->value(Turnstile::isEnabledForForm($form))
                                    ->toArray()
                            );
                        }
                    })
            );
    }
}
