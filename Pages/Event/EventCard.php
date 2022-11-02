<?php
    global $Db;
    $EventId = $CurrentEventId;
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
            <div class="EventCardBackground"> 
            <?php 
                if($CardThumbnailLocation)
                {
            ?>  
            <img class="EventCardImage" src=<?= $CardThumbnailLocation ?>>
            <?php 
                }
                else
                {
                    $EventName = GenerateEventBackground($Event);
            ?>
            <p>
            <span class="EventCardBackgroundText"> 
                <?=$EventName ?> 
            </span> 
            </p>
            <?php 
                } 
            ?>   
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
