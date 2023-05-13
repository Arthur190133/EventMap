<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Fichers requis
    include_once '../../config/Database.php';
    include_once '../../models/User.php';

    // Instantiation de la base de donnée
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation de la class user
    $user = new User($db);

    // Recuperer les informations de l'utilisateur
    $data = json_decode(file_get_contents("php://input"));

    // Set Id to update
    $user->UserId = $data->UserId;

    if($user->UserId)
    {
        // mettre à jour l'utilisateur
        if($user->delete()){
            echo json_encode(
                array('message' => 'User deleted')
            );
        }
        else{
            echo json_encode(
                array('message' => 'User not deleted')
            );
        }
    }
    else{
        echo json_encode(
            array('message' => 'Access forbiden')
        );
    }

?>