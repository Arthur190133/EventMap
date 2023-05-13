<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Fichers requis
    include_once '../../config/Database.php';
    include_once '../../models/image.php';
    $payload = json_decode(require_once '../auth.php');

    // Instantiation de la base de donnée
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation de la class image
    $image = new Image($db);

    // Modifier les informations de l'image par celles voulues
    $image->ImageDir = $payload->ImageDir;
    $image->ImageName = $payload->ImageName;

    // Créer l'image
    if($image->create()){
        echo json_encode(
            array("ImageId" => $image->ImageId)
        );
    }
    else{
        echo json_encode(
            array('message' => 'image not Created')
        );
    }
?>