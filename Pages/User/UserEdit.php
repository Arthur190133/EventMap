<div id="profileEdit">
    <div class="card">
        <div class="card__content">
            <span class="img"></span>
            <div class="input-group">
                <label class="label">Prenom</label>
                <input type="text" class="input" name="newUserFirstName" placeholder="Prenom" value="<?=$_SESSION['user']->UserFirstName?>">
                <div>

                </div>
            </div>
            <div class="input-group">
                <label class="label">Nom</label>
                <input type="text" class="input" name="newUserLastName" placeholder="Nom" value="<?=$_SESSION['user']->UserName?>">
                <div>
                    
                </div>
            </div>
            <div class="input-group">
                <label class="label">Description</label>
                <input type="text" class="input" name="newUserDescription" placeholder="Description" value="<?=$_SESSION['user']->UserDescription?>">
                <div>
                    
                </div>
            </div>
            <button class="button2 id="btnModif" name="btnModif" value="nouveau">Enregistrer</button>
        </div>
        <div class="blob"></div>
        <div class="blob"></div>
        <div class="blob"></div>
        <div class="blob"></div>
        <div class="blob"></div>
        <div class="blob"></div>
    </div>
</div>

    