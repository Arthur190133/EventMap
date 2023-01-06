<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Fichers requis
    include_once '../../config/Database.php';
    include_once '../../models/image.php';

    // Instantiation de la base de donnée
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation de la class image
    $image = new Image($db);

    // Recuperer les informations de l'image
    $data = json_decode(file_get_contents("php://input"));

    // Modifier les informations de l'image par celles voulues
    $image->ImageDir = $data->ImageDir;
    $image->ImageName = $data->ImageName;

    // Créer l'image
    if($image->create()){
        echo json_encode(
            array('message' => 'image Created')
        );
    }
    else{
        echo json_encode(
            array('message' => 'image not Created')
        );
    }
?>