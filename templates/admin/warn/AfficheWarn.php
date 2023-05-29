<?php

$UserWarned = SendRequestToAPI(GenerateToken([]), "http://localhost/EventMap/API/userWarned/readWarn.php");
    
if($UserWarned){
    
    if(property_exists($UserWarned, 'data'))
    {
        $UserWarned = $UserWarned->data;
        foreach($UserWarned as $UserWarn)
        {
            require "../Pages/Admin/Warn/AfficheWarn.php";
        }
    }  
}

    
?>