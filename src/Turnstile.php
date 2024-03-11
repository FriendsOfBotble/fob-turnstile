<?php

namespace FriendsOfBotble\Turnstile;

use Botble\Theme\Facades\Theme;
use FriendsOfBotble\Turnstile\Contracts\Turnstile as TurnstileContract;
use Illuminate\Support\Facades\Http;

class Turnstile implements TurnstileContract
{
    public function __construct(
        protected string $siteKey,
        protected string $secretKey,
    ) {
    }

    public function verify(string $response): array
    {
        return Http::asForm()
            ->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret' => $this->secretKey,
                'response' => $response,
            ])->json();
    }

    public function registerAssets(): void
    {
        Theme::asset()
            ->container('header')
            ->usePath(false)
            ->add('turnstile-js', 'https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit', attributes: [
                'rel' => 'preload',
            ]);

        Theme::asset()
            ->container('footer')
            ->writeContent(
                'turnstile-script',
                view('plugins/fob-turnstile::script', ['siteKey' => $this->siteKey])->render()
            );
    }
}
