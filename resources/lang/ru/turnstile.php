<?php

return [
    'validation' => [
        'turnstile' => 'Мы не смогли подтвердить, что вы человек. Пожалуйста, попробуйте снова.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Настройка параметров Turnstile',
        'enable' => 'Включить Turnstile',
        'help_text' => 'Получите ключи Turnstile в <a>панели управления Cloudflare</a>.',
        'site_key' => 'Ключ сайта',
        'secret_key' => 'Секретный ключ',
        'enable_form' => 'Включить для формы',
    ],

    'forms' => [
        'admin_login' => 'Форма входа администратора',
        'admin_forgot_password' => 'Форма восстановления пароля администратора',
        'admin_reset_password' => 'Форма сброса пароля администратора',
    ],
];
