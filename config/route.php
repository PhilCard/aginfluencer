<?php

    $routes = [
        ''      => 'home',
        'checkout' => 'checkout',
        'social-instagram' => 'instagram',
        'social-tiktok' => 'instagram',
        'social-facebook' => 'instagram',
        'social-kwai' => 'instagram',
        'social-youtube' => 'instagram'
    ];

    function load_view(string $view, array $data = [])
    {
        extract($data);

        // garante barra entre view_path e arquivo
        $file = rtrim(VIEW_PATH, '/') . '/' . ltrim($view, '/') . '.php';

        if (file_exists($file)) {
            require $file;
        } else {
            http_response_code(404);
            echo "<h1>404 - View não encontrada</h1>";
            echo "<p>{$file}</p>";
            exit;
        }
    }

?>
