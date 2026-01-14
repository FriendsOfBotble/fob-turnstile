<?php

return [
    'validation' => [
        'turnstile' => 'Nepavyko patvirtinti, kad esate žmogus. Bandykite dar kartą.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Konfigūruoti Turnstile nustatymus',
        'enable' => 'Įjungti Turnstile',
        'help_text' => 'Gaukite savo Turnstile raktus iš <a>Cloudflare valdymo skydelio</a>.',
        'site_key' => 'Svetainės raktas',
        'secret_key' => 'Slaptas raktas',
        'enable_form' => 'Įjungti formai',
    ],

    'forms' => [
        'admin_login' => 'Administratoriaus prisijungimo forma',
        'admin_forgot_password' => 'Administratoriaus pamiršto slaptažodžio forma',
        'admin_reset_password' => 'Administratoriaus slaptažodžio atstatymo forma',
    ],
];
