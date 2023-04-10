<div class="Content">
    <?php require_once '../templates/event/EventFilter.php'; ?>
    <div class="EventsContent">
            <div class ="EventButtons" id="Event-buttons">
                <?php require_once '../templates/event/EventCard.php'; ?>
            </div>
            <div class="SearchMoreEventContent">
                <img class="SearchMoreEventImage SearchImage" onclick="SearchMoreEvent()" src="Images/Logos/DownArrow.png" alt="Search more event button image"> 
                <img class="SearchMoreEventImage2 SearchImage" onclick="SearchMoreEvent()" src="Images/Logos/DownArrow.png" alt="Search more event button image"> 
            </div>
    </div>
    <script src="/js/events.js">
    </script> 
</div>
