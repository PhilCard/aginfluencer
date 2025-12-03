 <?php

    require __DIR__ . '/../../inc/env_loader.php';

    function pegaPerfilInsta($version, $user_key, $instagram)
    {
        $curl = curl_init();

        $url = "https://api.hikerapi.com/$version/user/by/$user_key?$user_key=" . urlencode($instagram);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'x-access-key:'.getenv('HIKER_API')
            ),
            CURLOPT_SSL_VERIFYPEER => false, //retirar essas duas linhas na prod
            CURLOPT_SSL_VERIFYHOST => 0,
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $response = json_encode(['error' => 'cURL Error: ' . curl_error($curl)]);
        }

        return $response;
    }

?>