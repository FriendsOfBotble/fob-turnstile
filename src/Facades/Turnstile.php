<?php

namespace FriendsOfBotble\Turnstile\Facades;

use FriendsOfBotble\Turnstile\Contracts\Turnstile as TurnstileContract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static array verify(string $response)
 * @method static void registerAssets()
 *
 * @see \FriendsOfBotble\Turnstile\Turnstile
 */
class Turnstile extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return TurnstileContract::class;
    }
}
