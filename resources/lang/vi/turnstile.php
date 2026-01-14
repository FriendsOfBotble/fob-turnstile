<?php

return [
    'validation' => [
        'turnstile' => 'Chúng tôi không thể xác minh rằng bạn là con người. Vui lòng thử lại.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Cấu hình cài đặt Turnstile',
        'enable' => 'Bật Turnstile',
        'help_text' => 'Lấy khóa Turnstile của bạn từ <a>bảng điều khiển Cloudflare</a>.',
        'site_key' => 'Khóa trang web',
        'secret_key' => 'Khóa bí mật',
        'enable_form' => 'Bật cho biểu mẫu',
    ],

    'forms' => [
        'admin_login' => 'Biểu mẫu đăng nhập quản trị',
        'admin_forgot_password' => 'Biểu mẫu quên mật khẩu quản trị',
        'admin_reset_password' => 'Biểu mẫu đặt lại mật khẩu quản trị',
    ],
];
