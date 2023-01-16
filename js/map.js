var map;
var mapDiv;
var marker = [];
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
  map = new google.maps.Map(document.getElementById("map"),
  {
    center: {lat: 50.002, lng: 4.523629443397177},
    zoom:7,
    mapId: "61d9f0e6c1783a33",
    streetViewControl: false,
    zoomControl: true,
    fullscreenControl: false,
  })

  for(let i = 0; i<3; i++)
  {
    AddMarker({lat: 50.002 + i, lng: 4.523629443397177}, "Marker API test : " + i);
    SetClickableMarker("Bruxelles, E420", i);
  }

  
  window.initMap = initMap;


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

  for(let i = 0; i<3; i++)
  {
    AddMarker({lat: 50.002 + i, lng: 4.523629443397177}, "Marker API test : " + i);
    SetClickableMarker("Bruxelles, E420", i);
  }

  
  window.initMap = initMap;


}

function AddMarker(MarkerPositions, MarkerTitle){
    marker.push( new google.maps.Marker({
    position: MarkerPositions,
    map,
    title: MarkerTitle,
  }))
}

function SetClickableMarker(MarkerContent, MarkerId){
  const infowindow = new google.maps.InfoWindow({
    content: MarkerContent,
  })
  marker[MarkerId].addListener("click", () => 
  {
    //infowindow.open(map, marker[MarkerId]);
    console.log("User Clicked on the marker : " + marker[MarkerId].title);
    createCookie("currentEventId", MarkerId, "1");

    // Update event preview
    if(document.getElementById("Preview").childElementCount != 0){  
      document.getElementById("Preview").innerHTML ="";
    }
    OpenPage("Pages/Event/EventPreview.php", "Preview");
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