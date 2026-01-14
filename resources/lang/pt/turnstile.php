<?php

return [
    'validation' => [
        'turnstile' => 'Não foi possível verificar que você é humano. Por favor, tente novamente.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Configurar definições do Turnstile',
        'enable' => 'Ativar Turnstile',
        'help_text' => 'Obtenha as suas chaves Turnstile no <a>painel do Cloudflare</a>.',
        'site_key' => 'Chave do site',
        'secret_key' => 'Chave secreta',
        'enable_form' => 'Ativar para formulário',
    ],

    'forms' => [
        'admin_login' => 'Formulário de login do administrador',
        'admin_forgot_password' => 'Formulário de palavra-passe esquecida do administrador',
        'admin_reset_password' => 'Formulário de redefinição de palavra-passe do administrador',
    ],
];
