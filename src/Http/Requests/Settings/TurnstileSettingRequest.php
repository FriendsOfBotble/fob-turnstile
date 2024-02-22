<?php

namespace FriendsOfBotble\Turnstile\Http\Requests\Settings;

use Botble\Support\Http\Requests\Request;

class TurnstileSettingRequest extends Request
{
    public function rules(): array
    {
        return [
            'fob_turnstile_site_key' => ['string'],
            'fob_turnstile_secret_key' => ['string'],
        ];
    }
}
