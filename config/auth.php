<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'walikela' => [
            'driver' => 'session',
            'provider' => 'walikelas',
        ],

        'walikelass' => [
            'driver' => 'session',
            'provider' => 'walikelasses',
        ],

        'kepalasekolah' => [
            'driver' => 'session',
            'provider' => 'kepalasekolahs',
        ],

        'siswa' => [
            'driver' => 'session',
            'provider' => 'siswas',
        ],

        'walimurid' => [
            'driver' => 'session',
            'provider' => 'walimurids',
        ],

        'timketertiban' => [
            'driver' => 'session',
            'provider' => 'timketertibans',
        ],

        'bk' => [
            'driver' => 'session',
            'provider' => 'bks',
        ],

        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'walikelas' => [
            'driver' => 'eloquent',
            'model' => App\Walikela::class,
        ],

        'walikelasses' => [
            'driver' => 'eloquent',
            'model' => App\Walikelass::class,
        ],

        'kepalasekolahs' => [
            'driver' => 'eloquent',
            'model' => App\Kepalasekolah::class,
        ],

        'siswas' => [
            'driver' => 'eloquent',
            'model' => App\Siswa::class,
        ],

        'walimurids' => [
            'driver' => 'eloquent',
            'model' => App\Walimurid::class,
        ],

        'timketertibans' => [
            'driver' => 'eloquent',
            'model' => App\Timketertiban::class,
        ],

        'bks' => [
            'driver' => 'eloquent',
            'model' => App\Bk::class,
        ],

        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'walikelas' => [
            'provider' => 'walikelas',
            'table' => 'walikela_password_resets',
            'expire' => 60,
        ],

        'walikelasses' => [
            'provider' => 'walikelasses',
            'table' => 'walikelass_password_resets',
            'expire' => 60,
        ],

        'kepalasekolahs' => [
            'provider' => 'kepalasekolahs',
            'table' => 'kepalasekolah_password_resets',
            'expire' => 60,
        ],

        'siswas' => [
            'provider' => 'siswas',
            'table' => 'siswa_password_resets',
            'expire' => 60,
        ],

        'walimurids' => [
            'provider' => 'walimurids',
            'table' => 'walimurid_password_resets',
            'expire' => 60,
        ],

        'timketertibans' => [
            'provider' => 'timketertibans',
            'table' => 'timketertiban_password_resets',
            'expire' => 60,
        ],

        'bks' => [
            'provider' => 'bks',
            'table' => 'bk_password_resets',
            'expire' => 60,
        ],

        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
