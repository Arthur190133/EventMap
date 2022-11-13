<?php

function GenerateEventBackground($Event){
    $EventName = "";
    $RandomSpace = random_int(0,5);
    for($j = 0; $j < $RandomSpace; $j++){
        $EventName = $EventName . "&nbsp;";
    }  
    for($i = 1; $i < 50 ; $i++)
    {
        $EventName = $EventName . $Event->EventName . " ";
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

function GetNotificationSender($NotificationSender):string{
    $Sender = "Unkown";
    if(strpos($NotificationSender, "User") !== false){
        $Sender = GetUser(substr($NotificationSender, strpos(($NotificationSender), "=") + 1));
        $Sender = $Sender -> UserFirstName . " " . $Sender -> UserName; 
    }
    elseif(strpos($NotificationSender, "Event") !== false){
        $Sender = GetEvent(substr($NotificationSender, strpos(($NotificationSender), "=") + 1));
        $Sender = $Sender -> EventName;

    
    }

    return $Sender;
}

function GetNotificationContext($NotificationContext):string{
    $Context = $NotificationContext;
    if(strpos($NotificationContext, "EventId") !== false){
        echo "test réussis";
        $s =  GetStringBetweenTwoCharacters($NotificationContext, "|", "|");
        $Event = GetEvent(substr($s, strpos(($s), "=") + 1));
        $Context = str_replace($s, $Event->EventName, $NotificationContext);
        $Context = str_replace("|", "", $Context);
    }
    return $Context;
}

function GetStringBetweenTwoCharacters($string, $start, $end){
    $string = " " . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);

}

?>