<?php

    header('Content-Type: application/json');

    require __DIR__ . '/../../inc/database.php';
    require __DIR__ . '/../models/CobrancaModel.php';

    $link_post = filter_var(trim($_POST['link_post']), FILTER_SANITIZE_URL);
    $rede_social = htmlspecialchars(trim($_POST['rede_social']), ENT_QUOTES);
    $servico = htmlspecialchars(trim($_POST['tipo_servico']), ENT_QUOTES);
    $plano = htmlspecialchars(trim($_POST['tipo_plano']), ENT_QUOTES);
    $qtde = htmlspecialchars(trim($_POST['quantidade']), ENT_QUOTES);
    $qtde = preg_replace('/[^0-9,\.]/', '', $qtde);
    $qtde = str_replace('.', '', $qtde);
    $price = htmlspecialchars(trim($_POST['preco_final']), ENT_QUOTES);
    $price = preg_replace('/[^0-9,\.]/', '', $price);
    $price = str_replace('.', ',', $price);
    $price = (float) $price;
    $price = (int) round($price * 100);
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $whats = preg_replace('/\D/', '', $_POST['whats']);

    if ($qtde === false || $price === false) {
        die("Quantidade ou preço inválidos");
    }

    if ($value === false) {
        die("Preço inválido");
    }
    if ($email === false) {
        die("E-mail inválido");
    }
    if (strlen($whats) < 10) {
       die("Número de WhatsApp inválido");
    }

    if (!validaForm()) {
        die("Campos POST inválidos ou vazios");
    }


    if (validaForm()) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correlationID = generateUUIDv4();
            $cliente_dados = salvaDadosCliente($conn, $correlationID, $link_post, $rede_social, $servico, $plano, $qtde, $price);
            $qr_code = geraCobrançaPix($correlationID, $price, $whats);
            
            $qr_code_array = json_decode($qr_code, true);

            $response = [
                "db_status" => $cliente_dados,
                "pix" => $qr_code_array
            ];
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }
    }
    

    if (isset($_GET['pagamento']) && $_GET['pagamento'] === 'status' && isset($_GET['correlationid'])) {
        $status_cobranca = validaPagamento($_GET['correlationid']);
        echo $status_cobranca;
    }

    mysqli_close($conn);

?>
