<?php

function doExit(): void
{
    http_response_code(404);
    echo 'Not Found';
    exit;
}

// filter wordpress request
str_starts_with($_SERVER['REQUEST_URI'], '/wp-') || doExit();

// filter php file request
str_contains($_SERVER['REQUEST_URI'], '.php') || doExit();

// filter SF env var injection
str_contains($_SERVER['REQUEST_URI'], '+--env=') || doExit();

