<?php

return [
    'service' => 'send_pulse',

    'services' => [
        'send_pulse' => [
            'from' => [
                'email' => env('SEND_PULSE_FROM_ADDRESS', env('MAIL_FROM_ADDRESS')),
                'name' => env('SEND_PULSE_FROM_NAME', env('MAIL_FROM_NAME', 'Send Pulse')),
            ],
            'base_url' => env('SEND_PULSE_BASE_URL', 'https://api.sendpulse.com'),
            'grant_type' => 'client_credentials',
            'client_id' => env('SEND_PULSE_CLIENT_ID'),
            'client_secret' => env('SEND_PULSE_CLIENT_SECRET'),

            'service_class' => \Areeb\EmailService\Services\SendEmail\SendPulseService::class,
        ],
    ],

];
