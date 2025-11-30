<?php

    define('BASE_PATH', dirname(__DIR__));
    define('APP_PATH', BASE_PATH . '/app');
    define('VIEW_PATH', APP_PATH . '/views/');

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $script_dir = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
    $script_dir = ($script_dir === '/' ? '' : $script_dir);
    define('BASE_URL', $protocol . '://' . $host . $script_dir);

    if (!function_exists('url')) {
        function url(string $path = ''): string {
            return rtrim(BASE_URL, '/') . '/' . ltrim($path, '/');
        }
    }

    if (!function_exists('asset')) {
        function asset(string $path = ''): string {
            return url('public/' . ltrim($path, '/'));
        }
    }

?>
