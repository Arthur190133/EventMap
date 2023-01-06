<?php
	// Check if form was submitted
	if ($_SERVER['REQUEST_METHOD'] === 'POST') 
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
	//Garder l'email de l'utilisateur
	if(isset($_SESSION['LoginUserEmail']) ? $CurrentEmail = $_SESSION['LoginUserEmail']: $CurrentEmail = "");
	
	
	require_once 'Pages/User/Login.php';
	
    
?>