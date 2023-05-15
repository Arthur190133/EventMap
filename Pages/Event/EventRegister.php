<link rel="stylesheet" href="/css/EventRegister.css">
<head>
    <title>EventMap | Event-Register</title>
</head>
<div class="event-register-box">
    <div class="event-register">
        <form action="" method="post">
            <div>
                <form action="" method="post">
                    <div class="event-register-content">
                        <div class="input-box">
                            <input class="custom-input" placeholder="Nom de l'évènement" name="EventName" required/>
                        </div>
                        <div class="input-box">
                            <input class="custom-input" placeholder="Emplacement" name="EventLocation" required>
                            <input class="custom-input" placeholder="Catégorie" name="EventCategory" required />
                        </div>
                        <div class="long-input-box">
                            <div class="input-box">
                                <p>du</p>
                                <input class="custom-input long-custom-input" placeholder="Date de début" name="EventName" type="date" required/>
                                <p>au</p>
                                <input class="custom-input long-custom-input" placeholder="Date de fin" name="EventName" type="date"required/>
                            </div> 
                        </div>
  
                        <div class="long-input-box">
                            <div class="input-box">
                                <p>évènement privée</p>
                                <input class="input-checkbox"type="checkbox" name="EventPrivate">
                                <p>Nombre de personnes</p>
                                <input disabled class="custom-input" type="number" min="2" value="2" max="999"/>
                            </div>  
                        </div>

                        <div class="long-input-box">
                            <div class="input-box">
                                <p>évènement payant</p>
                                <input class="input-checkbox"type="checkbox" name="EventPaid"/>
                                <input disabled class="custom-input" type="number" value="0.01" step="0.01" min="0.01" max="100.0" />
                            </div>
                        </div>

                        
                        <div class="long-input-box">
                            <div class="input-upload">
                                <h1>!!Thumbnail</h1>
                                <button id='button-import-thumbnail' type="button" class="upload-thumbnail">
                                    <input name="ThumbnailImage" id="GetFileThumbnail"  type="file" placeholder="Votre Thumbnail" style="display:none">
                                    <span class="svg-overlay">
                                        <img src="/Images/Logos/Camera.png" height="80px" width="80px" alt="Votre SVG" />
                                    </span>
                                </button>
                            </div>
                            <div class="input-upload">
                                <h1>!!Background</h1>
                                <button id='button-import-background' type="button" class="upload-background">
                                    <input name="BackgroundImage" id="GetFileBackground"  type="file" placeholder="Votre Background" style="display:none">
                                    <span class="svg-overlay">
                                        <img src="/Images/Logos/Camera.png" height="80px" width="80px" alt="Votre SVG" />
                                    </span>
                                </button>
                            </div>
                            

                        </div>


                    </div>	
                    <button class="EventRegisterButton">Créer l'évènement</button>
            </div>	
        </form>
    </div>
</div>

<script src="/js/eventRegister.js"></script> 

