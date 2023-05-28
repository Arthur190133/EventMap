<?php

$id = null;

$redirect = "";

$EventId = null;

if (isset($_GET['id'])) {
    $id = $_GET['id']; 
}
else{
    header("Location: /");
}

if (isset($_GET['redirect'])) {
    $redirect = $_GET['redirect'];
    echo $redirect;
}
else{
    header("Location: /");
}


if(stripos($redirect, "/invitation/") !== false){
    

    $url= "http://localhost/EventMap/API/notification/readSingle.php";
    $payload = [
        'NotificationId' => $id
    ];
    $token = GenerateToken($payload);

    $notification = SendRequestToAPI($token, $url);

    var_dump($notification);

    if($notification->Status === "not read yet"){
        header("Location: " . $redirect);
    }
    else{
        header("Location: /");
    }

    
}
else{
    //update notifiation has "was read"
    $url= "http://localhost/EventMap/API/notification/updateStatus.php";
    $payload = [
        'NotificationId' => $id
    ];
    $token = GenerateToken($payload);

    $result = SendRequestToAPI($token, $url);
    var_dump($result);

    header("Location: " . $redirect);
}


?>