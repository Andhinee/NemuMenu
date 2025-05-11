<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'oracle'), // Ubah default ke 'oracle'

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Only keep Oracle here, ignore MySQL or others.
    |
    */

    'connections' => [
        'oracle' => [
            'driver'         => 'oracle',
            'tns'            => env('DB_TNS', ''),
            'host'           => env('DB_HOST', 'localhost'),
            'port'           => env('DB_PORT', '1521'),
            'database'       => env('DB_DATABASE', 'NemuMenu'),
            'username'       => env('DB_USERNAME', 'nemu_menu_user'),
            'password'       => env('DB_PASSWORD', 'kelompok1'),
            'charset'        => 'AL32UTF8',
            'prefix'         => '',
            'service_name'   => env('DB_SERVICE_NAME', 'xepdb1'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',
];
