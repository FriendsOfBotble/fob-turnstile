<?php

return [
    'validation' => [
        'turnstile' => 'เราไม่สามารถยืนยันได้ว่าคุณเป็นมนุษย์ กรุณาลองอีกครั้ง',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'กำหนดค่าการตั้งค่า Turnstile',
        'enable' => 'เปิดใช้งาน Turnstile',
        'help_text' => 'รับคีย์ Turnstile ของคุณจาก<a>แดชบอร์ด Cloudflare</a>',
        'site_key' => 'คีย์เว็บไซต์',
        'secret_key' => 'คีย์ลับ',
        'enable_form' => 'เปิดใช้งานสำหรับแบบฟอร์ม',
    ],

    'forms' => [
        'admin_login' => 'แบบฟอร์มเข้าสู่ระบบผู้ดูแล',
        'admin_forgot_password' => 'แบบฟอร์มลืมรหัสผ่านผู้ดูแล',
        'admin_reset_password' => 'แบบฟอร์มรีเซ็ตรหัสผ่านผู้ดูแล',
    ],
];
