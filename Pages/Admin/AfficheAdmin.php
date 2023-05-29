<a>
    <div>
        <div class="username">
            <div class = "NameBox">
                <h3><?= $admins->UserName?></h3>
            </div>
            <form method="post">
                <button value="<?= $admins->UserId ?>" name="delete" class = "button2">Rétrograder</button>
            </form>
        </div>
    </div>
</a>