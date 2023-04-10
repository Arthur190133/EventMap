<?php    // var_dump($public); ?>

<head><link rel="stylesheet" href="/css/eventFilter.css"></head>
    <div class="LeftContent">
        <div class="EventFilters">
            <p> FILTER </p>
            <div class="filter-search-box">
                <div class="filter-search-content">
                    <input id="filter-search" placeholder="Category_search" type="text" class="NavBarSearchBar">
                    <ul id="filter-search-list"></ul>
                </div>
            </div>

            <div class="FiltersSelectedTags">
                <!--<div class="SelectedTag" id=<?= "SelectedTag" .$i ?>>
                    <span>!!EVENTTAG</span>
                    <svg onclick="RemoveSelectedTag(<?= $i ?>)" class="FiltersRemoveSelectedTag" alt="RemoveTag" version="1.1" id="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 460.775 460.775" style="enable-background:new 0 0 460.775 460.775;" xml:space="preserve">
                            <path d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55
                                c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55
                                c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505
                                c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55
                                l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719
                                c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z"
                            />
                    </svg> 
                </div> -->
            </div>
            <div class="FilterEventProperties">
                <form class="event-filter-form" action="" method="post"> 
                    <div class="event-filter-options">
                        <div class="event-filter-option">
                            <span>PUBLIC</span>
                            <label class="container">
                                <input name="event-filter-public"  type="checkbox" <?= $public ?> >
                                <div class="checkmark"></div>
                            </label>
                            
                        </div>
                        <div class="event-filter-option">
                            <span>PRIVÉ</span>
                            <label class="container">
                                <input name="event-filter-private" type="checkbox"  <?= $private ?>>
                                <div class="checkmark"></div>
                            </label>
                        </div>
                        <div class="event-filter-option">
                            <span>GRATUIT</span>
                            <label class="container">
                                <input name="event-filter-free" type="checkbox"  <?= $free ?>>
                                <div class="checkmark"></div>
                            </label>
                        </div>
                        <div class="event-filter-option">
                            <span>PAYANT</span>
                            <label class="container">
                                <input name="event-filter-paid" type="checkbox"  <?= $paid ?>>
                                <div class="checkmark"></div>
                            </label>
                        </div>
                        </div>
                    </div>
                    <div>
                        <button class="event-filter-button link-button"> FILTER </button>
                    </div>
                </form>
        </div>
        <?php
        require_once '../Pages/Event/EventMapPreview.php';
        ?>
    </div>


<script src="/js/filter.js">
    </script> 