<?php

return [
    'validation' => [
        'turnstile' => 'あなたが人間であることを確認できませんでした。もう一度お試しください。',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Turnstile設定を構成する',
        'enable' => 'Turnstileを有効にする',
        'help_text' => '<a>Cloudflareダッシュボード</a>からTurnstileキーを取得してください。',
        'site_key' => 'サイトキー',
        'secret_key' => 'シークレットキー',
        'enable_form' => 'フォームに対して有効にする',
    ],

    'forms' => [
        'admin_login' => '管理者ログインフォーム',
        'admin_forgot_password' => '管理者パスワード忘れフォーム',
        'admin_reset_password' => '管理者パスワードリセットフォーム',
    ],
];
