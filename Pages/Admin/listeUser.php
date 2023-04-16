<?php
     $url = "http://localhost/EventMap/API/user/read.php";
    $token = GenerateToken([]);
    $users = SendRequestToAPI($token, $url);

    if(property_exists($users, 'data'))
    {
        $users = $users->data;
        foreach($users as $user)
        {
            require '../Page/Admin/AfficheUser.php';
        }
    }  
?>  
    
