<?php

    header('Content-Type: application/json');

    require_once '../inc/database.php';
    require_once 'mailer_pedidos.php';

    /*
    $all_services = [
        'instagram' => [
            'seguidores' => [
                'básico' => [0000],
                'balanceado' => [0000],
                'premium' => [0000]
            ],
            'curtidas' => [
                'básico' => [18350],
                'balanceado' => [18945],
                'premium' => [21611, 21032]
            ],
            'visualizações' => [
                'básico' => [25033],
                'balanceado' => [25033],
                'premium' => [17143]
            ]
        ]
    ];

    // - > exemplo de caminho = $all_services['instagram']['seguidores']['básico'][0]

    $verifica_plano = 'básico';
    
    echo '<pre>';
    print_r($all_services['instagram']['seguidores']['básico'][0]);
    echo '</pre>';

    foreach($all_services as $insta => $service) {
        //echo $insta;
        foreach($service as $planos => $value) {
            //echo 'meus planos : ' .$planos. '<br />';
            foreach($value as $plano => $cods) {
               
                foreach($cods as $codigos) {
                    //echo 'meus códigos : '.$codigos. '<br />';
                    if($plano === $verifica_plano) {
                        //echo 'ta aqui seu código : '. $codigos;
                    }
                }
            }
        }
        
    }*/
    

    //logica para verificar forms e gerar o qrcode open pix

    function validaPagamento($correlationID) //testar com teste_post.php
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.openpix.com.br/api/v1/charge/'.$correlationID, // <-- endpoint cobrança "correlationID"
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' //<----- api key 
            ),
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $response = json_encode(['error' => 'cURL Error: ' . curl_error($curl)]);
        }   

        curl_close($curl);

        return $response;
    }

    function dadosCliente($correlationID, $tipoServico, $quantity) {
        //fazer select banco de daddos, tabela cliente
    }

    function enviaServicos($service, $link, $quantity) {
        //listar servicos 
        $api_key = '';

        $curl = curl_init();
       
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crescitaly.com/api/v2?key='.$api_key.'&action=add&service='.$service.'&link='.$link.'&quantity='.$quantity,
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

        curl_close($curl);

        return $response;
    }


    if(isset($_GET['pagamento']) && $_GET['pagamento'] === 'status' && isset($_GET['correlationid'])) 
    {
        $response = validaPagamento($_GET['correlationid']);
        echo $response;
        //echo '<pre>' . json_encode(json_decode($response, true), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . '</pre>';
        
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {   
        //dadosCliente();
        //enviaServicos('','','')
        //echo $response;
    }




?>