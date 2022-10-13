<?php
    $Event = GetEvent(1);
?>


<div id="EventPreview" class="EventPreview">
    <img class="Close" src="Images/Logos/Close.png" alt="Quitter la previsualisation de l'évènement">
    <div class="EventPreviewInfo">
        <h1><?= $Event->EventName ?></h1>
        <h4><?= "du " . date("d-m-Y", strtotime($Event->EventStartDate)) . " au " . date("d-m-Y", strtotime($Event->EventEndDate)) ?></h4>
        <div class="EventPreviewBackground">
            <img src="https://staticctf.akamaized.net/J3yJr34U2pZ2Ieem48Dwy9uqj5PNUQTn/2AHkvHPjZbb3iaEwLrXe1W/ea54edb65f70c3142cceb1bb87e01037/R6esports_SI2022_keyart.png"  alt="Image de font de l'évènement">
        </div>
        <p class="EventPreviewDescription"><?= $Event->EventDescription ?></p>
        <button>Voir la fiche de l'évènement</button>
        <button>rejoindre</button>
        
    </div>
</div>

<script>RemoveDiv("EventPreview")</script>