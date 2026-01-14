<?php

return [
    'validation' => [
        'turnstile' => 'Kami tidak dapat memverifikasi bahwa Anda adalah manusia. Silakan coba lagi.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Konfigurasi pengaturan Turnstile',
        'enable' => 'Aktifkan Turnstile',
        'help_text' => 'Dapatkan kunci Turnstile Anda dari <a>dasbor Cloudflare</a>.',
        'site_key' => 'Kunci Situs',
        'secret_key' => 'Kunci Rahasia',
        'enable_form' => 'Aktifkan untuk Formulir',
    ],

    'forms' => [
        'admin_login' => 'Formulir login admin',
        'admin_forgot_password' => 'Formulir lupa kata sandi admin',
        'admin_reset_password' => 'Formulir reset kata sandi admin',
    ],
];
