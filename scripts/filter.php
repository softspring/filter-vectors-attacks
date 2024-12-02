<?php

function doExit(): void
{
    http_response_code(404);
    echo 'Not Found';
    exit;
}

// filter wordpress request
isset($_SERVER['REQUEST_URI']) && str_starts_with($_SERVER['REQUEST_URI'], '/wp-') && doExit();

// filter php file request
isset($_SERVER['REQUEST_URI']) && str_contains($_SERVER['REQUEST_URI'], '.php') && doExit();

// filter SF env var injection
isset($_SERVER['REQUEST_URI']) && str_contains($_SERVER['REQUEST_URI'], '+--env=') && doExit();

