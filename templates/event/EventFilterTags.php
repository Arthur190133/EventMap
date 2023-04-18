<?php
 $DataFilter = json_decode(file_get_contents("../Config/Data.json", true))->Data; 

if($currentTags !== null)
{
    foreach($currentTags as $tag)
    {
        if(in_array($tag, $DataFilter[0]->EventFilterTags))
        {
            require '../Pages/event/EventFilterTags.php';
        }
        
    }
}


?>