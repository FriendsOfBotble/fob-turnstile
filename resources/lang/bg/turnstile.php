<?php

return [
    'validation' => [
        'turnstile' => 'Не успяхме да потвърдим, че сте човек. Моля, опитайте отново.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Конфигуриране на настройките на Turnstile',
        'enable' => 'Активиране на Turnstile',
        'help_text' => 'Получете вашите Turnstile ключове от <a>таблото за управление на Cloudflare</a>.',
        'site_key' => 'Ключ на сайта',
        'secret_key' => 'Таен ключ',
        'enable_form' => 'Активиране за формуляр',
    ],

    'forms' => [
        'admin_login' => 'Формуляр за вход на администратор',
        'admin_forgot_password' => 'Формуляр за забравена парола на администратор',
        'admin_reset_password' => 'Формуляр за нулиране на парола на администратор',
    ],
];
