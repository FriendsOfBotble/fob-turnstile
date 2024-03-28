<?php

namespace FriendsOfBotble\Turnstile\Contracts;

interface Turnstile
{
    public function registerForm(string $form, string $request, string $title): static;

    public function getForms(): array;

    public function isEnabled(): bool;

    public function isEnabledForForm(string $form): bool;

    public function getFormByRequest(string $request): ?string;

    public function getFormSettingKey(string $form): string;

    public function verify(string $response): array;

    public function getSetting(string $key, mixed $default = null): mixed;
}
