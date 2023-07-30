<?php

return [
    'paths' => [
        resource_path('views'),
    ],

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        config('app.env') == 'production' ? $_SERVER['HOME'] . '/.nddapp-cli/framework/views' : realpath(storage_path('framework/views'))
    ),
];
