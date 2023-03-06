<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
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

    // Modifier les informations de l'uutilisateur par celles voulues
    $user->UserFirstName = $data->UserFirstName;
    $user->UserName = $data->UserName;
    $user->UserEmail = $data->UserEmail;
    $user->UserPassword = $data->UserPassword;
    $user->UserDescription = $data->UserDescription;
    $user->UserWallet = $data->UserWallet;
    $user->UserAvatarId = $data->UserAvatarId;
    $user->UserBackgroundId= $data->UserBackgroundId;

    // Créer l'utilisateur
    if($user->create()){
        echo json_encode(
            array('message' => 'User Created')
        );
    }
    else{
        echo json_encode(
            array('message' => 'User not Created')
        );
    }
?>