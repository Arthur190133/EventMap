<?php


    if(isset($_POST['btnModif']))
    {
        // Fais l'édition du profile dans une autre page qui s'ouvrira
        // quand on cliquera sur le bouton "modifier" (en js), elle
        // sera load uniquement si le user est bien celui qui posede
        // la page. La page pour l'html est dans Pages/user/UserEdit.php    
        // et la page pour le php est dans templates/user/UserEdit.php
    }
?>

<link href= "\css\userProfile.css" rel="stylesheet">
<body>
    <div class="box">
        <h1 class="TitreProfile">Profile de <?= $user->UserFirstName ?></h1>
        <div class="contenair">
            <div class="x">
                <div class="gauche">
                    <div class="card">
                        <div class="card__content">
                            <span class="img"></span>
                            <form method="post">

                                <?php if(!isset($_POST['submit'])) : ?>
                                    <h2><?= $user->UserFirstName ?> <?= $user->UserName ?></h2>
                                    <p><?= $user->UserDescription ?></p>
                                    <button id="submit" name="submit" value="submit"> MODIFIER </button>
                                <?php else : ?>
                                    <div class="input-group">
                                        <label class="label">Prenom</label>
                                        <input type="text" class="input" name="newUserFirstName" placeholder="Prenom" value="<?=$_SESSION['user']->UserFirstName?>">
                                        <div>

                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <label class="label">Nom</label>
                                        <input type="text" class="input" name="newUserLastName" placeholder="Nom" value="<?=$_SESSION['user']->UserName?>">
                                        <div>
                                            
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <label class="label">Description</label>
                                        <input type="text" class="input" name="newUserDescription" placeholder="Description" value="<?=$_SESSION['user']->UserDescription?>">
                                        <div>
                                            
                                        </div>
                                    </div>
                                    <button class="button2 id="btnModif" name="btnModif" value="nouveau">Enregistrer</button>
                                <?php endif?>
                                        
                            </form>
                                        
                        </div>
                        <div class="blob"></div>
                        <div class="blob"></div>
                        <div class="blob"></div>
                        <div class="blob"></div>
                        <div class="blob"></div>
                        <div class="blob"></div>
                    </div>
                </div>
                <div class="center"></div>
                <div class="droite">
                    <div class="EventBox">
                    <h1 class="h1Event">vos Evenements :</h1>
                    <div class="rouleaux">
                        <?php require '../templates/user/UserProfileEvent.php'; ?>
                    </div>
                        
                    </div>
                </div>
            </div>
            <div class="x">
                <div class="gauche">
                    <div class="EventBox">
                        <h1 class="h1Event">Evenements rejoins :</h1>
                        <div class="rouleaux">
                            <?php require '../templates/user/UserProfileEvent.php'; ?>
                        </div>
                    </div>
                </div>
                <div class="center"></div>
                <div class="droite">
                    <div class="NewEventBackground">
                        <div class="blob"></div>
                        <p class="NewEvent">NOUVEL</p><p class="NewEvent">EVENT</p>
                        <form action="post">
                            <a class="button" href="/Event/RegisterEvent.php">
                                <span>CREER</span>
                            </a>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>