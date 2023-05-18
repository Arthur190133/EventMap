<link rel="stylesheet" href="/css/EventRegister.css">
<head>
    <title>EventMap | Event-Register</title>
</head>
<div class="event-register-box">
    <div class="event-register">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <form action="" method="post">
                    <div class="event-register-content">
                        <div class="input-box">
                            <input class="custom-input" placeholder="Nom de l'évènement" name="EventName" value="<?= $SavedEventName ?>" required/>
                        </div>
                        <div class="input-box">
                            <input class="custom-input" placeholder="Emplacement" name="EventLocation" value="<?= $SavedEventLocation ?>" required>
                            <input class="custom-input" placeholder="Catégorie" name="EventCategory" value="<?= $SavedEventCategory ?>" required />
                        </div>
                        <div class="long-input-box">
                            <div class="input-box">
                                <p>du</p>
                                <input class="custom-input long-custom-input" placeholder="Date de début" name="EventStartDate" type="datetime-local" value="<?= $SavedEventStartDate ?>" required/>
                                <p>au</p>
                                <input class="custom-input long-custom-input" placeholder="Date de fin" name="EventEndDate" type="datetime-local" value="<?= $SavedEventEndDate ?>"required/>
                            </div> 
                        </div>
                        <div class="long-input-box">
                            <textarea placeholder="Description de l'évènement" name="EventDescription"  required></textarea>
                        </div>

                        <div class="long-input-box">
                            <div class="input-box">
                                <p>limite de places</p>
                                <input class="input-checkbox"type="checkbox" name="EventLimitedPlaces">
                                <p>Nombre de personnes</p>
                                <input name="EventNumber" class="custom-input" type="number" min="2" value="2" max="999"/>
                            </div>
                        </div>
  
                        <div class="long-input-box">
                            <div class="input-box">
                                <p>évènement privée</p>
                                <input class="input-checkbox"type="checkbox" name="EventPrivate">
                            </div>  
                        </div>

                        <div class="long-input-box">
                            <div class="input-box">
                                <p>évènement payant</p>
                                <input class="input-checkbox" type="checkbox" name="EventPaid"/>
                                <input  class="custom-input" type="number" name="EventPrice" value="0.01" step="0.01" min="0.01" max="100.0" />
                            </div>
                        </div>

                        <div class="long-input-box">
                            <div class="filter-search-box">
                                <div class="filter-search-content">
                                    <input id="filter-search" placeholder="Effectuez une recherche par tag" type="text" class="NavBarSearchBar">
                                    <ul id="filter-search-list"></ul>
                                </div>
                            </div>

                            <div class="FiltersSelectedTags">
                               
                            </div>
                        </div>
                        
                        <div class="long-input-box">
                            <div class="input-upload">
                                <h1>!!Thumbnail</h1>
                                <button id='button-import-thumbnail' type="button" class="upload-thumbnail">
                                    <input name="EventThumbnail" id="GetFileThumbnail"  type="file" placeholder="Votre Thumbnail" style="display:none">
                                    <span class="svg-overlay">
                                        <img src="/Images/Logos/Camera.png" height="80px" width="80px" alt="Votre SVG" />
                                    </span>
                                </button>
                            </div>
                            <div class="input-upload">
                                <h1>!!Background</h1>
                                <button id='button-import-background' type="button" class="upload-background">
                                    <input name="EventBackground" id="GetFileBackground"  type="file" placeholder="Votre Background" style="display:none">
                                    <span class="svg-overlay">
                                        <img src="/Images/Logos/Camera.png" height="80px" width="80px" alt="Votre SVG" />
                                    </span>
                                </button>
                            </div>
                            

                        </div>


                    </div>	
                    <button id="CreateEvent" class="EventRegisterButton">Créer l'évènement</button>
            </div>	
        </form>
    </div>
</div>

<script src="/js/eventRegister.js"></script> 

