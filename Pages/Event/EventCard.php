<div class="EventCard" id="EventCard">
    <a class="link" href=<?= $EventUrl ?>>
        <div class="EventCardContent">
            <?php require '../templates/event/EventCardPremiumAddOn.php'; ?>
            <div class="EventCardThumbnail">
                <div class="EventCardDate">
                    <div class="EventCardDay" day=<?= date("d", strtotime($Event->StartDate)) ?>></div>
                    <div class="EventCardMonth" month=<?= substr(date("F", strtotime($Event->StartDate)), 0, 3) ?>> </div>
                    <div class="EventCardYear" year=<?= "20" . date("y", strtotime($Event->StartDate)) ?>></div>
                </div>
                <div class="EventCardBackground"> 
                    <?php require '../templates/Event/EventCardType.php'; ?> 
                </div>   
            </div>
            <div onclick="FocusOnMarker()" id="EventCardMarker" class="EventCardMarker" value="1"> 
                <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 22C16 18 20 14.4183 20 10C20 5.58172 16.4183 2 12 2C7.58172 2 4 5.58172 4 10C4 14.4183 8 18 12 22Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="EventCardInfos">
                <div class="EventCardCategory">
                    <span><?= $Event->Category ?></span>
                    <!-- Texte ou image -->
                </div>
                <h1 class="EventCardName"> <?= $Event->Name ?></h1>
                <h2 class="EventCardLocation"> <?= $Event->Location?> </h2>
                <p class="EventCardDescription"> <?= $Event->Description ?></p>
                <div class="EventCardData">            
                    <span class="EventCardParticipants"> <?= $EventCardParticipants ?></span>
                    <div class="event-card-tags">
                        <?php require '../templates/event/EventCardTags.php'; ?>
                    </div>  
                    
                </div>
            </div>
        </div>
    </a>
</div>
