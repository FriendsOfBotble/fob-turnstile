<?php

return [
    'validation' => [
        'turnstile' => 'ვერ დავადასტურეთ, რომ ადამიანი ხართ. გთხოვთ, სცადოთ ხელახლა.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Turnstile-ის პარამეტრების კონფიგურაცია',
        'enable' => 'Turnstile-ის ჩართვა',
        'help_text' => 'მიიღეთ თქვენი Turnstile გასაღებები <a>Cloudflare-ის პანელიდან</a>.',
        'site_key' => 'საიტის გასაღები',
        'secret_key' => 'საიდუმლო გასაღები',
        'enable_form' => 'ჩართვა ფორმისთვის',
    ],

    'forms' => [
        'admin_login' => 'ადმინის შესვლის ფორმა',
        'admin_forgot_password' => 'ადმინის პაროლის დავიწყების ფორმა',
        'admin_reset_password' => 'ადმინის პაროლის აღდგენის ფორმა',
    ],
];
