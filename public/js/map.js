
var map;
var mapDiv;
var marker = [];
var geocoder;
// Create Cookies
function createCookie(name, value, days) {
  var expires;
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = "; expires=" + date.toGMTString();
  }
  else {
    expires = "";
  }
  document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
}

function initMap()
{
  geocoder = new google.maps.Geocoder();
  map = new google.maps.Map(document.getElementById("map"),
  {
    center: {lat: 50.002, lng: 4.523629443397177},
    zoom:7,
    mapId: "61d9f0e6c1783a33",
    streetViewControl: false,
    zoomControl: true,
    fullscreenControl: false,
  })


  let i =0;
  getMarkersData(function(markerMapsData) {
    // Traiter la réponse ici et mettre à jour la partie de la page souhaitée
        var data = JSON.parse(markerMapsData).data;
        data.forEach(function(item) {
        geocodeAddress(item, function(position) {
        AddMarker(position, item.Name, item.Id);
        SetClickableMarker(item.Name + item.Id, i , item.Id);
        i++;
      });
    });
  });



  
  window.initMap = initMap;


}

function getMarkersData(callback){
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "/Js_Request/MakersMaps.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      callback(this.responseText);
    
    }
  };
  xhr.send();
}

function initPreviewMap()
{
  map = new google.maps.Map(document.getElementById("EventMapPreview"),
  {
    center: {lat: 50.002, lng: 4.523629443397177},
    zoom:9,
    mapId: "61d9f0e6c1783a33",
    streetViewControl: false,
    zoomControl: true,
    fullscreenControl: false,
    gestureHandling: "none", 
    keyboardShortcuts: false,
  })

  //for(let i = 0; i<3; i++)
  //{
    //AddMarker({lat: 50.002 + i, lng: 4.523629443397177}, "Marker API test : " + i);
    //SetClickableMarker("Bruxelles, E420", i);
  //}



  
  window.initMap = initMap;


}

function AddMarker(MarkerPositions, MarkerTitle, EventId){
    marker.push( new google.maps.Marker({
    position: MarkerPositions,
    map,
    title: MarkerTitle
    }));
    marker['EventId'] = EventId;
}

function SetClickableMarker(MarkerContent, MarkerId, EventId){

  const infowindow = new google.maps.InfoWindow({
    content: MarkerContent,
  })
  console.log(EventId);
  marker[MarkerId].addListener("click", () => 
  {
    //infowindow.open(map, marker[MarkerId]);
    console.log("User Clicked on the marker : " + marker[MarkerId].title);
    createCookie("currentEventId", EventId, "1");

    // Update event preview
    if(document.getElementById("Preview").childElementCount != 0){  
      document.getElementById("Preview").innerHTML ="";
    }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/Js_Request/EventPreview.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
        document.getElementById("Preview").innerHTML = this.responseText;
      }
    };
    xhr.send();
  });
}

function FocusOnMarker(MarkerButtonId)
{
  if(map)
  {
    MarkerId = document.getElementById('EventCardMarker').getAttribute('value');
    if(document.getElementById("EventSelected"))
    {
      document.getElementById("EventSelected").remove();
    }
    if(marker[MarkerId]){
      console.log("Focusing on the marker : " + marker[MarkerId].title);
      map.setZoom(10);
      map.setCenter(marker[MarkerId].getPosition());
      if(document.getElementById("error"))
      {
        document.getElementById("error").remove();
        console.log("EventButtonCardError has been removed");
      }
        //OpenPage("EventSelected.html", "Event");
    }
    else{
      console.log("cannot find a marker at index : " + MarkerId);
      //document.getElementById("MasterContent").innerHTML += "<p> Cannot find your event, please try later </p>";
      //OpenPage("EventButtonCardError.html", "ErrorContent")


    } 
  }
  else{
    console.log("Creating map");
    mapDiv = "EnvetMapPreview";
    initMap();
  }
}

function GetDistance(){
  var origin1 = "Namur, Belgium";
  var desitnation1 = "Paris, France";

  var service = new google.maps.DistanceMatrixService();
  service.getDistanceMatrix(
    {
    origins: [origin1],
    destinations: [desitnation1],
    travelMode: "DRIVING",
    travelMode: google.maps.TravelMode.DRIVING,
    unitSystem: google.maps.UnitSystem.METRIC,
    avoidHighways: false,
    avoidTolls: false,
  }, callback);
}



function geocodeAddress(event, callback) {
  geocoder.geocode({ 'address': event.Location }, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      // Récupérer les coordonnées géographiques (latitude et longitude)
      var latitude = results[0].geometry.location.lat();
      var longitude = results[0].geometry.location.lng();
      
      // Créer un marqueur sur la carte
      position = {lat: latitude, lng: longitude};
      callback(position);
    }
  });
}



