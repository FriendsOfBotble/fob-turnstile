<?php

return [
    'validation' => [
        'turnstile' => 'Vi kunde inte verifiera att du är människa. Försök igen.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Konfigurera Turnstile-inställningar',
        'enable' => 'Aktivera Turnstile',
        'help_text' => 'Hämta dina Turnstile-nycklar från <a>Cloudflare-instrumentpanelen</a>.',
        'site_key' => 'Webbplatsnyckel',
        'secret_key' => 'Hemlig nyckel',
        'enable_form' => 'Aktivera för formulär',
    ],

    'forms' => [
        'admin_login' => 'Admin-inloggningsformulär',
        'admin_forgot_password' => 'Admin glömt lösenord-formulär',
        'admin_reset_password' => 'Admin återställ lösenord-formulär',
    ],
];
