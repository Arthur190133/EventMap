<?php
       //$Events = GetEvents();

?>
<head>
<link href= "css/map.css" rel="stylesheet">
</head>
<script>
   /* $(document).ready(function(){
        $("#search").keyup(function(){
            $.ajax({
                url: "Pages/Event/EventPreview.php",
                type: "post",
                data: {search: $(this).val()},
                success:function(result){
                    $("#result").html(result);
                }
            });
        });
    }); */
</script>

<div id="Preview">
</div>
<input type="TEXT" id="search"/>
<span id="result"></span>

<div id="map">
    <h1 class="mapTitle">Google Map</h1>
</div>

<script>  mapDiv = "map"; </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfBI13bMmYnsfUqPOZR4gR2eYzH5ZK8rI&map_ids=61d9f0e6c1783a33&callback=initMap"></script>

