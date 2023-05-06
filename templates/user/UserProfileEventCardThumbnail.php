<?php

if(isset($Event->ThumbnailDir)){
    require '../pages/user/UserProfileEventCardThumbnailImage.php';
}
else{
    require '../pages/user/UserProfileEventCardThumbnailText.php';
}

?>