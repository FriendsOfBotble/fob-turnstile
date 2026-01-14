<?php

return [
    'validation' => [
        'turnstile' => 'No pudimos verificar que eres humano. Por favor, inténtalo de nuevo.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Configurar ajustes de Turnstile',
        'enable' => 'Habilitar Turnstile',
        'help_text' => 'Obtén tus claves de Turnstile desde el <a>panel de Cloudflare</a>.',
        'site_key' => 'Clave del sitio',
        'secret_key' => 'Clave secreta',
        'enable_form' => 'Habilitar para formulario',
    ],

    'forms' => [
        'admin_login' => 'Formulario de inicio de sesión de administrador',
        'admin_forgot_password' => 'Formulario de contraseña olvidada de administrador',
        'admin_reset_password' => 'Formulario de restablecimiento de contraseña de administrador',
    ],
];
