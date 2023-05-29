<a>
    <div>
        <div class="username">
            <div class = "NameBox">
                <h3><?= $user->UserName?></h3>
            </div>
            <form method="post">
                <button name="create" value="<?= $user->UserId ?>"class = "button1">Nouvel Admin</button>
                <!-- <button  name="delete" value="<?= $user->UserId ?>" class = "button2">Supprimer</button> -->
            </form>
        </div>
    </div>
</a>