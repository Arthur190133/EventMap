<link href= "css\userProfile.css" rel="stylesheet">
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
                                <h6 class="hiddenTXT" >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempora nesciunt dignissimos quis suscipit nam. Unde ipsam hic minima voluptatum sequi atque! Tenetur possimus beatae a repudiandae recusandae? Maiores, minus expedita?</h6>
                            </div>
                            <div>
                                <h5 class="BlueTXT" >REGARDE ICI !</h6>
                            </div>
                    </div>
                </div>
                <div class="center"></div>
                <div class="droite">
                    <div class="EventBox">
                        <h1>Vos Evenements :</h1>
                        <div class="rouleaux">
                            <?php foreach ($mesEvent as $mesEvents) : ?>
                                <div class="window">
                                    <div class="align">
                                        <span class="red"></span>
                                        <span class="yellow"></span>
                                        <span class="green"></span>
                                    </div>

                                    <h1><?= $mesEvents->Name ?></h1>
                                    <div>
                                        <p>prix : <?= $mesEvents->Price;  ?>$<p>
                                        <p>EventStartDate : <?= $mesEvents->StartDate ?><p>
                                        <p>EventEndDate : <?= $mesEvents->EndDate ?><p>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="x">
                <div class="gauche">
                    <div class="EventBox">
                        <h1>Evenements rejoins :</h1>
                        <div class="rouleaux">
                            <?php foreach ($mesEvent as $mesEvents) : ?>
                                <div class="window">
                                    <div class="align">
                                        <span class="red"></span>
                                        <span class="yellow"></span>
                                        <span class="green"></span>
                                    </div>

                                    <h1><?= $mesEvents->Name ?></h1>
                                    <div>
                                        <p>prix : <?= $mesEvents->Price;  ?>$<p>
                                        <p>EventStartDate : <?= $mesEvents->StartDate ?><p>
                                        <p>EventEndDate : <?= $mesEvents->EndDate ?><p>
                                    </div>
                                </div>
                            <?php endforeach ?>
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
        </div>
    </div>    
</body>
