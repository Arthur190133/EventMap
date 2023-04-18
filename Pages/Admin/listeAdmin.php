<?php
    $users = SendRequestToAPI(GenerateToken([]), "http://localhost/EventMap/API/user/read.php");

    if(property_exists($users, 'data'))
    {
        $users = $users->data;
        foreach($users as $user)
        {
            require "AfficheAdmin.php" ;
        }
    }  
?>  
    
