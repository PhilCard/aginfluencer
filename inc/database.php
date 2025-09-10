<?php

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbname = 'aginfluencer_lp';

    $conn = mysqli_connect($host, $user, $pass, $dbname);
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }

?>