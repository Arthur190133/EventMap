

<link href= "\css\userProfile.css" rel="stylesheet">

    <div class="box">
        <h1 class="TitreProfile">Profile de <?= $user->UserFirstName ?></h1>
        <div class="contenair">
            <div class="x">
                <div class="gauche">
                    <div class="card">
                        <div class="card__content">
                            <span class="img"></span>
                            
                                <h2><?= $user->UserFirstName ?> <?= $user->UserName ?></h2>
                                <p><?= $user->UserDescription ?></p>
                                <button id="editProfilBTN">Cliquez ici</button><H1>CHIBRE</H1>
                            
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
<script src="/js/UserProfile.js"></script>
    