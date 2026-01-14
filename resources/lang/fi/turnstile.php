<?php

return [
    'validation' => [
        'turnstile' => 'Emme voineet vahvistaa, että olet ihminen. Yritä uudelleen.',
    ],

    'settings' => [
        'title' => 'FOB Turnstile',
        'description' => 'Määritä Turnstile-asetukset',
        'enable' => 'Ota Turnstile käyttöön',
        'help_text' => 'Hanki Turnstile-avaimesi <a>Cloudflare-hallintapaneelista</a>.',
        'site_key' => 'Sivuston avain',
        'secret_key' => 'Salainen avain',
        'enable_form' => 'Ota käyttöön lomakkeelle',
    ],

    'forms' => [
        'admin_login' => 'Ylläpitäjän kirjautumislomake',
        'admin_forgot_password' => 'Ylläpitäjän unohtunut salasana -lomake',
        'admin_reset_password' => 'Ylläpitäjän salasanan palautuslomake',
    ],
];
