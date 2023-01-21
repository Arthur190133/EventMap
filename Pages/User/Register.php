<?php

?>
<head>
    <link rel="stylesheet" href="css/login.css">
</head>
<script> RemoveDiv("PopUpLoginContent") </script>
<div class="login-master">
	<div class=box-login>
   		<div class=gauche>
        	<h1>CREER UN COMPTE</h1>
				<div>
					<form action="" method="post">
						<div class="LoginContent">
							<div class="LoginSubContent">
								<input  type="FirstName" value="<?= $CurrentFirstName ?>" name="FirstName" placeholder="Nom" required>
								<input  type="Name" value="<?= $CurrentName ?>" name="Name" placeholder="Prénom" required>
							</div>
							<div class="LoginSubContent">
								<input  type="password" name="Password" placeholder="Mot de passe" required>
								<input  type="password" name="ConfirmPassword" placeholder="Confirmer votre mot de passe" required>
							</div>
							<div class="LoginSubContent">
								<input  type="email" value="<?= $CurrentEmail ?>"  name="Email" placeholder="Email" required>
								<input  type="email" name="ConfirmEmail" placeholder="Confirmer votre email" required>
							</div>			
						 	<button name="submit" class="LoginButton">Créer</button>
						</div>	
					</form>
				</div>	
				<p><a class="link" href="?/Login">Cliquez ici</a> pour vous connectez</p>
    	</div>
	</div>
<div class="login-right">

</div>
</div>