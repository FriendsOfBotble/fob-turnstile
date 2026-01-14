<?php

return [
    'validation' => [
        'turnstile' => 'Me ei suutnud kinnitada, et olete inimene. Palun proovige uuesti.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Turnstile seadete konfigureerimine',
        'enable' => 'Luba Turnstile',
        'help_text' => 'Hankige oma Turnstile võtmed <a>Cloudflare juhtpaneelist</a>.',
        'site_key' => 'Saidi võti',
        'secret_key' => 'Salajane võti',
        'enable_form' => 'Luba vormi jaoks',
    ],

    'forms' => [
        'admin_login' => 'Administraatori sisselogimise vorm',
        'admin_forgot_password' => 'Administraatori unustatud parooli vorm',
        'admin_reset_password' => 'Administraatori parooli lähtestamise vorm',
    ],
];
