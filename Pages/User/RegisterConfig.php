<head>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/user.css">
</head>

<div>
    <div class="user-profile user-profile-background">
        <button id='button-import-background' class="button-import-background" type="button" onclick="document.getElementById('GetFileBackground').click()">
                Choisissez votre fond de page.
        </button>
        <img class="user-profile-image-hover" src="Images/Logos/Camera.png" alt="hover image">
        <input id="GetFileBackground" type="file" placeholder="Votre fond de page" style="display:none">	
        
    </div>
    <textarea maxlength="600" placeholder="Votre Description" required></textarea>
    <div class="login-content-images">
        <div class="login-content-image">
            <button class="" type="button" onclick="document.getElementById('GetFileAvatar').click()">
                Choisissez votre avatar.
            </button>
            <input id="GetFileAvatar"  type="file" placeholder="Votre avatar" style="display:none">
            <img id="user-imported-avatar" class="login-content-preview-image" src="Images\Users\Avatars\default\DefaultAvatar.png">
        </div>				
        <div class="login-content-image">

        </div>
    </div>
</div>

<script src="js/register.js">
</script> 