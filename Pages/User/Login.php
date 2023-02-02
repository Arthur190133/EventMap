<head>
	<link rel="stylesheet" href="css/login.css">
	<title>LOGIN</title>
</head>

<div class="login-master">
	<div class=box-login>
		<div class=gauche>
			<h1>SE CONNECTER</h1>
			<form action="" method="post">
				<div>
					<form action="" method="post">
						<div class="LoginContent">
							<input type="email" value="<?= $CurrentEmail ?>" name="Email" placeholder="Email" required><br>
							<input type="password" name="Password" placeholder="Mot de passe" required>			
						</div>	
						<button class="LoginButton">Connection</button>
				</div>	
			</form>
			<p><a class="link" href="/register">Cliquez ici</a> pour créer un compte</p>
		</div>
	</div>
	<div class="login-right"></div>
</div>