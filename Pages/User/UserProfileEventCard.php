<div class="window">
    <div class="align">
        <span class="red"></span>
        <span class="yellow"></span>
        <span class="green"></span>
    </div>

    <h1><?= $Event->Name ?></h1>
    <div>
        <p>prix : <?= $Event->Price;  ?>$<p>
        <p>EventStartDate : <?= $Event->StartDate ?><p>
        <p>EventEndDate : <?= $Event->EndDate ?><p>
    </div>
</div>