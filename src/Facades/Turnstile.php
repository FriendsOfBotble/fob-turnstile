<?php

namespace FriendsOfBotble\Turnstile\Facades;

use FriendsOfBotble\Turnstile\Contracts\Turnstile as TurnstileContract;
use Illuminate\Support\Facades\Facade;

/**
 * @method static bool isEnabled()
 * @method static array verify(string $response)
 * @method static void register(string $form, string $request, string $position, string $addPosition = 'after')
 * @method static void registerAssets()
 * @method static string getSettingKey(string $key)
 * @method static mixed getSetting(string $key, mixed $default)
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
