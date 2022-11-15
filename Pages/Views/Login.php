<?php
	$message="";
    if(isset($_POST['Pseudo'],$_POST['MotDePasse']))
	{
		$userConnect=login();

		if($userConnect)
		{
			$_SESSION['user']=$userConnect;
			
			//header("location: /my-app/EVENTMAP/index.php?/pages/accueil.php");
		}
		else $message="Merci de remplir tout les champs correctement";

	}
	
?>
<link href= "css/login.css" rel="stylesheet">
<div class=box-formulaire>
    <div class=gauche>
        <h1 class=menuTXT>SE CONNECTER</h1>
		<form action="" method="post">
			<div>
				<form action="" method="post">
				<div>
				<h6></h6>
					<input class="inputtt" type="text" name="Pseudo" placeholder="Pseudo">
					<br>
					<input class="inputtt" type="password" name="MotDePasse" placeholder="Mot de passe">
				<button>Connection</button>
				<br><?= $message ?></br>
				<h6></h6>
				</div>	
			</div>	
		</form>
    </div>

    <div class=droite>
		
    </div>
</div>
