<?php

return [
    'settings' => [
        'title' => 'Turnstile',
        'description' => 'Configure Turnstile settings',
        'help_text' => 'Obtain your Turnstile keys from the <a>Cloudflare dashboard</a>.',
        'site_key' => 'Site Key',
        'secret_key' => 'Secret Key',
        'enable_modules' => 'Enable Modules:',
        'modules' => [
            'member' => 'Member',
            'contact' => 'Contact',
            'newsletter' => 'Newsletter',
            'login' => 'Login',
            'registration' => 'Registration',
            'forgot_password' => 'Forgot Password',
        ],
    ],
];
