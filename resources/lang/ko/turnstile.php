<?php

return [
    'validation' => [
        'turnstile' => '사람인지 확인할 수 없습니다. 다시 시도해 주세요.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Turnstile 설정 구성',
        'enable' => 'Turnstile 활성화',
        'help_text' => '<a>Cloudflare 대시보드</a>에서 Turnstile 키를 얻으세요.',
        'site_key' => '사이트 키',
        'secret_key' => '비밀 키',
        'enable_form' => '양식에 활성화',
    ],

    'forms' => [
        'admin_login' => '관리자 로그인 양식',
        'admin_forgot_password' => '관리자 비밀번호 찾기 양식',
        'admin_reset_password' => '관리자 비밀번호 재설정 양식',
    ],
];
