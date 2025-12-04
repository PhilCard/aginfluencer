<?php

    function generateUUIDv4()
    {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }


    function salvaDadosCliente($conn, $correlationID, $link_post, $rede_social, $servico, $plano, $qtde, $price)
    {
        $stmt = $conn->prepare("INSERT INTO cliente 
                    (correlation_id, url_perfil_post, rede_social, tipo_servico, tipo_plano, quantidade, preco_final) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)");

        if ($stmt) {
            $stmt->bind_param("sssssss", $correlationID, $link_post, $rede_social, $servico, $plano, $qtde, $price);

            if ($stmt->execute()) {
                return "sucesso";
            } else {
                return "Erro ao salvar dados do cliente : " . htmlspecialchars($stmt->error);
            }

            $stmt->close();
        } else {
            return "Erro ao preparar a query" . htmlspecialchars($conn->error);
        }
    }


    function geraCobrançaPix($correlationID, $value, $whats)
    {
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
                    "email" => 'noreply@seudominio.com.br',
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

        return $response;
    }


    ///----------- PROCESSSA COBRANÇA  ----------------///

    // - > exemplo de caminho = $all_services['instagram']['seguidores']['básico'][0]

    /*
        echo '<pre>';
        print_r($all_services['instagram']['seguidores']['básico'][0]);
        echo '</pre>';*/


    //logica para verificar forms e gerar o qrcode open pix

    function validaPagamento($correlationID)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.openpix.com.br/api/v1/charge/' . $correlationID, // <-- endpoint cobrança "correlationID"
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: '. getenv('API_KEY_OPENPIX')
            ),
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $response = json_encode(['error' => 'cURL Error: ' . curl_error($curl)]);
        }

        return $response;
    }

    /*

        $idPagamento = validaPagamento('0344240e-82a2-44ea-9e68-67899bf4c75e');

        $array = json_decode($idPagamento, true);

        echo '<pre>';
        print_r($array['charge']['status']);
        echo '</pre>';
        */
?>
