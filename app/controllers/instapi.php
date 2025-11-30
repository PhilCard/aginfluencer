<?php

    header('Content-Type: application/json');

    require __DIR__ . '/../models/InstaApiModel.php';

    if (isset($_GET['user']) && $_GET['user'] === "getprofile" && isset($_GET['username'])) 
    {
        $response = pegaPerfilInsta('v2', 'username', $_GET['username']);
        echo $response;
    } 
    elseif (isset($_GET['user']) && $_GET['user'] === "getprofile" && isset($_GET['url'])) 
    {
        $response = pegaPerfilInsta('v1', 'url', $_GET['url']);
        echo $response;
    }

?>