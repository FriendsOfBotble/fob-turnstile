<?php

return [
    'validation' => [
        'turnstile' => 'Nie mogliśmy zweryfikować, że jesteś człowiekiem. Spróbuj ponownie.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Skonfiguruj ustawienia Turnstile',
        'enable' => 'Włącz Turnstile',
        'help_text' => 'Uzyskaj klucze Turnstile z <a>panelu Cloudflare</a>.',
        'site_key' => 'Klucz witryny',
        'secret_key' => 'Klucz tajny',
        'enable_form' => 'Włącz dla formularza',
    ],

    'forms' => [
        'admin_login' => 'Formularz logowania administratora',
        'admin_forgot_password' => 'Formularz zapomnianego hasła administratora',
        'admin_reset_password' => 'Formularz resetowania hasła administratora',
    ],
];
