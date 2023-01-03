<div class="Content">
    <div class="LeftContent">
        <div class="EventFilters">
            <script>
                GenerateEventSliderRangePrices();
            </script>
            <p> FILTER </p>
            <div>
                <input type="search" placeholder="Recherche par tag">
                <select name="" id="">
                    <option value="">ESP0RT</option>
                    <option value="">CULTURE</option>
                    <option value="">LOISIR</option>
                </select>
            </div>
            <div class="FiltersSelectedTags">
                <?php
                    for($i = 0; $i < 14 ;$i++)
                    {
                ?>
                <div class="SelectedTag" id=<?= "SelectedTag" .$i ?>>
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
                </div>
                <?php  
                    }
                ?>
            </div>
            <div class="FiltersEventProperties">
                <div>
                    <span>PRIVÉ</span>
                    <input type="checkbox" checked="checked" />
                </div>
                <div>
                    <span>GRATUIT</span>
                    <input type="checkbox" checked="checked" />
                </div>
                <div>
                    <span>PAYANT</span>
                    <input type="checkbox" checked="checked" />
                </div>
                <div>
                    <!-- seulement si payant -->
                    <p>
                        <label for="amount">Price range:</label>
                        <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <div id="EventSliderRangePrices">
                    </div>
                </div>
            </div>

            <div>
                <button> FILTER </button>
            </div>
        </div>
        <?php
        require_once 'Pages/Event/EventMapPreview.php';
        ?>
    </div>

    <div class="EventsContent">
        <div class ="EventButtons">
            <?php 
                $NumberOfEvents = GetNumberOfEvents();
                for($i = 1; $i <= $NumberOfEvents ; $i++){
                    $CurrentEventId = $i;
                    require 'Pages/Event/EventCard.php';
                }
            ?>
        </div>
        <div class="SearchMoreEventContent">
            <img class="SearchMoreEventImage SearchImage" onclick="SearchMoreEvent()" src="Images/Logos/DownArrow.png" alt="Search more event button image"> 
            <img class="SearchMoreEventImage2 SearchImage" onclick="SearchMoreEvent()" src="Images/Logos/DownArrow.png" alt="Search more event button image"> 
        </div>
    </div>  
</div>

<div id="Event">
</div>
<div id="ErrorContent">
</div>
</div>






       
