<?php

if($cardTags !== null)
{
    foreach($cardTags->data as $tag)
    {
        require '../Pages/event/EventCardTags.php';   
    }
}
?>