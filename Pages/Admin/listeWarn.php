<?php
    $warns = SendRequestToAPI(GenerateToken([]), "http://localhost/EventMap/API/admin/readWarn.php");

    if(property_exists($warns, 'data'))
    {
        $warns = $warns->data;
        foreach($warns as $warn)
        {
            require "AfficheWarn.php" ;
        }
    }  
?>