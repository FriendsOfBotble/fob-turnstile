<?php

namespace FriendsOfBotble\Turnstile\Forms\Fields;

use Botble\Base\Forms\FormField;

class TurnstileField extends FormField
{
    public function render(array $options = [], $showLabel = true, $showField = true, $showError = true): string
    {
        return parent::render($options, $showLabel, $showField, $showError)
            . view('plugins/fob-turnstile::script', ['siteKey' => setting('fob_turnstile_site_key')])->render();
    }

    protected function getTemplate(): string
    {
        return 'plugins/fob-turnstile::forms.fields.turnstile';
    }
}
