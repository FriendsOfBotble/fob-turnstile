<?php

return [
    'validation' => [
        'turnstile' => 'We could not verify that you are human. Please try again.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Configure Turnstile settings',
        'enable' => 'Enable Turnstile',
        'help_text' => 'Obtain your Turnstile keys from the <a>Cloudflare dashboard</a>.',
        'site_key' => 'Site Key',
        'secret_key' => 'Secret Key',
        'enable_form' => 'Enable for Form',
    ],

    'forms' => [
        'admin_login' => 'Admin login form',
        'admin_forgot_password' => 'Admin forgot password form',
        'admin_reset_password' => 'Admin reset password form',
    ],
];
