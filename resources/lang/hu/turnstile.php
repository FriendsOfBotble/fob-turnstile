<?php

return [
    'validation' => [
        'turnstile' => 'Nem sikerült ellenőrizni, hogy ember vagy. Kérjük, próbáld újra.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Turnstile beállítások konfigurálása',
        'enable' => 'Turnstile engedélyezése',
        'help_text' => 'Szerezd meg a Turnstile kulcsaidat a <a>Cloudflare vezérlőpultról</a>.',
        'site_key' => 'Webhelykulcs',
        'secret_key' => 'Titkos kulcs',
        'enable_form' => 'Engedélyezés űrlaphoz',
    ],

    'forms' => [
        'admin_login' => 'Admin bejelentkezési űrlap',
        'admin_forgot_password' => 'Admin elfelejtett jelszó űrlap',
        'admin_reset_password' => 'Admin jelszó visszaállítási űrlap',
    ],
];
