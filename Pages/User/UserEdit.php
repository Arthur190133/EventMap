<?php
    if(isset($_POST['btnModif']))
    {
        $_SESSION['user']=updateProfil();       
    }
   
?>

<div id="profileEdit">
    <div class="GIGABOX">
        <div class="leftBack">
            <div>
                <img src="<?= "/" .$user->UserAvatarDir ?>" class="img"></img>
                <div>
                    <p id="Register-card-firstname">prénom</p>
                    <p id="Register-card-name">nom</p>
                    <div class= "description">
                        <p class="descriptionDisplay" id="Register-card-description">Votre description s'affichera ici</p>
                     </div>
                </div>
            </div>
        </div>
        <div class="droitePopUp">
            <H1>Profile de <?= $user->UserFirstName ?> ,</H1>
            <form action="Post">
                <div class="input-group">
                    <label class="label">Prenom</label>
                    <input id="Register-firstname" type="text" class="input2" name="newUserFirstName" placeholder="Prenom" value="<?=$_SESSION['user']->UserFirstName?>">
                    <div>

                    </div>
                </div>
                <div class="input-group">
                    <label class="label">Nom</label>
                    <input id="Register-name" type="text" class="input2" name="newUserLastName" placeholder="Nom" value="<?=$_SESSION['user']->UserName?>">
                    <div>
                        
                    </div>
                </div>
                <div class="input-group">
                    <div class= "description2">
                        <textarea id="Register-description" name="description" type="description" placeholder="Description"></textarea>
                     </div>
                    <div>
                        
                    </div>
                </div>
                <button class="button2" id="btnModif" name="btnModif" value="nouveau">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
<script src="/js/register.js"></script> 