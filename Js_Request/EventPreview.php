<?php

    // RELOAD FILES FOR REQUESTS TO API
    require_once '../Pages/tools/functions.php';
    require_once '../API/JWT.php';

    $EventId = $_COOKIE["currentEventId"];
    $EventJoin = "Rejoindre";
    $EventDescription = "";
    $EventBackground = "";
    $EventDates = "";


    $url = 'http://localhost/EventMap/API/event/readSingle.php?EventId='. $EventId;
    $token = GenerateToken([]);
    $Event = SendRequestToAPI($token,$url);

    //$Event =  json_decode(file_get_contents('http://localhost/EventMap/API/event/readSingle.php?EventId='. $EventId)) ;
    if($Event)
    {     
        $EventDates = "du " . date("Y-m-d",strtotime($Event->StartDate)) . " au " . date("Y-m-d",strtotime($Event->EndDate));
        if($Event->Private)
        {
            $EventJoin = "Demander une invitation";
        }

        require_once '../components/EventPreview.php';
    }

    
?>