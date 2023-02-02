<link href= "css\userProfile.css" rel="stylesheet">
<head>
	<title>Profile</title>
</head>

<script> RemoveDiv("PopUpLoginContent") </script>
<div class= "disposition">
    <div class="base">
        
        <div class="card-client">
            <div>
                <h1 class="h11">Bonjour "NAME USER",</h1>
                <div class="modif-profile-box">
                    <div class="user-picture">
                        <img src="Images/Users/Avatars/default/DefaultAvatar.png" alt="UserAvatar">
                    </div>
                    <p class="name-client"> Jhon Doe</p>
                    <form action="" method="post">
                        <div class="inputs">
                            <input placeholder="EFirstName" class="input" name="newUserFirstName" type="text">
                            <br>
                            <input class="input" type="text" name="newUserLastName" placeholder="LastName">
                            <br>
                            <input class="input" type="text" name="newPseudo" placeholder="Pseudo">
                            <br>
                            <input class="input" type="text" name="newMotDePasse" placeholder="Mot de passe">		
                            <br>
                            <button class="shadow__btn">Modifier</button>
                        </div>	
                    </form>
                </div>	
            </div>	
            <div class="box" > 
                <h1 class="h11">Vos Evenement</h1>
                <div class="cardpostion" >
                    
                    <?php foreach ($mesEvent as $mesEvents) : 
                        ?>
                        <div class="droite">
                            <div class="card">
                                <div class="align">
                                    <span class="red"></span>
                                    <span class="yellow"></span>
                                    <span class="green"></span>
                                </div>

                                <h1><?= $mesEvents->Name ?></h1>
                                <div>
                                    <p>prix : <?= $mesEvents->EventPrice;  ?>$<p>
                                    <p>EventStartDate : <?= $mesEvents->EventStartDate ?><p>
                                    <p>EventEndDate : <?= $mesEvents->EventEndDate ?><p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <h1 class="h11">Vos Participations</h1>
                <div class="cardpostion" >
                    
                    <?php foreach ($mesEvent as $mesEvents) : ?>
                        <div class="droite">
                            <div class="card">
                                <div class="align">
                                    <span class="red"></span>
                                    <span class="yellow"></span>
                                    <span class="green"></span>
                                </div>

                                <h1><?= $mesEvents->EventName ?></h1>
                                <div>
                                    <p>prix : <?= $mesEvents->EventPrice;  ?>$<p>
                                    <p>EventStartDate : <?= $mesEvents->EventStartDate ?><p>
                                    <p>EventEndDate : <?= $mesEvents->EventEndDate ?><p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>  
    </div> 
</div>