<?php

function GenerateEventBackground($Event){
    $EventName = "";
    $RandomSpace = random_int(0,5);
    for($j = 0; $j < $RandomSpace; $j++){
        $EventName = $EventName . "&nbsp;";
    }  
    for($i = 1; $i < 50 ; $i++)
    {
        $EventName = $EventName . $Event->Name . " ";
        if($i % 6 == 0){
            $EventName = $EventName . "<br>";
            $RandomSpace = random_int(0,10);
            for($j = 0; $j < $RandomSpace; $j++){
                $EventName = $EventName . "&nbsp;";
            }
        }
    } 
    return $EventName;
}


function GenerateToken(array|null $payload){

    $header = [
        'typ' => 'JWT',
        'alg' => 'HS256'
    ];
    $jwt = new JWT();
    $token = $jwt->generate($header, $payload, 60 * 30);
    return $token;
}

function SendRequestToAPI($token, $url){

    
    $authorization_header = "Authorization: Bearer ".$token;
    $ch = curl_init();

    // Set cURL options
    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization_header ));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $data = curl_exec($ch);
    curl_close($ch);
    $data =  json_decode($data);
    return $data;
}


?>