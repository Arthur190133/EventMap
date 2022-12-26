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
					<div class="LoginSubContent">
						<input  type="name" placeholder="Nom" required>
                    	<input  type="name" placeholder="Prénom" required>
					</div>
					<div class="LoginSubContent">
						<input  type="password" name="MotDePasse" placeholder="Mot de passe" required>
						<input  type="password" name="MotDePasse" placeholder="Confirmer votre mot de passe" required>
					</div>
					<div class="LoginSubContent">
						<input  type="email" name="Email" placeholder="Email" required>
						<input  type="email" name="Email" placeholder="Confirmer votre email" required>
					</div>			
                    <textarea maxlength="600" placeholder="Votre Description" required></textarea>
					<div class="login-content-images">
						<div class="login-content-image">
							<button class="" type="button" onclick="document.getElementById('GetFileAvatar').click()">
								Choisissez votre avatar.
							</button>
							<input id="GetFileAvatar"  type="file" placeholder="Votre avatar" style="display:none">
							<img class="login-content-preview-image" src="Images\Users\Avatars\default\DefaultAvatar.png">
						</div>				
						<div class="login-content-image">
							<button class="" type="button" onclick="document.getElementById('GetFileBackground').click()">
								Choisissez votre fond de page.
							</button>
							<input id="GetFileBackground" type="file" placeholder="Votre fond de page" style="display:none">	
							<img class="login-content-preview-image" src="Images\Users\Avatars\default\DefaultAvatar.png">
						</div>
						
					</div>
					<!-- <button class="LoginButton">Créer</button> -->
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