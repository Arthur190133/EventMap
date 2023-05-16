<link href= "/css/eventUserJoined.css" rel="stylesheet">
<div class="mainBlock">
    <div Class="titleBlock">
        <img src="<?= "/" . $event->BackgroundDir ?>" alt="Image de bannière">
        <h1 class="titleEvent"> <?= $event->Name ?> </h1>
    </div>
  <div class="divisibleBlock">
        <div class="card">
            <div class="card-details">
                <img class="logoEvent" height="128" width="128" src="<?= '/' . $event->ThumbnailDir ?>"/>
                <h3>EVENT DATE : </h3>
                <p><?= $event->StartDate . ' - ' . $event->EndDate ?></p>
                <div class="bottomEventCard">
                    <div class = "Policy">
                        <h3>Confidentialité</h3>
                        <h3><?= $privacy ?></h3>
                    </div>
                    <div class = "Policy">
                        <h3>Prix : </h3> 
                        <h3><?=$event->Price ?> €</h3>
                    </div>
                </div>
                <div></div>
            </div> 
            <button class="card-button"><?= $JoinableEvent ?></button>
        </div>

       <div class="card">     
            <h1><?= $event->Name ?></h1> 
            <div class="divisibleBlock">
                <div>
                    <div class="eventOwnerBlock">
                        <h3>EVENT OWNER</h3>
                        <?php require '../templates/user/ProfileLink.php'; ?>
                    </div>

                </div>
                <div class="event-users-joinded">
                    <h3>UTILISATEURS AYANT REJOINDS L'EVENEMENT</h3>
                    <div class="listeUserJoin">
                        <?php require_once '../templates/event/EventUserJoined.php'; ?>
                    </div>
                </div>  
            </div>
            
        </div>
            <div class="chat">
                <?php  require_once '../templates/event/chat/EventChat.php'; ?>
            </div>
        </div>
    </div>
   

</div> 