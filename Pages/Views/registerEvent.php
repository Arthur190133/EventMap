<?php
	if(isset($_POST['name'],$_POST['description'],$_POST['personNbr'],$_POST['price'],$_POST['startDate'],$_POST['endDate'],$_POST['endDate'],$_POST['endDate'],$_POST['endDate']))
	{
        var_dump($_POST);
		//$NewEvent=NewEvents();
		//header("location: /my-app/EVENTMAP/index.php?/pages/MesEvent.php");
	}



?>
<link href= "css/login.css" rel="stylesheet">
<div class = box-formulaire>
		<div class=gauche>
			<div class=overlay>
				<h1>CREER MON EVENEMENT</h1>
				<form action="" method="post">
					<h3>Elements principals</h3>
					<div class="inputs">
						<input class="inputtt" type="text" name="name" placeholder="name" value="">
						<br>
						<input class="inputtt" type="text" name="description" placeholder="description" value="">
						<br>
						<input class="inputtt" type="number" name="personNbr" placeholder="nombre de personnes max" value="">
						<br>
						<input class="inputtt" type="number" name="price" placeholder="prix" value="">
						<br>
						<h3>Date de debut</h3>
						<input class="inputtt" type="date" name="startDate" placeholder="Date de debut" value="">
						<br>
						<h3>Date de fin</h3>
						<input class="inputtt" type="date" name="endDate" placeholder="Date de fin" value="">
						<br>
						<label class="inputtt" for="pet-select">Choose a pet:</label>

						<select name="pets" id="pet-select">
							<option value="">Categorie</option>
							<option value="a">a</option>
							<option value="b">b</option>
							<option value="c">c</option>
						</select>
						<h4>Confidentialité</h4>
						<input type="radio" id="Publique" name="fav_language" value="Publique">
  						<label for="Publique">Publique</label>

						<input type="radio" id="Privé" name="fav_language" value="Privé">
						<label for="Privé">Privé</label>
						<br>
						<h4>Chat</h4>
						<br>
						<input type="radio" id="Actif" name="fav_language" value="Actif">
  						<label for="Actif">Actif</label>

						<input type="radio" id="Inactif" name="fav_language" value="Inactif">
						<label for="Inactif">Inactif</label>
						<br>
					</div>		
					<h3>Customisation</h3>
					<div>		
						<label for="myfile">Choisisez votre mignature:</label>
						<br>
 						<input class="inputtt" type="file" id="myfile" name="myfile">	
						 <br>
						<label for="myfile">Choisisez votre image de fond:</label>
						<br>
 						<input class="inputtt" type="file" id="myfile" name="myfile">	
						<br>
						<h4>Couleur</h4>
						<label for="ColorCard">Couleur de presentation</label><br>
						<input class="color" type="Color" name="ColorCard" value="">
						<br>
						<label for="ColorPage">Couleur sur la page</label><br>
						<input class="color" type="Color" name="ColorPage" value="">
						<br>
						<button>CREER MON EVENEMENT</button>
					</div>	
				</form>
			</div>
		</div>
		<div class=droite>
			
		</div>
	</div>