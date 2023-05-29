<?php
if(isset($_GET['query'])) {
    $query = $_GET['query'];
    
    $query = str_replace("%20", " ", $query);
    $query = ltrim($query);
    $url = "http://localhost/EventMap/API/event/search.php";
    $payload = ['EventName' => $query];
    $token = GenerateToken($payload);
    $results = SendRequestToAPI($token, $url);
    $results = $results->data;
    

    if($results){
        foreach($results as $result){
            require '../templates/navbar/NavbarSearchResult.php';
        }
    }
    else{
        echo 'Aucun résultat trouvé.';
    }

}
?>