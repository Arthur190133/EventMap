<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Fichers requis
    include_once '../../config/Database.php';
    include_once '../../models/User.php';
    $payload = json_decode(require_once '../auth.php');


    // Instantiation de la base de donnée
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation de la class user
    $user = new User($db);

    // Set Id to update
    $user->UserId = (isset($payload->UserId) ? $payload->UserId : die());

    // Modifier les informations de l'uutilisateur par celles voulues
    $user->UserFirstName = (isset($payload->UserFirstName)) ? $payload->UserFirstName : null;
    $user->UserName = (isset($payload->UserName)) ? $payload->UserName : null;
    $user->UserDescription = (isset($payload->UserDescription)) ? $payload->UserDescription : null;
    $user->UserAvatarId = (isset($payload->UserAvatarId)) ? $payload->UserAvatarId : null;
    $user->UserBackgroundId = (isset($payload->UserBackgroundId)) ? $payload->UserBackgroundId : null;

    // mettre à jour l'utilisateur
    if($user->update()){
        echo json_encode(
            array('message' => 'User Updated')
        );
    }
    else{
        echo json_encode(
            array('message' => 'User not Updated')
        );
    }
?>