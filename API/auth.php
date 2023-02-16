<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    http_response_code(405);

    echo json_encode(["message" => 'Forbidden method']);

    exit;
}

if(isset($_SERVER['Authorization'])){
    $token = trim($_SERVER['Authorization']);
}
elseif(isset($_SERVER['HTTP_AUTHORIZATION'])){
    $token = trim($_SERVER['HTTP_AUTHORIZATION']);
}
elseif(function_exist('apache_request_headers')){
    $requestHeaders = apache_request_headers();
    if(isset($requestHeaders['Authorization'])){
        $auth = trim($requestHeaders['Authorization']);
    }
}

if(!isset($token) || !preg_match('/Bearer\s(\S+)/', $token, $matches)){
    http_response_code(400);
    echo json_encode(['message' => 'no token' ]);

}


$token = str_replacet('Bearer ', '', $token);

require_once '../config/config.php';
require_once '../config/JWT.php';

$jwt = new JWT;

if(!$jwt->IsValid($token)){
    http_response_code(400);
    echo json_encode(['message' => 'invalid token' ]);
    exit;
}

if(!$jwt->check($token)){
    http_response_code(403);
    echo json_encode(['message' => 'invalid token' ]);
    exit;
}

if(!$jwt->isExpired($token)){
    http_response_code(403);
    echo json_encode(['message' => 'expired token' ]);
    exit;
}

echo json_encode($jwt->getPayload($token));
?>