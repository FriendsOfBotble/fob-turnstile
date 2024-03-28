<?php

namespace FriendsOfBotble\Turnstile;

use Botble\Theme\FormFrontManager;
use FriendsOfBotble\Turnstile\Contracts\Turnstile as TurnstileContract;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Turnstile implements TurnstileContract
{
    protected array $forms = [];

    protected array $requests = [];

    public function __construct(
        protected ?string $siteKey,
        protected ?string $secretKey,
    ) {
    }

    public function registerForm(string $form, string $request, string $title): static
    {
        $this->forms[$form] = $title;
        $this->requests[$form] = $request;

        return $this;
    }

    public function getForms(): array
    {
        foreach (FormFrontManager::forms() as $form) {
            $this->registerForm($form, FormFrontManager::formRequestOf($form), $form::formTitle());
        }

        return $this->forms;
    }

    public function isEnabled(): bool
    {
        return (bool) $this->getSetting('enabled', false) && ! empty($this->siteKey) && ! empty($this->secretKey);
    }

    public function isEnabledForForm(string $form): bool
    {
        return (bool) setting($this->getFormSettingKey($form), false);
    }

    public function getFormByRequest(string $request): string
    {
        return array_search($request, $this->requests, true);
    }

    public function getFormSettingKey(string $form): string
    {
        return $this->getSettingKey(sprintf('%s_%s', str_replace('\\', '', Str::snake($form)), 'enabled'));
    }

    public function verify(string $response): array
    {
        return Http::asForm()
            ->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret' => $this->secretKey,
                'response' => $response,
            ])->json();
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
