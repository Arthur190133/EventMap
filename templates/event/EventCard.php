<?php 

$Events =  json_decode(file_get_contents('http://localhost/EventMap/API/event/readCards.php'));

$Events = $Events->data;
foreach($Events as $Event){

    //var_dump($Event);
    $UserNumber = $Event->NumberOfUsers;
    $EventCardParticipants = $UserNumber;
    if($Event->Size > 0)
    {
      $EventCardParticipants = $EventCardParticipants . "/" . $Event->Size;
    }
    $EventCardParticipants = $EventCardParticipants . " participant";
    if($UserNumber > 1){
        $EventCardParticipants = $EventCardParticipants . "s";
    }


    require 'Pages/Event/EventCard.php';
} 
?>