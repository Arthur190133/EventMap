const searchInputFilter = document.getElementById('filter-search');
const resultsListFilter = document.getElementById('filter-search-list');

const searchDataFilter = [
  'culture',
  'esport',
  '!!cat'
];

searchInputFilter.addEventListener('input', event => {
  while (resultsListFilter.firstChild) {
    resultsListFilter.removeChild(resultsListFilter.firstChild);
  }

  const searchInputFilter = event.target.value;

  if (searchInputFilter.length > 0) {
    const searchRegexFilter = new RegExp(searchInputFilter, 'i');
    let searchResultsFilter = searchDataFilter.filter(result => result.match(searchRegexFilter));

    searchResultsFilter = searchResultsFilter.slice(0, 3);

    searchResultsFilter.forEach(result => {
      const li = document.createElement('li');
      li.classList.add('result');
      const iconSVG = `<svg class="icon" width="24" height="24"><use xlink:href="Images/Logos/close.png"></use></svg>`;
      li.innerHTML = iconSVG + result;
      li.addEventListener('click', event => {
        searchInputFilter.value = event.target.textContent;
      });
      resultsListFilter.appendChild(li);
    });
  }
});