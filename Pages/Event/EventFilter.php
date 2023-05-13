<?php    // var_dump($public); ?>

<head><link rel="stylesheet" href="/css/eventFilter.css"></head>
    <div class="LeftContent">
        <div class="EventFilters">
            <p> FILTRE </p>
            <div class="filter-search-box">
                <div class="filter-search-content">
                    <input id="filter-search" placeholder="Effectuez une recherche par tag" type="text" class="NavBarSearchBar">
                    <ul id="filter-search-list"></ul>
                </div>
            </div>

            <div class="FiltersSelectedTags">
                <?php require '../templates/event/EventFilterTags.php'; ?>
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
                        <button class="event-filter-button link-button" id="button-event-filter"> FILTER </button>
                    </div>
                </form>
        </div>
        <?php
        require_once '../Pages/Event/EventMapPreview.php';
        ?>
    </div>
    <script src="../config/Data.json" type="text/javascript" >
    </script>
    <script src="/js/filter.js">
    </script>