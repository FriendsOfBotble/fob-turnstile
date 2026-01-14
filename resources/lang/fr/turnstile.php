<?php

return [
    'validation' => [
        'turnstile' => 'Nous n\'avons pas pu vérifier que vous êtes humain. Veuillez réessayer.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Configurer les paramètres Turnstile',
        'enable' => 'Activer Turnstile',
        'help_text' => 'Obtenez vos clés Turnstile depuis le <a>tableau de bord Cloudflare</a>.',
        'site_key' => 'Clé du site',
        'secret_key' => 'Clé secrète',
        'enable_form' => 'Activer pour le formulaire',
    ],

    'forms' => [
        'admin_login' => 'Formulaire de connexion administrateur',
        'admin_forgot_password' => 'Formulaire de mot de passe oublié administrateur',
        'admin_reset_password' => 'Formulaire de réinitialisation du mot de passe administrateur',
    ],
];
