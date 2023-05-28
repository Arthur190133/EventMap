<link href= "\css\WarnedUser.css" rel="stylesheet">
<div class="card">
    <h1>WARNED USER</h1>
    <div class="separator">
        <div class="left">
            <H2>Liste des warm</H2>
            <div class="separator">
                <div class="separator">
                    <p class="pTitle">UserId</p>
                    <p class="pTitle">AdminId</p>
                </div>
                <div class="separator">
                    <p class="pTitle">StartDate</p>
                    <p class="pTitle">EndDate</p>
                </div>
            </div>
            <div class="list">
                <?php require '../templates/admin/warn/listeWarn.php'; ?>
            </div>  
        </div>
        <div class = "line" ></div>
        <div class="right">
            <div class = "InputBox">
                <div class="inline">
                    <div class="inline">
                        <p>UserId</p>
                        <input type="text" name="UserId" placeholder="UserId" required>            
                    </div> 
                    <div class="separator">
                        <div class="inline">
                            <p>StartDate</p>
                            <input type="text" name="StartDate" placeholder="StartDate" required>        
                        </div>
                        <div class="inline">
                            <p>EndDate</p>
                            <input type="text" name="EndDate" placeholder="EndDate" required>
                        </div>
                    </div>
                    <div class="separator">
                        <div class="inline">
                            <p>EndDate</p>
                            <input type="text" name="Comment" placeholder="comment" required>
                        </div>
                    </div>
                    <form method="post">
                        <button class="BTN">Poster</button>
                    </form>
                </div>  
            </div>
        </div>
    </div>
</div>
