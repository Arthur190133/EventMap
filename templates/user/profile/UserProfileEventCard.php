<?php

$StartDate = EventCardDate($Event->StartDate);
$EndDate = EventCardDate($Event->EndDate);

$date = "Du " . $StartDate . " au " . $EndDate . ".";

$EventId = $Event->EventId;
$EventTextName = GenerateEventCardBackground($Event);

require '../Pages/user/profile/UserProfileEventCard.php';

?>