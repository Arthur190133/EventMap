<link href= "\css\userProfile.css" rel="stylesheet">
<head>
	<title>Profile</title>
</head>
<script> RemoveDiv("PopUpLoginContent") </script>
<body>
    <div class="box">
        <div class="contenair">
            <div class="x">
                <div class="gauche">
                    <div class="card">
                        <div class="blob"></div>
                            <span class="img"></span>
                            <h2>John<br><span>Doe</span></h2>
                            <div>
                                <p class="hiddenTXT" >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora nesciunt dignissimos quis suscipit nam. Unde ipsam hic minima voluptatum sequi atque! Tenetur possimus beatae a repudiandae recusandae? Maiores, minus expedita?</p>
                            </div>
                            <div>
                                <h5 class="BlueTXT" >REGARDE ICI !</h6>
                            </div>
                    </div>
                </div>
                <div class="center"></div>
                <div class="droite">
                    <div class="EventBox">
                    <h1>vos Evenements :</h1>
                    <div class="rouleaux">
                        <?php require_once '../templates/user/UserProfileEvent.php'; ?>
                    </div>
                        
                    </div>
                </div>
            </div>
            <div class="x">
                <div class="gauche">
                    <div class="EventBox">
                        <h1>Evenements rejoins :</h1>
                        <div class="rouleaux">
                            <?php require_once '../templates/user/UserProfileEvent.php'; ?>
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
