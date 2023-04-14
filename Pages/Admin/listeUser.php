<?php
    $url = "http://localhost/EventMap/API/user/read.php";
    $token = GenerateToken([]);
    $users = SendRequestToApi($url, $token);

    var_dump($users); 
    if(property_exists($users, 'data'))
    {
        $users = $users->data;
        foreach($users as $user)
        {
            
            require '../Page/Admin/AfficheUser.php' ;
        }
    }

   

    
    
?>  
    
