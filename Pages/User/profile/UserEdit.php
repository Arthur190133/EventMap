<div id="profileEdit">
    <div class="user-edit-box">
        <svg id="user-edit-leave" viewBox="0 0 100 100" width="30" height="30">
            <path d="M25 25 L75 75 M75 25 L25 75"  stroke-width="10"/>
        </svg>
        <div class="user-edit-box-left ">
            <div>
                <div class="user-edit-img">
                    <img src="<?= "/" . $user->UserBackgroundDir ?>" class="user-edit-background"></img>
                    <img src="<?= "/" .$user->UserAvatarDir ?>" class="user-edit-avatar"></img>
                </div>

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
            <h1>Profile de <?= $user->UserFirstName ?></h1>
            <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <div class="button-wrapper">
                    <button id='button-import-background' type="button" class="custom-button" style="background-image: url(<?= $user->UserBackgroundDir ?>)" onclick="document.getElementById('GetFileBackground').click()">
                        <input name="backgroundImage" id="GetFileBackground"  type="file" placeholder="Votre Background" style="display:none">
                        <span class="svg-overlay">
                            <img src="/Images/Logos/Camera.png" height="80px" width="80px" alt="Votre SVG" />
                        </span>
                    </button>
                </div>
                <div class="button-wrapper">
                    <button id='button-import-avatar' type="button" class="custom-button-avatar" style="background-image: url(<?= $user->UserAvatarDir ?>)" onclick="document.getElementById('GetFileAvatar').click()">
                        <input name="AvatarImage" id="GetFileAvatar"  type="file" placeholder="Votre avatar" style="display:none">
                        <span class="svg-overlay">
                            <img src="/Images/Logos/Camera.png" height="80px" width="80px" alt="Votre SVG" />
                        </span>
                    </button>
                </div>
                <div class="user-edit-input-group">
                    <label class="user-edit-input-label">Prenom</label>
                    <input id="Register-firstname" type="text" class="user-edit-input" name="userFirstName" placeholder="Prenom" value="<?=$_SESSION['user']->UserFirstName?>">
                    <div>

                    </div>
                </div>
                <div class="user-edit-input-group">
                    <label class="user-edit-input-label">Nom</label>
                    <input id="Register-name" type="text" class="user-edit-input" name="userName" placeholder="Nom" value="<?=$_SESSION['user']->UserName?>">
                    <div>
                        
                    </div>
                </div>
                <div class="user-edit-input-group">
                    <div class= "user-edit-preview-description">
                    <label class="user-edit-input-label">Description</label>
                        <textarea id="Register-description" name="userDescription"  placeholder="Description"></textarea>
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