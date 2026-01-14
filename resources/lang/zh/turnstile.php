<?php

return [
    'validation' => [
        'turnstile' => '我们无法验证您是人类。请重试。',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => '配置 Turnstile 设置',
        'enable' => '启用 Turnstile',
        'help_text' => '从 <a>Cloudflare 控制面板</a>获取您的 Turnstile 密钥。',
        'site_key' => '站点密钥',
        'secret_key' => '密钥',
        'enable_form' => '为表单启用',
    ],

    'forms' => [
        'admin_login' => '管理员登录表单',
        'admin_forgot_password' => '管理员忘记密码表单',
        'admin_reset_password' => '管理员重置密码表单',
    ],
];
