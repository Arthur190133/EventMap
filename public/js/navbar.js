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
  }
});

//