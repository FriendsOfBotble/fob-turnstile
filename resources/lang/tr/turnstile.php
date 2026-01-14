<?php

return [
    'validation' => [
        'turnstile' => 'İnsan olduğunuzu doğrulayamadık. Lütfen tekrar deneyin.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Turnstile ayarlarını yapılandır',
        'enable' => 'Turnstile\'ı etkinleştir',
        'help_text' => '<a>Cloudflare kontrol panelinden</a> Turnstile anahtarlarınızı alın.',
        'site_key' => 'Site Anahtarı',
        'secret_key' => 'Gizli Anahtar',
        'enable_form' => 'Form için etkinleştir',
    ],

    'forms' => [
        'admin_login' => 'Yönetici giriş formu',
        'admin_forgot_password' => 'Yönetici şifremi unuttum formu',
        'admin_reset_password' => 'Yönetici şifre sıfırlama formu',
    ],
];
