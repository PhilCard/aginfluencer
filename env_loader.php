<?php
    function loadEnv($path)
    {
        if (!file_exists($path)) return;

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) continue;

            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            putenv("$name=$value");
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }

    // Carregar .env
    loadEnv(__DIR__ . '/.env');

    // Usar variáveis
    $db_user = getenv('DB_USER');
    $api_key = $_ENV['API_KEY_OPENPIX'];

    echo "Usuário DB: $api_key";

    //ps subir junto com o database
?>