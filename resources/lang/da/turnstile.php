<?php

return [
    'validation' => [
        'turnstile' => 'Vi kunne ikke bekræfte, at du er et menneske. Prøv venligst igen.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Konfigurer Turnstile-indstillinger',
        'enable' => 'Aktiver Turnstile',
        'help_text' => 'Hent dine Turnstile-nøgler fra <a>Cloudflare dashboard</a>.',
        'site_key' => 'Webstedsnøgle',
        'secret_key' => 'Hemmelig nøgle',
        'enable_form' => 'Aktiver for formular',
    ],

    'forms' => [
        'admin_login' => 'Admin login-formular',
        'admin_forgot_password' => 'Admin glemt adgangskode-formular',
        'admin_reset_password' => 'Admin nulstil adgangskode-formular',
    ],
];
