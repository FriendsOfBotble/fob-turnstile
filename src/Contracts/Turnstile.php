<?php

namespace FriendsOfBotble\Turnstile\Contracts;

interface Turnstile
{
    public function verify(string $response): array;

    public function registerAssets(): void;
}
