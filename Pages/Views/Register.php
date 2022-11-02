<?php

?>

<div>

<script> RemoveDiv("navbar") </script>
<form action="" method="POST">
    <div class="Connetion">
        <div class="ConnetionContent">
            <div>
                <span class="ConnetionName"> Adress E-Mail </span>
                <input  class="ConnetionInput"type="email" name="UserEmail">
            </div>
            <div>
                <span class="ConnetionName"> Mot de passe </span>
                <input  class="ConnetionInput"type="password" name="UserPassword">
            </div>
            <div>
                <span class="ConnetionName"> Prenom </span>
                <input class="ConnetionInput" type="text" name="UserFirstName">
            </div>
            <div>
                <span class="ConnetionName"> Nom </span>
                <input class="ConnetionInput" type="text" name="UserName">
            </div>
            <div>
                <span class="ConnetionName"> Numéro de téléphone </span>
                <input class="ConnetionInput" type="tel" name="UserPhonenumber" pattern="[0-9]{4} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}">
            </div> 
            
        </div>
    </div>
    <button> Créer votre compte </button>
</form>

</div>