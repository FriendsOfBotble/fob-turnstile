<?php

namespace FriendsOfBotble\Turnstile\Http\Requests\Settings;

use Botble\Base\Rules\OnOffRule;
use Botble\Support\Http\Requests\Request;

class TurnstileSettingRequest extends Request
{
    public function rules(): array
    {
        return [
            'fob_turnstile_site_key' => ['nullable', 'string'],
            'fob_turnstile_secret_key' => ['nullable', 'string'],
            'fob_turnstile_member_enabled' => [new OnOffRule()],
            'fob_turnstile_member_login_enabled' => [new OnOffRule()],
            'fob_turnstile_member_registration_enabled' => [new OnOffRule()],
            'fob_turnstile_member_forgot_password_enabled' => [new OnOffRule()],
        ];
    }
}
