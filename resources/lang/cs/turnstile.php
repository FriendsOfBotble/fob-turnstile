<?php

return [
    'validation' => [
        'turnstile' => 'Nepodařilo se nám ověřit, že jste člověk. Zkuste to prosím znovu.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Konfigurace nastavení Turnstile',
        'enable' => 'Povolit Turnstile',
        'help_text' => 'Získejte své klíče Turnstile z <a>ovládacího panelu Cloudflare</a>.',
        'site_key' => 'Klíč webu',
        'secret_key' => 'Tajný klíč',
        'enable_form' => 'Povolit pro formulář',
    ],

    'forms' => [
        'admin_login' => 'Přihlašovací formulář administrátora',
        'admin_forgot_password' => 'Formulář pro zapomenuté heslo administrátora',
        'admin_reset_password' => 'Formulář pro obnovení hesla administrátora',
    ],
];
