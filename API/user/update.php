<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
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

    // Modifier les informations de l'uutilisateur par celles voulues
    $user->UserFirstName = $data->UserFirstName;
    $user->UserName = $data->UserName;
    $user->UserEmail = $data->UserEmail;
    $user->UserPassword = $data->UserPassword;
    $user->UserDescription = $data->UserDescription;
    $user->UserWallet = $data->UserWallet;
    $user->UserAvatarId = $data->UserAvatarId;
    $user->UserBackgroundId= $data->UserBackgroundId;

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