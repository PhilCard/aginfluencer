 <?php

    require_once '../env_loader.php';

    header('Content-Type: application/json');
 
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
                'x-access-key:'.getenv('API_KEY_HIKER')
            ),
        ));

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            $response = json_encode(['error' => 'cURL Error: ' . curl_error($curl)]);
        }

        curl_close($curl);
        return $response;
    }


    if(isset($_GET['user']) && $_GET['user'] === "getprofile" && isset($_GET['username']))
    {
        $response = pegaPerfilInsta('v2', 'username', $_GET['username']);
        
        echo $response;
    }

    elseif(isset($_GET['user']) && $_GET['user'] === "getprofile" && isset($_GET['url'])) 
    {
        $response = pegaPerfilInsta('v1', 'url', $_GET['url']);
        echo $response;
    }

?>