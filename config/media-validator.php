<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Add a path to ffprobe binary
    |--------------------------------------------------------------------------
    |
    | Here you can add a path to the ffprobe binary, but this package
    | will automatically check for the binary in this places:
    | ffprobe, /usr/bin/ffprobe, /usr/local/bin/ffprobe,
    | avprobe, /usr/bin/avprobe, /usr/local/bin/avprobe,
    |
    */

    'ffprobe-binary' => env('FFPROBE_BINARY'),
];
