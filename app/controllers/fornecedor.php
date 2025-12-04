<?php

    header('Content-Type: application/json');

    require __DIR__ . '/../../inc/database.php';
    require __DIR__ . '/../models/FornecedorModel.php.';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //fazer segunda verificacao no correlationID <------

        //$dadosCliente = dadosCliente($conn, '99be2b4f-7b9d-4208-b4ff-71e6d69aba36'); correlationID

        $correlationID = $_POST['id'] ?? null;

        if (!$correlationID) {
            echo json_encode(['erro' => 'CorrelationID não recebido']);
            exit;
        }

        $dadosCliente = dadosCliente($conn, $correlationID);

        foreach ($dadosCliente as $cliente) {

            $link = $cliente['url_perfil_post'];
            $service_type = $cliente['tipo_servico'];
            $plann = $cliente['tipo_plano'];
            $qnt = $cliente['quantidade'];
        }

        $codServico = verificaCodService('instagram', $service_type, $plann);

        echo $enviaServices = enviaServicos($codServico, $link, $qnt);

        $pedido_completo = statusInfoEmail('Pedido completo', 'Processando pedido');


        //fazer foreach do banco de dados e alocar os dados nos parametros abaixo

        //enviaServicos()
        //echo $response;
    }

    //$enviaServices = enviaServicos('18350', 'https://www.instagram.com/p/DOHw_OkjpT2/', '20');
    mysqli_close($conn);

?>