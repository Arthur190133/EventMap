<?php
       $Event = GetEvent(1);
       $test = (array) $Event;
       var_dump($test);
?>

<script type="text/javascript">
   var Event = "<?php echo $test; ?>";
</script>

<div id="Preview">

</div>

<div id="map">
    <h1 class="mapTitle">Google Map</h1>
</div>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfBI13bMmYnsfUqPOZR4gR2eYzH5ZK8rI&map_ids=61d9f0e6c1783a33&callback=initMap">
</script>