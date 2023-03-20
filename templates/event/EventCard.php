<?php 


$url = "http://localhost/EventMap/API/event/readFiltered.php";

$token = GenerateToken($FilterParamters);
$Events = SendRequestToAPI($token, $url);


if(property_exists($Events, 'data'))
{
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
  
  
      require '../Pages/Event/EventCard.php';
  }

}  else{
  echo 'Impossible de récuperer les évènements';
}
 
?>