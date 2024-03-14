<?php

namespace FriendsOfBotble\Turnstile\Contracts;

interface Turnstile
{
    public function verify(string $response): array;

    public function register(string $form, string $request, string $position, string $addPosition = 'after'): void;

    public function registerAssets(): void;

    public function getSetting(string $key, mixed $default = null): mixed;
}
