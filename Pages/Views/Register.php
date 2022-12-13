<?php

?>

<div>

<script> RemoveDiv("navbar") </script>
<div class=box-login>
    <div class=gauche>
        <h1 class=menuTXT>CREER UN COMPTE</h1>
		<form action="" method="post">
			<div>
				<form action="" method="post">
				<div class="LoginContent">
                    <input  type="name" placeholder="Nom" required>
                    <input  type="name" placeholder="Prénom" required>
					<input  type="email" name="Email" placeholder="Email" required>
					<input  type="password" name="MotDePasse" placeholder="Mot de passe" required>
                    <input  type="password" name="MotDePasse" placeholder="Confirmer le mot de passe" required>
                    <input  type="text" placeholder="Votre Description" required>
                    <input  type="file" placeholder="Votre avatar">
                    <input  type="file" placeholder="Votre fond de page">
					<button class="LoginButton">Créer</button>
					<!-- <p class="LoginMessage"><?= " " + $message ?></p> -->
				</div>	
			</div>	
		</form>
		<p><a href="?/Register">Cliquez ici</a> pour créer un compte</p>
    </div>

    <div class=droite>
		<!-- <img src="Images/Logos/LoginGif.gif"> -->
    </div>
</div>