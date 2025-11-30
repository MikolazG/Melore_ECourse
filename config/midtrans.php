<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Midtrans Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi sederhana untuk Midtrans. Kita ambil dari .env supaya
    | gampang diganti antara sandbox dan production.
    |
    */

    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),

    // Server key Midtrans
    'server_key'    => env('MIDTRANS_SERVER_KEY'),

    // Client key Midtrans
    'client_key'    => env('MIDTRANS_CLIENT_KEY'),
];
