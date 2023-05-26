
<link href= "\css\adminPage.css" rel="stylesheet">
<h1>Page des admins</h1>
<div class = Contenaire>
    <div class="card">
        <div class="tools">
            <div class="circle">
                <span class="red box"></span>
            </div>
            <div class="circle">
                <span class="yellow box"></span>
            </div>
            <div class="circle">
                <span class="green box"></span>
            </div>
        </div>
        <div class="card__content">
            <h2>Liste des Utilisateurs</h2>
            <div class="liste">
                <ul>
                    <?php require '../templates/admin/AfficheUser.php'; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="card2">
        <div class="tools">
            <div class="circle">
                <span class="red box"></span>
            </div>
            <div class="circle">
                <span class="yellow box"></span>
            </div>
            <div class="circle">
                <span class="green box"></span>
            </div>
        </div>
        <div class="card__content">
            <h2>Liste des Admin</h2>
            <div class="liste">
                <ul>
                    <?php require '../templates/admin/AfficheAdmin.php'; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
