const searchInput = document.getElementById('NavBar-search');
const resultsList = document.getElementById('NavBar-result');

const searchData = [
  'REQUEST',
  'TO GET',
  'EVENT NAME',
  'AND',
  'EVENT OWNER NAME'
];

searchInput.addEventListener('input', event => {
  while (resultsList.firstChild) {
    resultsList.removeChild(resultsList.firstChild);
  }

  const searchValue = event.target.value;

  // TEST REQUEST

  const searchParams = { EventName: searchValue};
  const searchParamsJson = JSON.stringify(searchParams);

  const xhr = new XMLHttpRequest();
  
  const searchQuery = encodeURIComponent(searchInput);
  
  xhr.open('POST', 'http://localhost/EventMap/API/js/Navbar.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
  xhr.onload = function() {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
  
      console.log(response);
      if (Array.isArray(response.data)) {
        // Limiter les résultats à 5
        const limitedResults = response.data.slice(0, 5);
        
        // Ajouter une indication de type pour distinguer les événements des utilisateurs
        const formattedResults = limitedResults.map(item => {
          if (item.EventId && item.EventName) {
            return {
              Type: 'event',
              EventId: item.EventId,
              EventName: item.EventName
            };
          } else if (item.UserName && item.UserFirstName) {
            return {
              Type: 'user',
              UserName: item.UserName,
              UserFirstName: item.UserFirstName
            };
          }
        });
  
        console.log(formattedResults);



          // Tri des utilisateurs (users)
  const userResults = formattedResults.filter(item => item.Type === 'user');
  userResults.slice(0, 5).forEach(result => {
    const li = document.createElement('li');
    li.classList.add('result');
    const iconSVG = `<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g id="User / User_02">
    <path id="Vector" d="M20 21C20 18.2386 16.4183 16 12 16C7.58172 16 4 18.2386 4 21M12 13C9.23858 13 7 10.7614 7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </g>
    </svg>`;
    li.innerHTML = iconSVG + result.UserFirstName + ' ' + result.UserName;
    li.addEventListener('click', event => {
      searchInput.value = event.target.textContent;
    });
    resultsList.appendChild(li);
  });

  // Tri des événements (events)
  const eventResults = formattedResults.filter(item => item.Type === 'event');
  eventResults.slice(0, 5).forEach(result => {
    const li = document.createElement('li');
    li.classList.add('result');
    const iconSVG = `<svg width="18" height="18" viewBox="0 0 24 24" fill="black" xmlns="http://www.w3.org/2000/svg">
    <path d="M8 12C7.44772 12 7 12.4477 7 13C7 13.5523 7.44772 14 8 14H16C16.5523 14 17 13.5523 17 13C17 12.4477 16.5523 12 16 12H8Z" fill="#152C70"/>
    <path d="M7 17C7 16.4477 7.44772 16 8 16H12C12.5523 16 13 16.4477 13 17C13 17.5523 12.5523 18 12 18H8C7.44772 18 7 17.5523 7 17Z" fill="#152C70"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 2C7.55228 2 8 2.44772 8 3V4H16V3C16 2.44772 16.4477 2 17 2C17.5523 2 18 2.44772 18 3V4.10002C20.2822 4.56329 22 6.58104 22 9V17C22 19.7614 19.7614 22 17 22H7C4.23858 22 2 19.7614 2 17V9C2 6.58104 3.71776 4.56329 6 4.10002V3C6 2.44772 6.44772 2 7 2ZM20 10H4V17C4 18.6569 5.34315 20 7 20H17C18.6569 20 20 18.6569 20 17V10Z" fill="#152C70"/>
    </svg>`;
    li.innerHTML = iconSVG + result.EventName;
    li.addEventListener('click', event => {
      searchInput.value = event.target.textContent;
    });
    resultsList.appendChild(li);
  });



      } else {
        console.log("Invalid response format");
      }
    } else {
      console.log("error");
    }
  };
  
  xhr.send(searchParamsJson);


  /*if (searchValue.length > 0) {
    const searchRegex = new RegExp(searchValue, 'i');
    let searchResults = searchData.filter(result => result.match(searchRegex));

    searchResults = searchResults.slice(0, 5);

    searchResults.forEach(result => {
      const li = document.createElement('li');
      li.classList.add('result');
      const iconSVG = `<svg fill="#000000" width="18" height="18" margin-right="10" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8.06.56A8.05 8.05 0 0 0 1.24 4.2V1.55H0V5a1.16 1.16 0 0 0 1.15 1.14h3.44V4.9H2.27a6.79 6.79 0 0 1 5.79-3.1 6.48 6.48 0 0 1 6.7 6.2 6.48 6.48 0 0 1-6.7 6.2A6.48 6.48 0 0 1 1.36 8H.12a7.71 7.71 0 0 0 7.94 7.44A7.71 7.71 0 0 0 16 8 7.71 7.71 0 0 0 8.06.56z"/><path d="M7.44 4.28v4.34h3.6V7.38H8.68v-3.1H7.44z"/></svg>`;
      li.innerHTML = iconSVG + result;
      li.addEventListener('click', event => {
        searchInput.value = event.target.textContent;
      });
      resultsList.appendChild(li);
    });
  }*/
});

//