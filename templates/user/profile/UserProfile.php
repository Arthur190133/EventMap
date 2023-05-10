<?php

    $url = "http://localhost/EventMap/API/user/readSingle.php?UserId=" . $userId;
    $token = GenerateToken([]);
    $user = SendRequestToAPI($token, $url);


    require_once '../Pages/User/profile/UserProfile.php';
    if($user->UserId === $_SESSION['user']->UserId){
        require_once '../templates/User/profile/UserEdit.php';
    }
    
    function EventCardDate($date) {
        $timestamp = strtotime($date);
        $monthNames = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
        $formattedDate = date("j", $timestamp)." ".$monthNames[date("n", $timestamp) - 1];
        return $formattedDate;
    }

    function GenerateEventCardBackground($Event){
        $EventName = "";
        $RandomSpace = random_int(0,5);
        for($j = 0; $j < $RandomSpace; $j++){
            $EventName = $EventName . "&nbsp;";
        }  
        for($i = 1; $i < 50 ; $i++)
        {
            $EventName = $EventName . $Event->Name . " ";
            if($i % 6 == 0){
                $EventName = $EventName . "<br>";
                $RandomSpace = random_int(0,10);
                for($j = 0; $j < $RandomSpace; $j++){
                    $EventName = $EventName . "&nbsp;";
                }
            }
        } 
        return $EventName;
    }

?>




