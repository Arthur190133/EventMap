<?php

$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    echo 'test';
    if(isset($_POST['submit'])) 
    {
        $firstName = $_POST['FirstName'];
        $lastName = $_POST['Name'];
        $password = $_POST['Password'];
        $confirmPassword = $_POST['ConfirmPassword'];
        $email = $_POST['Email'];
        $confirmEmail = $_POST['ConfirmEmail'];


          // Garder data si erreur au moment de la création du compte
          $_SESSION['RegisterUserFistName'] = $firstName;
          $_SESSION['RegisterUserName'] = $lastName;
          $_SESSION['RegisterUserEmail'] = $email;
      
        if(!isset($firstName) || !isset($lastName) || !isset($password) || !isset($confirmPassword) || !isset($email) || !isset($confirmEmail)) 
        {
          // Tous les champs sont obligatoires
          $message = "Certains champs ne sont pas remplis";
          $error = true;
        } else if($password !== $confirmPassword) 
        {
          // Vérifie que les mots de passe correspondent
          $message = "Les mots de passe ne correspondent pas.";
          $error = true;
        } else if($email !== $confirmEmail) 
        {
          // Vérifie que les adresses e-mail correspondent
          $message = "Les adresses e-mail ne correspondent pas.";
          $error = true;
        } 
        else 
        {
            $url = 'http://localhost/EventMap/API/user/create.php';
            $payload = array(
                'UserFirstName' => $firstName,
                'UserName' => $lastName,
                'UserPassword' => $password,
                'UserEmail' => $email,
                'UserBackgroundId' => 1,
                'UserAvatarId' => 1,
                'UserDescription' => NULL
            );

            $token = GenerateToken($payload);
            $result = SendRequestToAPI($token, $url);
            
            if ($result) 
            {
              $url = "http://localhost/EventMap/API/user/login.php";
              $payload = [
                "UserEmail" => $email,
                "UserPassword" => $password

              ];
              $token = GenerateToken($payload);
              $user = SendRequestToAPI($token, $url);
              $_SESSION['user'] = $user;
              header("location: /");
            }
            else
            {
              $message="Impossible de créer votre compte";
              require_once '../components/user/UserInputError.php';
            }
        }
    }  
}

if(isset($_SESSION['RegisterUserFistName']) ? $CurrentFirstName = $_SESSION['RegisterUserFistName']: $CurrentFirstName = "");
if(isset($_SESSION['RegisterUserName']) ? $CurrentName = $_SESSION['RegisterUserName']: $CurrentName = "");
if(isset($_SESSION['RegisterUserEmail']) ? $CurrentEmail = $_SESSION['RegisterUserEmail']: $CurrentEmail = "");


if($error)
{
    require_once '../components/user/UserInputError.php';
}


require_once '../Pages/User/Register.php';

?>