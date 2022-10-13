<?php
    global $Db;
    $EventId = 1;
    $Event = GetEvent($EventId);


    

    $UserNumber = GetNumberOfParticipants($EventId);

    $EventCardParticipants = $UserNumber;
    if($Event->EventSize > 0)
    {
      $EventCardParticipants = $EventCardParticipants . "/" . $Event->EventSize;
    }
    $EventCardParticipants = $EventCardParticipants . " participant";
    if($UserNumber > 1){
        $EventCardParticipants = $EventCardParticipants . "s";
    }

    $CardThumbnailLocation = GetImageFromTable($Event->EventThumbnailId);
?>
<div onclick="FocusOnMarker()"class="EventCard" id="EventCard" value="1">
    <div class="EventCardContent">
        <div class="EventCardThumbnail">
            <div class="EventCardDate">
                <div class="EventCardDay" day=<?= date("d", strtotime($Event->EventStartDate)) ?>></div>
                <div class="EventCardMonth" month=<?= substr(date("F", strtotime($Event->EventStartDate)), 0, 3) ?>> </div>
                <div class="EventCardYear" year=<?= "20" . date("y", strtotime($Event->EventStartDate)) ?>></div>
            </div>
            <?php if($CardThumbnailLocation)
            {
                ?> <img class="EventCardImage" src=<?= $CardThumbnailLocation ?>>
            <?php }
            else
            {
                ?> 
                    <div class="EventCardBackground"> 
                <?php
                $EventName = "";
                $RandomSpace = random_int(0,5);
                for($j = 0; $j < $RandomSpace; $j++){
                    $EventName = $EventName . "&nbsp;";
                }  
                for($i = 1; $i < 50 ; $i++)
                {
                    $EventName = $EventName . $Event->EventName . " ";
                    if($i % 6 == 0){
                        $EventName = $EventName . "<br>";
                        $RandomSpace = random_int(0,10);
                        for($j = 0; $j < $RandomSpace; $j++){
                            $EventName = $EventName . "&nbsp;";
                        }
                    }
                } 
            } ?>   
                <p>
                    <span class="EventCardBackgroundText"> <?=$EventName ?> </span> 
                </p>
            </div>   
        </div>
        <div class="EventCardInfos">
            <div class="EventCardCategory">
                <?= $Event->EventCategory ?>
                <!-- Texte ou image -->
            </div>
            <h1 class="EventCardName"> <?= $Event->EventName ?></h1>
            <h2 class="EventCardLocation"> EventLocation </h2>
            <p class="EventCardDescription"> <?= $Event->EventDescription ?></p>
            <div class="EventCardData">
                <span class="EventCardTags"> EventTags </span>
                <span class="EventCardParticipants"> <?= $EventCardParticipants ?></span>
            </div>
        </div>
    </div>
</div>
