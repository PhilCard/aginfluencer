<?php
    require __DIR__ . '/config/paths.php';
    require __DIR__ . '/config/route.php';

    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

    $base_prefix = trim(parse_url(BASE_URL, PHP_URL_PATH) ?? '', '/');
    if ($base_prefix !== '') {
        $uri = preg_replace('#^' . preg_quote($base_prefix, '#') . '/?#', '', $uri);
    }

    $view = $routes[$uri] ?? null;

    if ($view === null) {
        http_response_code(404);
        echo "<h1>404 - Página não encontrada</h1>";
        exit;
    }

    load_view($view);
?>
