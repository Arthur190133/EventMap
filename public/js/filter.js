const searchInputFilter = document.getElementById('filter-search');
let searchInputFilterValue = '';
const resultsListFilter = document.getElementById('filter-search-list');
let selectedTagsArray = [];

const searchDataFilter = [
  'culture',
  'esport',
  '!!cat'
];

searchInputFilter.addEventListener('input', event => {
  const searchInputFilter = event.target.value;
  while (resultsListFilter.firstChild) {
    resultsListFilter.removeChild(resultsListFilter.firstChild);
  }

 

  if (searchInputFilter.length > 0) {
    const searchRegexFilter = new RegExp(searchInputFilter, 'i');
    let searchResultsFilter = searchDataFilter.filter(result => result.match(searchRegexFilter) && !selectedTagsArray.includes(result));

    searchResultsFilter = searchResultsFilter.slice(0, 3);
    

    searchResultsFilter.forEach(result => {
      const li = document.createElement('li');
      li.classList.add('result');
      const iconSVG = `<svg class="icon" width="24" height="24"><use xlink:href="Images/Logos/close.png"></use></svg>`;
      li.innerHTML = iconSVG + result;
      resultsListFilter.style.display = 'block';
      li.addEventListener('click', event => {
        searchInputFilter.value = event.target.textContent;
        text = searchDataFilter.indexOf(event.target.textContent);
        if(searchDataFilter[text])
        {
          addSelectedTag(searchDataFilter[text]);
        }
        else{
          console.log("UNDEFINED TAG");
        }
        
      });
      resultsListFilter.appendChild(li);
    });
  }
});

function addSelectedTag(tagText) {
  if (!selectedTagsArray.includes(tagText)) {
    selectedTagsArray.push(tagText);
    const selectedTagDiv = document.createElement('div');
    RemoveSearchResults();
    selectedTagDiv.classList.add('SelectedTag');
    selectedTagDiv.setAttribute('data-tag', tagText);
    selectedTagDiv.innerHTML = `
      <span>${tagText}</span>
      <svg class="FiltersRemoveSelectedTag" alt="RemoveTag" version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 460.775 460.775" style="enable-background:new 0 0 460.775 460.775;" xml:space="preserve">
          <path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55
              c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55
              c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505
              c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55
              l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719
              c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z"
          />
      </svg>
    `;
    selectedTagDiv.querySelector('svg').addEventListener('click', event => {
      removeSelectedTag(event.target.parentNode);
    });
    document.querySelector('.FiltersSelectedTags').appendChild(selectedTagDiv);
  }
}

function removeSelectedTag(selectedTagElement) {
  const tagText = selectedTagElement.getAttribute('data-tag');
  selectedTagsArray = selectedTagsArray.filter(tag => tag !== tagText);
  selectedTagElement.parentNode.removeChild(selectedTagElement);
}

document.addEventListener('click', event => {
  if (event.target !== searchInputFilter) {
      RemoveSearchResults();
  }
});

function RemoveSearchResults(){
  searchInputFilter.blur();
  searchInputFilter.value = '';
  while (resultsListFilter.firstChild) {
    resultsListFilter.removeChild(resultsListFilter.firstChild);
  }
}



// Slider in range
$( "#EventSliderRangePrices" ).slider({
  range: true,
  min: 1,
  max: 50,
  values: [ 1, 50 ],
  slide: function( event, ui ) {
    $( "#amount" ).val( "€" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
  }
});
$( "#amount" ).val( "€" + $( "#EventSliderRangePrices" ).slider( "values", 0 ) +
  " - €" + $( "#EventSliderRangePrices" ).slider( "values", 1 ) );






