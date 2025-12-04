<?php

    function verificaCodService($social_media, $srvc, $plan)
    {

        require __DIR__ . '/../../inc/cod_services.php';

        foreach ($all_services as $social => $service) {

            foreach ($service as $planos => $value) {

                foreach ($value as $plano => $codigos) {

                    foreach ($codigos as $cod_service) {

                        if ($social_media === $social && $srvc === $planos && $plano === $plan) {
                            $cod_srvc = $cod_service;
                            return $cod_srvc;
                        }
                    }
                }
            }
        }
    }



    function dadosCliente($conn, $correlationID)
    {

        $sql = "SELECT url_perfil_post,tipo_servico,tipo_plano, quantidade FROM cliente WHERE correlation_id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "s", $correlationID);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $dados = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if (empty($dados)) {
            return ["error" => "Ops! Nenhum cliente foi encontrado!"];
        }

        return $dados;
    }


    function enviaServicos($service, $link, $quantity)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crescitaly.com/api/v2?key=' . getenv('API_FORNECEDOR') . '&action=add&service=' . $service . '&link=' . $link . '&quantity=' . $quantity,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $response = json_encode(['error' => 'cURL Error: ' . curl_error($curl)]);
        }
        return $response;
    }


?>