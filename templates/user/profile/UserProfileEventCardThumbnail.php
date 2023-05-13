<?php

if(isset($Event->ThumbnailDir)){
    require '../pages/user/profile/UserProfileEventCardThumbnailImage.php';
}
else{
    require '../pages/user/profile/UserProfileEventCardThumbnailText.php';
}

?>