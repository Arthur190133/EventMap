<?php
    require_once "../Tools/Requestes.php";
    require_once "../Tools/Connection.php";

    $EventId = $_COOKIE["currentEventId"];
    $EventJoin = "Rejoindre";
    $EventDescription = "";
    $EventBackground = "";
    $EventDates = "";

    $Event = GetEvent($EventId);
    if($Event)
    {     
        $EventBackground = GetImageFromTable($Event->EventBackgroundId);
        $EventDates = date("Y-m-d",strtotime($Event->EventStartDate)) . " - " . date("Y-m-d",strtotime($Event->EventEndDate));
        if($Event->EventPrivate)
        {
            $EventJoin = "Demander une invitation";
        }
        $EventDescription = $Event->EventDescription;
    }

    require_once 'components/EventPreview.php';
?>