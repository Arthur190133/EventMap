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
    $data= json_decode(file_get_contents("php://input"));

    if ($data === null) {
        echo 'Error: ' . json_last_error_msg();
      }
    else
      {
        // Modifier les informations de l'uutilisateur par celles voulues
        $user->UserEmail = $data->UserEmail;
        $user->UserPassword = $data->UserPassword;

        // Créer l'utilisateur
        $user_connected = $user->login();
        if($user_connected){
          echo json_encode($user_connected);
        }
        else{
          echo json_encode(false);
        }
      }


?>