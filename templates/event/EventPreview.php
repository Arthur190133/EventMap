<?php

    $EventId = $_COOKIE["currentEventId"];
    $EventJoin = "Rejoindre";
    $EventDescription = "";
    $EventBackground = "";
    $EventDates = "";

    $Event =  json_decode(file_get_contents('http://localhost/EventMap/API/event/readSingle.php?EventId='. $EventId)) ;
    $Event = $Event;
    if($Event)
    {     
        $EventDates = date("Y-m-d",strtotime($Event->EventStartDate)) . " - " . date("Y-m-d",strtotime($Event->EventEndDate));
        if($Event->Private)
        {
            $EventJoin = "Demander une invitation";
        }

        require_once '../../components/EventPreview.php';
    }

    
?>