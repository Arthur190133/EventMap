<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    // Fichers requis
    include_once '../../config/Database.php';
    include_once '../../models/User.php';
    $payload = json_decode(require_once '../auth.php');
    if(isset($payload)){
        //die();
    }
    

    // Instantiation de la base de donnée
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation de la class user
    $user = new User($db);
    

    // Modifier les informations de l'uutilisateur par celles voulues
    $user->UserFirstName = $payload->UserFirstName;
    $user->UserName = $payload->UserName;
    $user->UserEmail = $payload->UserEmail;
    $user->UserPassword = $payload->UserPassword;
    $user->UserDescription = $payload->UserDescription;
    $user->UserAvatarId = 1;
    $user->UserBackgroundId= 1;

    // Créer l'utilisateur
    if($user->create()){
        echo json_encode(
            array('user' => $user)
        );
    }
    else{
        echo json_encode(
            array('message' => 'User not Created')
        );
    }
?>