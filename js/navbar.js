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

  if (searchValue.length > 0) {
    const searchRegex = new RegExp(searchValue, 'i');
    let searchResults = searchData.filter(result => result.match(searchRegex));

    searchResults = searchResults.slice(0, 3);

    searchResults.forEach(result => {
      const li = document.createElement('li');
      li.classList.add('result');
      const iconSVG = `<svg class="icon" width="24" height="24"><use xlink:href="Images/Logos/Search.png"></use></svg>`;
      li.innerHTML = iconSVG + result;
      li.addEventListener('click', event => {
        searchInput.value = event.target.textContent;
      });
      resultsList.appendChild(li);
    });
  }
});

//