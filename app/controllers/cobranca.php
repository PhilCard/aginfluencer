<?php

    header('Content-Type: application/json');

    require __DIR__ . '/../../inc/database.php';
    require __DIR__ . '/../models/CobrancaModel.php';
   //CHAMAR MAILER PEDIDOS AQUI


    //CLINETE DADOS
    if (
        isset($_POST['link_post']) && !empty($_POST['link_post']) &&
        isset($_POST['rede_social']) && !empty($_POST['rede_social']) &&
        isset($_POST['tipo_servico']) && !empty($_POST['tipo_servico']) &&
        isset($_POST['tipo_plano']) && !empty($_POST['tipo_plano']) &&
        isset($_POST['quantidade']) && !empty($_POST['quantidade']) &&
        isset($_POST['preco_final']) && !empty($_POST['preco_final'])
    ) {
        $link_post = filter_var(trim($_POST['link_post']), FILTER_SANITIZE_URL);
        $rede_social = filter_var(trim($_POST['rede_social']), FILTER_SANITIZE_STRING);
        $servico = filter_var(trim($_POST['tipo_servico']), FILTER_SANITIZE_STRING);
        $plano = filter_var(trim($_POST['tipo_plano']), FILTER_SANITIZE_STRING);
        $qtde = trim($_POST['quantidade']);
        $qtde = preg_replace('/[^0-9,\.]/', '', $qtde);
        $qtde = str_replace('.', '', $qtde);
        $price = trim($_POST['preco_final']);
        $price = preg_replace('/[^0-9,\.]/', '', $price);
        $price = str_replace('.', ',', $price);

        if ($qtde === false || $price === false) {
            return "Quantidade ou preço inválidos";
        }
    }
    else
    {
        return json_encode(['error' => 'Campos POST inválidos ou vazios']);
    }
    

    //COBRANÇA PIX
    if (
        isset($_POST['preco_final']) && !empty($_POST['preco_final']) &&
        isset($_POST['email']) && !empty($_POST['email']) &&
        isset($_POST['whats']) && !empty($_POST['whats'])
    ) {
        $value = trim($_POST['preco_final']);
        $value = preg_replace('/[^0-9,\.]/', '', $value);
        $value = str_replace(',', '.', $value);
        $value = (float) $value;
        $value = (int) round($value * 100);
        $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
        $whats = preg_replace('/\D/', '', $_POST['whats']);

        if ($value === false) {
            return "Preço inválido";
        }
        if ($email === false) {
            return "E-mail inválido";
        }
        if (strlen($whats) < 10) { // 10 dígitos mínimos (ex: DDD + número)
            return "Número de WhatsApp inválido";
        }
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $correlationID = generateUUIDv4();
        $cliente_dados = salvaDadosCliente($conn, $correlationID, $link_post, $rede_social, $servico, $plano, $qtde, $price);
        $response = geraCobrançaPix($correlationID, $value, $whats);
        //echo $cliente_dados;
        echo $response;
        //echo '<pre>' . json_encode(json_decode($response, true), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . '</pre>';
        //$pedido_pendente = statusInfoEmail('Pedido aguardando pagamento', 'Conclua o pagamento para liberamento do pedido');
    }

    if (isset($_GET['pagamento']) && $_GET['pagamento'] === 'status' && isset($_GET['correlationid'])) {
        $response = validaPagamento($_GET['correlationid']);
        echo $response;
        //echo '<pre>' . json_encode(json_decode($response, true), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . '</pre>';

    }

    mysqli_close($conn);

?>
