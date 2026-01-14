<?php

return [
    'validation' => [
        'turnstile' => 'Ми не змогли підтвердити, що ви людина. Будь ласка, спробуйте ще раз.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Налаштування параметрів Turnstile',
        'enable' => 'Увімкнути Turnstile',
        'help_text' => 'Отримайте ключі Turnstile з <a>панелі керування Cloudflare</a>.',
        'site_key' => 'Ключ сайту',
        'secret_key' => 'Секретний ключ',
        'enable_form' => 'Увімкнути для форми',
    ],

    'forms' => [
        'admin_login' => 'Форма входу адміністратора',
        'admin_forgot_password' => 'Форма відновлення пароля адміністратора',
        'admin_reset_password' => 'Форма скидання пароля адміністратора',
    ],
];
