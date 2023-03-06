<?php
	// Check if form was submitted
	if ($_SERVER['REQUEST_METHOD'] === 'POST') 
	{

		$url = 'http://localhost/EventMap/API/user/login.php';
		$header = [
			'typ' => 'JWT',
			'alg' => 'HS256'
		  ];
		$payload = array(
		'UserEmail' => $_POST['Email'],
		'UserPassword' => $_POST['Password']
		);
		$jwt = new JWT();
		$token = $jwt->generate($header, $payload, 60 * 3);
		$authorization_header = "Authorization: Bearer ".$token;
		$_SESSION['LoginUserEmail'] = $payload['UserEmail'];
		// Initialize cURL session
		$ch = curl_init();

		// Set cURL options
		curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization_header ));
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Send request
		 echo $result = curl_exec($ch);

		// Process response
		if ($result === false) {
		// Request failed
		echo 'Error: ' . curl_error($ch);
		} else {
		// Request succeeded
		$response = json_decode($result);

		if($response)
		{
			unset($_SESSION['LoginUserEmail']);
			$_SESSION['user'] = $response;
			echo "<script>location.href='/'</script>";
		}

		}

		// Close cURL session
		curl_close($ch);

		if(!$response)
		{
			$message="Addresse email ou mot de passe incorrecte";
			require_once '../components/UserInputError.php';
		}

  	}
	//Garder l'email de l'utilisateur
	if(isset($_SESSION['LoginUserEmail']) ? $CurrentEmail = $_SESSION['LoginUserEmail']: $CurrentEmail = "");
	
	
	require_once '../Pages/User/Login.php';
	
    
?>