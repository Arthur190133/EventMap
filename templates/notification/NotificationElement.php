<?php 

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


if($Connected)
{
    // REQUEST TO GET ALL NOTIFICATIONS 
    //
    // NEED TO BE SYNC WITH THE USER
    //
    $Notifications = json_decode(file_get_contents("http://localhost/EventMap/API/notification/read.php"));
    $Notifications = $Notifications->data;
    foreach($Notifications as $value => $Notification)
    {   

        
        $Sender = GetNotificationSender($Notification->Sender);
        $Context = GetNotificationContext($Notification->Context);
        require 'components/NotificationElement.php';
    }
}
else
{

}
?>