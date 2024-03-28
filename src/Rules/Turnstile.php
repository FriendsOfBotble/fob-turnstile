<?php

namespace FriendsOfBotble\Turnstile\Rules;

use Closure;
use FriendsOfBotble\Turnstile\Facades\Turnstile as TurnstileFacade;
use Illuminate\Contracts\Validation\ValidationRule;

class Turnstile implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) {
            $fail(__('validation.required'));

            return;
        }

        if (TurnstileFacade::verify($value)['success'] !== true) {
            $fail(trans('plugins/fob-turnstile::turnstile.validation.turnstile'));

            return;
        }
    }
}
