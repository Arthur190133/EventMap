<?php

?>
<div onclick="FocusOnMarker()"class="EventCard" id="EventCard" value="1">
    <div class="EventCardContent">
        <div class="EventCardThumbnail">
            <div class="EventCardDate">
                <div class="EventCardDay" day="08"></div>
                <div class="EventCardMonth" month="mar"> </div>
                <div class="EventCardYear" year="2022"></div>
            </div>
            <img class="EventCardImage" src="https://www.wallpaperuse.com/wallp/41-412142_m.jpg">
        </div>
        <div class="EventCardInfos">
            <div class="EventCardCategory">
                Category
                <!-- Texte ou image -->
            </div>
            <h1 class="EventCardName"> EventName </h1>
            <h2 class="EventCardLocation"> EventLocation </h2>
            <p class="EventCardDescription"> je suis une description je suis une description s une description je suis une description je suis une description</p>
            <div class="EventCardData">
                <span class="EventCardTags"> EventTags </span>
                <span class="EventCardParticipants"> EventNumberParticipants </span>
            </div>
        </div>
    </div>
</div>
<div onclick="FocusOnMarker()"class="EventCard" id="EventCard" value="1">
    <div class="EventCardContent">
        <div class="EventCardThumbnail">
            <div class="EventCardDate">
                <div class="EventCardDay" day="08"></div>
                <div class="EventCardMonth" month="mar"> </div>
                <div class="EventCardYear" year="2022"></div>
            </div>
            <div class="EventCardBackground">
            <?php 
                $EventName = "";
                $RandomSpace = random_int(0,5);
                for($j = 0; $j < $RandomSpace; $j++){
                    $EventName = $EventName . "&nbsp;";
                }
                
                for($i = 1; $i < 50 ; $i++)
                {
                    $EventName = $EventName . "SIX INVITATIONAL ";

                    if($i % 6 == 0){
                        $EventName = $EventName . "<br>";
                        $RandomSpace = random_int(0,10);
                        
                        for($j = 0; $j < $RandomSpace; $j++){
                            $EventName = $EventName . "&nbsp;";
                        }
                    }
                } 
                ?>
                <p>
                    <span class="EventCardBackgroundText"> <?=$EventName ?> </span> 
                </p>
            </div>
        </div>
        <div class="EventCardInfos">
            <div class="EventCardCategory">
                Category
                <!-- Texte ou image -->
            </div>
            <h1 class="EventCardName"> EventName </h1>
            <h2 class="EventCardLocation"> EventLocation </h2>
            <p class="EventCardDescription"> je suis une description je suis une description s une description je suis une description je suis une description</p>
            <div class="EventCardData">
                <span class="EventCardTags"> EventTags </span>
                <span class="EventCardParticipants"> EventNumberParticipants </span>
            </div>
        </div>
    </div>
</div>
