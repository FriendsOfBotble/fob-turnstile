<?php

return [
    'validation' => [
        'turnstile' => 'Não foi possível verificar que você é humano. Por favor, tente novamente.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Configurar configurações do Turnstile',
        'enable' => 'Habilitar Turnstile',
        'help_text' => 'Obtenha suas chaves Turnstile no <a>painel do Cloudflare</a>.',
        'site_key' => 'Chave do site',
        'secret_key' => 'Chave secreta',
        'enable_form' => 'Habilitar para formulário',
    ],

    'forms' => [
        'admin_login' => 'Formulário de login do administrador',
        'admin_forgot_password' => 'Formulário de senha esquecida do administrador',
        'admin_reset_password' => 'Formulário de redefinição de senha do administrador',
    ],
];
