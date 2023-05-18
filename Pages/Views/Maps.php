<?php
       $url = "http://localhost/EventMap/API/Event/readMarker.php";
       $token = GenerateToken([]);
       $result = SendRequestToAPI($token, $url);
       
       if(isset($result)){
        $markerMapsDataJSON = json_encode($result, JSON_HEX_TAG);
       }
       

?>
<head>
<link href= "css/map.css" rel="stylesheet">
<link rel="stylesheet" href="/css/eventPreview.css">
</head>
<script>
// Assignez les données JSON à une variable JavaScript
markerMapsData = <?= $markerMapsDataJSON; ?>;
</script>

<div id="Preview">
</div>
<input type="TEXT" id="search"/>
<span id="result"></span>

<div id="map">
    <h1 class="mapTitle">Google Map</h1>
</div>

<script>  mapDiv = "map"; </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfBI13bMmYnsfUqPOZR4gR2eYzH5ZK8rI&map_ids=61d9f0e6c1783a33&callback=initMap&libraries=places"></script>

