<?php
	// Check if form was submitted
	if ($_SERVER['REQUEST_METHOD'] === 'POST') 
	{

		$url = 'http://localhost/EventMap/API/user/login.php';
		$payload = array(
		'UserEmail' => $_POST['Email'],
		'UserPassword' => $_POST['Password']
		);

		$_SESSION['LoginUserEmail'] = $payload['UserEmail'];

		$token = GenerateToken($payload);
		$result = SendRequestToAPI($token, $url);

		// Process response
		if ($result === false) {
		// Request failed
		echo 'Une erreur est survenue lors de votre requête';
		} else {
		// Request succeeded

		if($result)
		{
			unset($_SESSION['LoginUserEmail']);
			$_SESSION['user'] = $result;
			echo "<script>location.href='/'</script>";
		}
		else
		{
			$message="Addresse email ou mot de passe incorrecte";
			require_once '../components/UserInputError.php';
		}

		}	

  	}
	//Garder l'email de l'utilisateur
	if(isset($_SESSION['LoginUserEmail']) ? $CurrentEmail = $_SESSION['LoginUserEmail']: $CurrentEmail = "");
	
	
	require_once '../Pages/User/Login.php';
	
    
?>