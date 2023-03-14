<?php

?>
<head>
    <link rel="stylesheet" href="/css/login.css">
</head>
<div class="login-master">
	<div class=box-login>
   		<div class=gauche>
        	<h1>CREER UN COMPTE</h1>
				<div>
					<form action="" method="post">
						<div class="LoginContent">
							<div class="LoginSubContent">
								<input id="Register-firstname"  type="FirstName" value="<?= $CurrentFirstName ?>" name="FirstName" placeholder="Nom" required>
								<input id="Register-name" type="Name" value="<?= $CurrentName ?>" name="Name" placeholder="Prénom" required>
							</div>
							<div class="LoginSubContent">
								<input  type="password" name="Password" placeholder="Mot de passe" required>
								<input  type="password" name="ConfirmPassword" placeholder="Confirmer votre mot de passe" required>
							</div>
							<div class="LoginSubContent">
								<input  type="email" value="<?= $CurrentEmail ?>"  name="Email" placeholder="Email" required>
								<input  type="email" name="ConfirmEmail" placeholder="Confirmer votre email" required>
							</div>		
							<textarea id="Register-description" name="description" type="description" placeholder="Description"></textarea>
	
						 	<button name="submit" class="LoginButton">Créer</button>
						</div>	
					</form>
				</div>	
				<p><a class="link" href="/login">Cliquez ici</a> pour vous connectez</p>
    	</div>
	</div>
<div >
	
	<div class="card">
		<div class="img"></div>
		<div class="info">
			<span id="Register-card-firstname">Nom</span>
			<span id="Register-card-name">prénom</span>
			<p id="Register-card-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.ss</p>
		</div>
	</div>
</div>

<script src="js/register.js">
</script> 