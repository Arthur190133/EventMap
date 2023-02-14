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
            echo 'passed';
            $url = 'http://localhost/EventMap/API/user/create.php';

            $data = array(
                'UserFirstName' => $firstName,
                'UserName' => $lastName,
                'UserPassword' => $password,
                'UserEmail' => $email,
                'UserBackgroundId' => 1,
                'UserAvatarId' => 1,
                'UserDescription' => NULL
            );
            $json_data = json_encode($data);

            // Initialize cURL session
            $ch = curl_init();

            // Set cURL options
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Send request
		    $result = curl_exec($ch);

            // Process response
		    if ($result === false) 
            {
            // Request failed
            echo 'Error: ' . curl_error($ch);
            } else 
            {
            // Request succeeded
            $response = json_decode($result);
            print_r($result);
            print_r($response);

            if($response)
            {
                // Set API endpoint URL
              $url = 'http://localhost/EventMap/API/user/login.php';
            
              // Set POST data
              $data = array(
              'UserEmail' => $_POST['Email'],
              'UserPassword' => $_POST['Password']
              );
              $json_data = json_encode($data);
              print_r($json_data);
              $_SESSION['LoginUserEmail'] = $data['UserEmail'];
              // Initialize cURL session
              $ch = curl_init();

              // Set cURL options
              curl_setopt($ch, CURLOPT_URL, $url);
              curl_setopt($ch, CURLOPT_POST, true);
              curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

              // Send request
              $result = curl_exec($ch);

              // Process response
              if ($result === false) {
              // Request failed
              echo 'Error: ' . curl_error($ch);
              } else {
              // Request succeeded
              $response = json_decode($result);
              print_r($response);
              if($response)
              {
                unset($_SESSION['LoginUserEmail']);
                $_SESSION['user'] = $response;
                echo "<script>location.href='/register/personalize-account'</script>";
              }

              }

              // Close cURL session
              curl_close($ch);

              if(!$response)
              {
                $message="Addresse email ou mot de passe incorrecte";
                require_once 'components/UserInputError.php';
              }

            }
            else
            {

            }

              // Close cURL session
		           curl_close($ch);
            }
        }
    }  
}

if(isset($_SESSION['RegisterUserFistName']) ? $CurrentFirstName = $_SESSION['RegisterUserFistName']: $CurrentFirstName = "");
if(isset($_SESSION['RegisterUserName']) ? $CurrentName = $_SESSION['RegisterUserName']: $CurrentName = "");
if(isset($_SESSION['RegisterUserEmail']) ? $CurrentEmail = $_SESSION['RegisterUserEmail']: $CurrentEmail = "");


if($error)
{
    require_once '../components/UserInputError.php';
}


require_once '../Pages/User/Register.php';

?>