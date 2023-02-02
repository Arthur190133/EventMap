<?php 
    $mesEvent=GetEvents();
?>
<link href= "css\userProfile.css" rel="stylesheet">
<head>
	<title>Profile</title>
</head>
<script> RemoveDiv("PopUpLoginContent") </script>
<body>
    <div class="box">
        <h1 class=TitleName>JAMES ABRAM</h1>
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
                        <h1 class="TitreCaroucelle">Vos Evenements :</h1>
                        <div class="rouleaux">
                            <?php foreach ($mesEvent as $mesEvents) : ?>
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?= $mesEvents->EventName ?></p>
                                            <p>En savoir plus!</p>
                                        </div>
                                        <div class="flip-card-back">
                                            
                                            <p>prix : <?= $mesEvents->EventPrice;  ?>$<p>
                                            <p>EventStartDate : <?= $mesEvents->EventStartDate ?><p>
                                            <p>EventEndDate : <?= $mesEvents->EventEndDate ?><p>
                                            
                                        </div>
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
                        <h1 class="TitreCaroucelle">Evenements rejoins :</h1>
                        <div class="rouleaux">
                            <?php foreach ($mesEvent as $mesEvents) : ?>
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front">
                                            <p class="title"><?= $mesEvents->EventName ?></p>
                                            <p>En savoir plus!</p>
                                        </div>
                                        <div class="flip-card-back">
                                            
                                            <p>prix : <?= $mesEvents->EventPrice;  ?>$<p>
                                            <p>EventStartDate : <?= $mesEvents->EventStartDate ?><p>
                                            <p>EventEndDate : <?= $mesEvents->EventEndDate ?><p>
                                            
                                        </div>
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
