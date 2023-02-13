var currentEventId = 0;
var selectedTags = [];

  
function callback(response, status){
  console.log(response);
  console.log(status);
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
      if(this.readyState == 4) {
        if(this.status == 200) {element.innerHTML = this.responseText;}
        if(this.status == 404) {element.innerHTML = "<h1>Page not found. </h1>";}
      }
    }
    xhttp.open("GET", file, true);
    xhttp.send();
    return;
  }
}

"use strict";
function RemoveDiv(DivId)
{
  if(document.getElementById(DivId))
  {
    document.getElementById(DivId).remove();
    console.log(DivId + " has been removed");
  }
  else
  {
    console.log("Cannot find " + DivId + " div");
  }
}

function checkImageFormat(image)
{
  console.log("Checking the format of the image ");
  if(image.match(/\.(jpg|jpeg|png)$/i)){
    console.log("file imported successfully");
  }
  else{
    console.log("file has not supported format");
  }
}


function RemoveSelectedTag(SelectedTagId){
    RemoveDiv("SelectedTag" + SelectedTagId);
    selectedTags.slice(SelectedTagId, 1);
}



document.addEventListener('click', function OpenNotification(event) {
  const box = document.getElementById('UserNotification');

  if (box && !box.contains(event.target)) {
    box.style.display = 'grid';
  }
});

document.addEventListener('click', function CloseNotification(event) {
  const box = document.getElementById('BellNotification');

  if (box && !box.contains(event.target)) {
    document.getElementById('UserNotification').style.display = 'none';
  }
});



document.addEventListener('click', function OpenUserButton(event) {
  const box = document.getElementById('UserButton');

  if (box && !box.contains(event.target)) {
    box.style.display = 'grid';
  }
});

document.addEventListener('click', function CloseUserButton(event) {
  const box = document.getElementById('NavBarUserButtonContent');

  if (box && !box.contains(event.target)) {
    document.getElementById('UserButton').style.display = 'none';
  }
});



// TEST //
// TRANSITION

/*const elements = document.querySelectorAll("[data-transition]");

// Ajout d'un gestionnaire d'événement "click" à chaque élément
elements.forEach(function(element) {
  console.log(element);
  element.addEventListener("click", function(event) {
    console.log("test");
    // Empêche le comportement par défaut du lien (navigation vers l'URL)
    event.preventDefault();

    // Récupération de l'URL cible
    const url = this.getAttribute("href");

    document.body.classList.add("fade-out");
    setTimeout(function() {

      
      window.location.href = url;

      // Ajout de l'effet de transition et navigation vers l'URL cible
    //document.body.classList.add("fade-out");
    //document.body.classList.add("fade-in");
    }, 500);
  });
});
*/

const links = document.querySelectorAll('a.link');
links.forEach(function(link) {
  
  link.addEventListener('click', function() {
    // Code à exécuter lorsque le lien est cliqué
      // Empêche le comportement par défaut du lien (navigation vers l'URL)
  event.preventDefault();

  // Récupération de l'URL cible
  const url = this.getAttribute('href');
  // Si l'utilisateur est déja sur la page qu'il veut acceder, cela ne fait rien
  if("http://localhost/EventMap/" + url !== document.URL)
  {
    // Ajout de l'effet de fondu
    document.querySelector('body').style.opacity = 0;

    // Chargement de la nouvelle page une fois que l'effet de fondu est terminé
    setTimeout(function() {
      window.location.href = url;
    }, 500);
  }

  });
});

document.querySelector('body').style.opacity = 1;


// TEST CARD
let EventCardMarker = document.querySelector('.EventCardMarker');
let EventCardContent = document.querySelector('.EventCardContent');

EventCardMarker.addEventListener('mouseenter', function() {
  EventCardContent.classList.add('no-hover');
});

EventCardMarker.addEventListener('mouseleave', function() {
  EventCardContent.classList.remove('no-hover');
});












