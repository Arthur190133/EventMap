<?php

if($Event->ThumbnailDir)
{
    require '../Pages/event/EventCardImage.php';
}
else{
    $EventName = GenerateEventBackground($Event);
    require '../Pages/event/EventCardText.php';
}

?>