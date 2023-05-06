<div id="profileEdit">
    <div class="user-edit-box">
        <svg id="user-edit-leave" viewBox="0 0 100 100" width="30" height="30">
            <path d="M25 25 L75 75 M75 25 L25 75"  stroke-width="10"/>
        </svg>
        <div class="user-edit-box-left ">
            <div>
                <img src="<?= "/" .$user->UserAvatarDir ?>" class="user-edit-img"></img>
                <div>
                    <p id="Register-card-firstname">prénom</p>
                    <p id="Register-card-name">nom</p>
                    <p><?= $user->UserEmail ?></p>
                    <div class= "user-edit-preview-description">
                        <p class="descriptionDisplay" id="Register-card-description">Votre description s'affichera ici</p>
                     </div>
                </div>
            </div>
        </div>
        <div class="user-edit-box-right">
            <H1>Profile de <?= $user->UserFirstName ?></H1>
            <form action="Post">
                <div class="user-edit-input-group">
                    <label class="user-edit-input-label">Prenom</label>
                    <input id="Register-firstname" type="text" class="user-edit-input" name="newUserFirstName" placeholder="Prenom" value="<?=$_SESSION['user']->UserFirstName?>">
                    <div>

                    </div>
                </div>
                <div class="user-edit-input-group">
                    <label class="user-edit-input-label">Nom</label>
                    <input id="Register-name" type="text" class="user-edit-input" name="newUserLastName" placeholder="Nom" value="<?=$_SESSION['user']->UserName?>">
                    <div>
                        
                    </div>
                </div>
                <div class="user-edit-input-group">
                    <div class= "user-edit-preview-description">
                        <textarea id="Register-description" name="description" type="description" placeholder="Description"></textarea>
                     </div>
                    <div>
                        
                    </div>
                </div>
                <button class="user-edit-update-button" id="btnModif">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
<script src="/js/userEdit.js"></script> 