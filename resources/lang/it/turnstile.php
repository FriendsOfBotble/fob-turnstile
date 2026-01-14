<?php

return [
    'validation' => [
        'turnstile' => 'Non siamo riusciti a verificare che sei un essere umano. Per favore riprova.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Configura le impostazioni di Turnstile',
        'enable' => 'Abilita Turnstile',
        'help_text' => 'Ottieni le tue chiavi Turnstile dalla <a>dashboard di Cloudflare</a>.',
        'site_key' => 'Chiave del sito',
        'secret_key' => 'Chiave segreta',
        'enable_form' => 'Abilita per modulo',
    ],

    'forms' => [
        'admin_login' => 'Modulo di accesso amministratore',
        'admin_forgot_password' => 'Modulo password dimenticata amministratore',
        'admin_reset_password' => 'Modulo reimpostazione password amministratore',
    ],
];
