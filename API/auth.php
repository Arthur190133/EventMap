<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//var_dump($_SERVER['Authorization']);

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    http_response_code(405);

    echo json_encode(["message" => 'Forbidden access', "code" => 0001]);

    exit;
}

if(isset($_SERVER['Authorization'])){
    $token = trim($_SERVER['Authorization']);
}
elseif(isset($_SERVER['HTTP_AUTHORIZATION'])){
    $token = trim($_SERVER['HTTP_AUTHORIZATION']);
}
elseif(function_exists('apache_request_headers')){
    $requestHeaders = apache_request_headers();
    if(isset($requestHeaders['Authorization'])){
        $token = trim($requestHeaders['Authorization']);
    }
}

if(!isset($token) || !preg_match('/Bearer\s(\S+)/', $token, $matches)){
    http_response_code(400);
    echo json_encode(['message' => 'no token', "code" => 0002]);
    exit;
}


$token = str_replace('Bearer ', '', $token);

//require_once '/EventMap/config/config.php';
require_once 'JWT.php';

$jwt = new JWT;

if(!$jwt->IsValid($token)){
    http_response_code(400);
    echo json_encode(['message' => 'invalid token', "code" => 0003]);
    exit;
}

if($jwt->isExpired($token)){
    http_response_code(403);
    echo json_encode(['message' => 'expired token  ' . $token, "code" => 0004]);
    exit;
}

if(!$jwt->check($token)){
    http_response_code(403);
    echo json_encode(['message' => 'token check failled' . $token , "code" => 0005]);
    exit;
}



return json_encode($jwt->getPayload($token));
?>