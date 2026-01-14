<?php

return [
    'validation' => [
        'turnstile' => 'Nepodarilo sa nám overiť, že ste človek. Skúste to znova.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Konfigurovať nastavenia Turnstile',
        'enable' => 'Povoliť Turnstile',
        'help_text' => 'Získajte svoje kľúče Turnstile z <a>ovládacieho panela Cloudflare</a>.',
        'site_key' => 'Kľúč stránky',
        'secret_key' => 'Tajný kľúč',
        'enable_form' => 'Povoliť pre formulár',
    ],

    'forms' => [
        'admin_login' => 'Prihlasovací formulár administrátora',
        'admin_forgot_password' => 'Formulár zabudnutého hesla administrátora',
        'admin_reset_password' => 'Formulár obnovenia hesla administrátora',
    ],
];
