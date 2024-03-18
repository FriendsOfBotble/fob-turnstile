<?php

namespace FriendsOfBotble\Turnstile;

use Botble\Base\Forms\FormAbstract;
use Botble\Support\Http\Requests\Request;
use Botble\Theme\Facades\Theme;
use FriendsOfBotble\Turnstile\Contracts\Turnstile as TurnstileContract;
use FriendsOfBotble\Turnstile\Forms\Fields\TurnstileField;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;

class Turnstile implements TurnstileContract
{
    public function __construct(
        protected ?string $siteKey,
        protected ?string $secretKey,
    ) {
    }

    public function isEnabled(): bool
    {
        return ! empty($this->siteKey) && ! empty($this->secretKey);
    }

    public function verify(string $response): array
    {
        return Http::asForm()
            ->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret' => $this->secretKey,
                'response' => $response,
            ])->json();
    }

    public function register(string $form, string $request, string $position, string $addPosition = 'after'): void
    {
        if (! is_subclass_of($form, FormAbstract::class)) {
            throw new InvalidArgumentException(sprintf('The form must be an instance of %s', FormAbstract::class));
        }

        if (! is_subclass_of($request, Request::class)) {
            throw new InvalidArgumentException(sprintf('The request must be an instance of %s', Request::class));
        }

        $form::extend(function (FormAbstract $form) use ($position, $addPosition) {
            $addPosition = ucfirst($addPosition);

            $form->{"add$addPosition"}($position, 'turnstile', TurnstileField::class);
        });

        add_filter('core_request_rules', function (array $rules, $r) use ($request) {
            if ($r instanceof $request) {
                $rules['cf-turnstile-response'] = [new Rules\Turnstile()];
            }

            return $rules;
        }, 999, 2);
    }

    public function registerAssets(): void
    {
        Theme::asset()
            ->container('footer')
            ->writeContent(
                'turnstile-script',
                view('plugins/fob-turnstile::script', ['siteKey' => $this->siteKey])->render(),
                ['jquery']
            );
    }

    public function getSettingKey(string $key): string
    {
        return "fob_turnstile_$key";
    }

    public function getSetting(string $key, mixed $default = null): mixed
    {
        return setting($this->getSettingKey($key), $default);
    }
}
