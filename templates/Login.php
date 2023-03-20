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