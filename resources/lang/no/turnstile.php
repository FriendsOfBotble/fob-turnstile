<?php

return [
    'validation' => [
        'turnstile' => 'Vi kunne ikke bekrefte at du er et menneske. Vennligst prøv igjen.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Konfigurer Turnstile-innstillinger',
        'enable' => 'Aktiver Turnstile',
        'help_text' => 'Hent Turnstile-nøklene dine fra <a>Cloudflare-dashbordet</a>.',
        'site_key' => 'Nettstedsnøkkel',
        'secret_key' => 'Hemmelig nøkkel',
        'enable_form' => 'Aktiver for skjema',
    ],

    'forms' => [
        'admin_login' => 'Admin påloggingsskjema',
        'admin_forgot_password' => 'Admin glemt passord-skjema',
        'admin_reset_password' => 'Admin tilbakestill passord-skjema',
    ],
];
