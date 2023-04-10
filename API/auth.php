<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//var_dump($_SERVER['Authorization']);

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    http_response_code(403);

    echo json_encode(['http code' => "403", "message" => 'Access forbidden by server.']);

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
    echo json_encode(['http code' => "400", 'message' => 'no token']);
    exit;
}


$token = str_replace('Bearer ', '', $token);

//require_once '/EventMap/config/config.php';
require_once 'JWT.php';

$jwt = new JWT;

if(!$jwt->IsValid($token)){
    http_response_code(400);
    echo json_encode(['http code' => "400", 'message' => 'invalid token']);
    exit;
}

if($jwt->isExpired($token)){
    http_response_code(403);
    echo json_encode(['http code' => "403", 'message' => 'expired token']);
    exit;
}

if(!$jwt->check($token)){
    http_response_code(403);
    echo json_encode(['http code' => "403", 'message' => 'token check failled']);
    exit;
}



return json_encode($jwt->getPayload($token));
?>