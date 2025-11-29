<?php
require __DIR__ . '/config/paths.php';
require __DIR__ . '/config/route.php';

// captura a rota limpa da URL
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Se seu projeto estiver dentro de uma subpasta, dirname($_SERVER['SCRIPT_NAME']) já foi lido em BASE_URL.
// Normalizamos removendo o prefixo do script se presente:
$base_prefix = trim(parse_url(BASE_URL, PHP_URL_PATH) ?? '', '/');
if ($base_prefix !== '') {
    $uri = preg_replace('#^' . preg_quote($base_prefix, '#') . '/?#', '', $uri);
}

$view = $routes[$uri] ?? null;

if ($view === null) {
    // rota não encontrada
    http_response_code(404);
    echo "<h1>404 - Página não encontrada</h1>";
    exit;
}

// carrega a view
load_view($view);


//php -S localhost:8000
