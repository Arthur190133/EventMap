<?php

function GenerateEventBackground($Event){
    $EventName = "";
    $RandomSpace = random_int(0,5);
    for($j = 0; $j < $RandomSpace; $j++){
        $EventName = $EventName . "&nbsp;";
    }  

    $number = strlen($Event->Name);
    $name = $Event->Name . " ";
    if($number < 4)
    {
        
        for($i = 0 ; $i < 6 ; $i++)
        {
            $name .= $Event->Name . "&nbsp;";
        }
    }


    for($i = 1; $i < 50 ; $i++)
    {
        $EventName = $EventName . $name . " ";
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
    $token = $jwt->generate($header, $payload, 60 * 3);
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

function SendNotification($type, $sender, $to, $context){
    //Generete Sender
    $GeneratedSender = "";
    if($type === "User"){
        $GeneratedSender = "UserId=" . $sender;
    }
    elseif($type === "Event"){
        $GeneratedSender = "EventId" . $sender;
    }
    else{
        return 0;
    }

    $CurrentDate = date('d-m-Y');

    $url = "http://localhost/EventMap/API/notification/create.php";
    $payload = [
        'NotificationSender' => $GeneratedSender,
        'NotificationContext' => $context,
        'NotificationStatus' => 0,
        'NotificationDate' => $CurrentDate,
        'UserId' => $to
    ];
    $token = GenerateToken($payload);
    $result = SendRequestToAPI($token, $url);
}


?>