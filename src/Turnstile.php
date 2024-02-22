<?php

namespace FriendsOfBotble\Turnstile;

use Illuminate\Support\Facades\Http;

class Turnstile
{
    public function verify(string $response): array
    {
        return Http::asForm()
            ->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret' => setting('fob_turnstile_secret_key'),
                'response' => $response,
            ])
            ->json();
    }
}
