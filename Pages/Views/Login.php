<?php
	$message="";
	$CurrentEmail = "";
	if(isset($_SESSION["CurrentEmail"]))
	{
		$CurrentEmail = $_SESSION["CurrentEmail"];
	}
    if(isset($_POST['Email'], $_POST['MotDePasse']))
	{
		$userConnect=Login($_POST['Email'], $_POST['MotDePasse']);
		$_SESSION["CurrentEmail"] = $_POST['Email'];
		header("location: test");
		if($userConnect)
		{
			$_SESSION['user'] = $userConnect;
			
			//header("location: test");
		}
		else $message="l'Adresse mail ou le mot de passe est incorrecte !";

	}
	CreateUser("aaa", "aaa", "a@w.com", "default", "aaa");
	Login("a@w.com", "default");
	var_dump("Current email : " . $CurrentEmail);
?>
<link href= "css/login.css" rel="stylesheet">
<div class=box-formulaire>
    <div class=gauche>
        <h1 class=menuTXT>SE CONNECTER</h1>
		<form action="" method="post">
			<div>
				<form action="" method="post">
				<div class="LoginContent">
					<input class="inputtt" type="email" value="<?= $CurrentEmail ?>" name="Email" placeholder="Email" required>
					<input class="inputtt" type="password" name="MotDePasse" placeholder="Mot de passe" required>
					<button class="LoginButton">Connection</button>
					<p class="LoginMessage"><?= $message ?></p>
				</div>	
			</div>	
		</form>
    </div>

    <div class=droite>
		<!-- <img src="Images/Logos/LoginGif.gif"> -->
    </div>
</div>
