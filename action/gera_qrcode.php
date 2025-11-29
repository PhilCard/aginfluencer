<?php

    header('Content-Type: application/json');

    require_once '../inc/database.php';
    require_once 'mailer_pedidos.php';

    function generateUUIDv4() {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    function salvaDadosCliente($conn, $correlationID) {
        if
        (
            isset($_POST['link_post']) && !empty($_POST['link_post']) &&
            isset($_POST['rede_social']) && !empty($_POST['rede_social']) &&
            isset($_POST['tipo_servico']) && !empty($_POST['tipo_servico']) &&
            isset($_POST['tipo_plano']) && !empty($_POST['tipo_plano']) &&
            isset($_POST['quantidade']) && !empty($_POST['quantidade']) &&
            isset($_POST['preco_final']) && !empty($_POST['preco_final'])
        ) 
        {
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

            

            $stmt = $conn->prepare("INSERT INTO cliente 
                (correlation_id, url_perfil_post, rede_social, tipo_servico, tipo_plano, quantidade, preco_final) 
                VALUES (?, ?, ?, ?, ?, ?, ?)");

            if ($stmt) 
            {
                $stmt->bind_param("sssssss", $correlationID, $link_post, $rede_social, $servico, $plano, $qtde, $price);

                if ($stmt->execute()) 
                {
                    return "sucesso";
                } 
                else 
                {
                    return "fail : " . htmlspecialchars($stmt->error);
                }

                $stmt->close();
            }
            else
            {
                return "Erro ao preparar a query" . htmlspecialchars($conn->error);
            }
        }
       
    }


    function geraCobrançaPix($correlationID, $apiKey) {

        if
        (
            isset($_POST['preco_final']) && !empty($_POST['preco_final']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['whats']) && !empty($_POST['whats'])
        ) 
        {
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
            if (strlen($whats) < 10) {
                return "Número de WhatsApp inválido";
            }

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.openpix.com.br/api/v1/charge?return_existing=true',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode([
                    "correlationID" => $correlationID,
                    "value" => $value,
                    "expiresIn" => 900,
                    "customer" => [
                        "name" => "user",
                        "email" => $email,
                        "phone" => $whats
                    ],
                ]),
                CURLOPT_HTTPHEADER => [
                    'Authorization: ' . getenv('API_KEY_OPENPIX'),
                    'Content-Type: application/json'
                ],
            ]);

            $response = curl_exec($curl);

            if (curl_errno($curl)) {
            $response = json_encode(['error' => 'cURL Error: ' . curl_error($curl)]);
            }   

            curl_close($curl);

            return $response;
        }

        return json_encode(['error' => 'Campos POST inválidos ou vazios']);

    } 
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {   
        $correlationID = generateUUIDv4();
        $cliente_dados = salvaDadosCliente($conn, $correlationID);
        $response = geraCobrançaPix($correlationID, $api_key);
        //echo $cliente_dados;
        echo $response;
        //echo '<pre>' . json_encode(json_decode($response, true), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . '</pre>';
        //$pedido_pendente = statusInfoEmail('Pedido aguardando pagamento', 'Conclua o pagamento para liberamento do pedido');
    }

    mysqli_close($conn);

?>