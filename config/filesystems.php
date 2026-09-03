<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application for file storage.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many filesystem disks as necessary, and you
    | may even configure multiple disks for the same driver. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'),
            // Not served via a URL — nothing in this app stores public-facing
            // files here, and its default auto-serve route would otherwise
            // collide with the "public" disk's /storage/{path} URL below.
            'serve' => false,
            'throw' => false,
            'report' => false,
        ],

        'public' => [
            'driver' => 'local',
            // Files are written directly into the public/ folder (not
            // storage/app/public via a symlink) because on the live host the
            // app is installed in a subdirectory without the docroot pointed
            // at public/, so a real file under public/storage is what
            // actually resolves at PUBLIC_STORAGE_URL_PATH — a symlink here,
            // or Laravel's own "serve" fallback route, does not (its route is
            // built from this same URL and ends up double-prefixed with the
            // subdirectory, so it can never match an incoming request).
            'root' => public_path('storage'),
            'url' => rtrim(env('APP_URL', 'http://localhost'), '/').env('PUBLIC_STORAGE_URL_PATH', '/storage'),
            'visibility' => 'public',
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
            'report' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Not used — the "public" disk above writes straight into public/storage
    | as real files, so running `storage:link` is unnecessary (and would
    | conflict with that folder already containing real uploaded files).
    |
    */

    'links' => [],

];
