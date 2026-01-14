<?php

return [
    'validation' => [
        'turnstile' => '我們無法驗證您是人類。請重試。',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => '配置 Turnstile 設定',
        'enable' => '啟用 Turnstile',
        'help_text' => '從 <a>Cloudflare 控制面板</a>獲取您的 Turnstile 密鑰。',
        'site_key' => '網站密鑰',
        'secret_key' => '密鑰',
        'enable_form' => '為表單啟用',
    ],

    'forms' => [
        'admin_login' => '管理員登入表單',
        'admin_forgot_password' => '管理員忘記密碼表單',
        'admin_reset_password' => '管理員重設密碼表單',
    ],
];
