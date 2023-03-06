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
    // Instantiation de la base de donnée
    $datebase = new Database();
    $db = $datebase->connect();

    // Instantiation de la class user
    $user = new User($db);

    // Recuperer les informations de l'utilisateur
    
    if (!isset($payload->UserEmail)) {
      echo json_encode("Adrresse email manquante");
      exit;
      }
    elseif(!isset($payload->UserPassword)){
      echo json_encode("Mot de passe manquant");
      exit;
    }
    else
      {
        // Modifier les informations de l'uutilisateur par celles voulues
        $user->UserEmail = $payload->UserEmail;
        $user->UserPassword = $payload->UserPassword;

        // Créer l'utilisateur
         $user_connected = $user->login();
        if(isset($user_connected)){
          echo json_encode($user_connected);
        }
        else{
          echo json_encode(false);
        }
      }


?>