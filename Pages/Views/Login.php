<?php
	$message="";
	$CurrentEmail = "";
	if(isset($_SESSION["CurrentEmail"]))
	{
		$CurrentEmail = $_SESSION["CurrentEmail"];
	}
    if(isset($_POST['Email'], $_POST['MotDePasse']))
	{
		$userConnected=Login($_POST['Email'], $_POST['MotDePasse']);
		$_SESSION["CurrentEmail"] = $_POST['Email'];
		if($userConnected)
		{
			header("location: /EventMap", true);
		}
		else $message="l'Adresse mail ou le mot de passe est incorrecte !";

	}
	CreateUser("test", "test", "test@test.com", "test", "test");
?>
<div class=box-login>
    <div class=gauche>
        <h1 class=menuTXT>SE CONNECTER</h1>
		<form action="" method="post">
			<div>
				<form action="" method="post">
				<div class="LoginContent">
					<input type="email" value="<?= $CurrentEmail ?>" name="Email" placeholder="Email" required>
					<input type="password" name="MotDePasse" placeholder="Mot de passe" required>
					<p class="LoginMessage"><?= $message ?></p>
					<button class="LoginButton">Connection</button>
				</div>	
			</div>	
		</form>
		<p><a href="?/Register">Cliquez ici</a> pour créer un compte</p>
    </div>

    <div class=droite>
		<!-- <img src="Images/Logos/LoginGif.gif"> -->
    </div>
</div>
