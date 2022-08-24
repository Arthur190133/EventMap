var map;
var marker = [];


function initMap()
{
  map = new google.maps.Map(document.getElementById('map'),
  {
    center: {lat: 50.002, lng: 4.523629443397177},
    zoom:7,
    mapId: "61d9f0e6c1783a33",
    streetViewControl: false,
    zoomControl: true,
    fullscreenControl: false,
  })

  for(let i = 0; i<2; i++)
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
  console.log(MarkerId);
  marker[MarkerId].addListener("click", () => {
    infowindow.open(map, marker[MarkerId]);
    console.log("User Clicked on the marker : " + marker[MarkerId].title);
  });
}


function FocusOnMarker(MarkerButtonId)
{
  if(map)
  {
    MarkerId = MarkerButtonId.value;
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
      OpenPage("EventSelected.html", "Event");
    }
    else{
      console.log("cannot find a marker at index : " + MarkerId);
      //document.getElementById("MasterContent").innerHTML += "<p> Cannot find your event, please try later </p>";
      OpenPage("EventButtonCardError.html", "ErrorContent")


    } 
  }
}
  
function OpenPage(OpenFile, Content)
{
  let xhttp;
  let element = document.getElementById(Content);
  let file = OpenFile;
  if (file)
  {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      console.log("1");
      if(this.readyState == 4) {
        if(this.status == 200) {element.innerHTML = this.responseText;}
        if(this.status == 404) {element.innerHTML = "<h1>Page not found. </h1>";}
      }
    }
    xhttp.open("GET", file, true);
    xhttp.send();
    console.log(xhttp);
    return;
  }
}

function GetUserAvatar(){
  window.open("file:");
}



