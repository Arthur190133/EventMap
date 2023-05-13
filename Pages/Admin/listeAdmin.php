<?php
    $admin = SendRequestToAPI(GenerateToken([]), "http://localhost/EventMap/API/admin/read.php");

    if(property_exists($admin, 'data'))
    {
        $admin = $admin->data;
        foreach($admin as $admins)
        {
            require "AfficheAdmin.php" ;
        }
    }  

?>  
    
