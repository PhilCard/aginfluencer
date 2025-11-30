<body>
<?php

    require __DIR__ . '/../../inc/database.php';
    require __DIR__ . '/../models/CheckoutModel.php';

    if(!isset($_POST['id_pacote'])){
        header('Location: ../');
    }

    $id_pacote = $_POST['id_pacote'];
    $rede_social = $_POST['rede_social'] ?? null;
    $tipo_servico = $_POST['tipo_servicos'] ?? null;
    $plano = $_POST['tipo_plano'] ?? null;
    
    $pacote_recebido = getPacoteId($conn, $id_pacote);

    if ($pacote_recebido ) {
        $pacotes = getPacoteRelacionado(
            $conn, 
            $pacote_recebido['rede_social'], 
            $pacote_recebido['tipo_servicos'], 
            $pacote_recebido['tipo_plano']
        );
    }
     
    $jsonPacotes = json_encode($pacotes, JSON_UNESCAPED_UNICODE);
?>