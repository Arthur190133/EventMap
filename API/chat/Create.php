<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Fichers requis
    include_once '../../config/Database.php';
    include_once '../../models/Chat.php';

    // Instantiation de la base de donnée
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation de la class Chat
    $Chat = new Chat($db);

    // Recuperer les informations de l'Chat
    $data = json_decode(file_get_contents("php://input"));

    // Modifier les informations de l'Chat par celles voulues
    $Chat->EventId = $data->EventId;

    // Créer l'Chat
    if($Chat->create()){
        echo json_encode(
            array('message' => 'Chat Created')
        );
    }
    else{
        echo json_encode(
            array('message' => 'Chat not Created')
        );
    }
?>