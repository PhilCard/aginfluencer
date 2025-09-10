<?php

    if (isset($_GET['url'])) {
        $url = $_GET['url'];

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            http_response_code(400);
            exit('URL inválida');
        }
        header('Content-Type: image/jpeg');
        readfile($url);
    }

?>