<?php 


$url = "http://localhost/EventMap/API/event/readFiltered.php";

$token = GenerateToken($FilterParamters);
var_dump($token);
$Events = SendRequestToAPI($token, $url);
var_dump($Events);

if(property_exists($Events, 'data'))
{
  $Events = $Events->data;
  foreach($Events as $Event){
  
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

      $EventUrl = "/event/" . $Event->Id;
  
  
      require '../Pages/Event/EventCard.php';
  }

}  else{
  echo 'Impossible de récuperer les évènements';
}
 
?>