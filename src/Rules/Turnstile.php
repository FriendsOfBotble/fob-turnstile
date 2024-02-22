<?php

namespace FriendsOfBotble\Turnstile\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Turnstile implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $secretKey = setting('fob_turnstile_secret_key');

        if (!is_string($value) || !is_string($secretKey)) {
            $fail('The :attribute is invalid.');
        }

        if ((new \FriendsOfBotble\Turnstile\Turnstile())->verify($value)['success'] !== true) {
            $fail("We couldn't verify if you're a robot or not. Please refresh the page and try again.");
        }
    }
}
