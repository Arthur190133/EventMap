<?php 

//$Events =  json_decode(file_get_contents('http://localhost/EventMap/API/event/readCards.php'));

$header = [
  'typ' => 'JWT',
  'alg' => 'HS256'
];
$payload = [];
$jwt = new JWT();
$token = $jwt->generate($header, $payload, 60 * 3);
$authorization_header = "Authorization: Bearer ".$token;
$url = "http://localhost/EventMap/API/event/readCards.php";

$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array($authorization_header ));
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $Events = curl_exec($ch);
curl_close($ch);
$Events =  json_decode($Events);

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