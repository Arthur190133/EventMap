<?php
    $user = $_SESSION['user'];
?>

<link href= "\css\userProfile.css" rel="stylesheet">
<script> RemoveDiv("PopUpLoginContent") </script>
<body>
    <div class="box">
        <h1 class="TitreProfile">Profile de <?= $user->UserFirstName ?></h1>
        <div class="contenair">
            <div class="x">
                <div class="gauche">
                    <div class="card">
                        <div class="blob"></div>
                            <span class="img"></span>
                            <h2><?= $user->UserFirstName ?><br><span><?= $user->UserName ?></span></h2>
                            <div>
                                <p class="hiddenTXT" ><?= $user->UserDescription ?></p>
                            </div>
                            <div>
                                <h5 class="BlueTXT" >REGARDE ICI !</h6>
                            </div>
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
                            <button>
                                <span>Button</span>
                            </button>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>