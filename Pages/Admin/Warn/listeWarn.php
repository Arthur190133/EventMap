<?php
    $UserWarned = SendRequestToAPI(GenerateToken([]), "http://localhost/EventMap/API/userWarned/readWarn.php");
    var_dump($UserWarned);

if($UserWarned){
    
    if(property_exists($UserWarned, 'data'))
    {
        $UserWarned = $UserWarned->data;
        foreach($UserWarned as $UserWarn)
        {
            require_once "../templates/admin/warn/AfficheWarn.php" ;
        }
    }  
}
    ?>