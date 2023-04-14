<link rel="stylesheet" href="/css/main.css">
<div class="recommendated-cards">
  <div class="recommendated-cards-content">
    <div class="recommentation-card">
        <div class="recommentation-card-second">
            <div class="recommendation-card-background">
            </div>
            <div class="recommendation-card-location"><?= $events->data[1]->Location ?></div>
            <div class="recommendation-card-name"><?= $events->data[1]->Name ?></div>
            <div class="recommendation-card-descrition">
            <?= $events->data[1]->Description ?>
            </div>
            <div class="recommendation-card-info second clearfix">
            <div class="one-third">
                <div class="stat"><?= $events->data[1]->NumberOfUsers ?></div>
                <div class="stat-value"><?= ($events->data[1]->NumberOfUsers >1 )? 'Participants' : 'Participant' ?></div>
            </div>
            <div class="one-third">
                <div class="stat"><?= $events->data[1]->Price ?><sup>€</sup></div>
                <div class="stat-value">Publique</div>
            </div>
            <div class="one-third no-border">
                <div class="stat">150</div>
                <div class="stat-value">Cost</div>
            </div>
            </div>
        </div>

    </div>
    <div class="recommentation-card">
        <div class="recommentation-card-first">
            <div class="recommendation-card-background">
            </div>
            <div class="recommendation-card-content">
                <div class="recommendation-card-location"><?= $events->data[0]->Location ?></div>
                <div class="recommendation-card-name"><?= $events->data[0]->Name ?></div>
                <div class="recommendation-card-descrition">
                <?= $events->data[0]->Description ?>
                </div>
            </div>

            <div class="recommendation-card-info first clearfix">
            <div class="one-third">
                <div class="stat"><?= $events->data[0]->NumberOfUsers ?></div>
                <div class="stat-value"><?= ($events->data[0]->NumberOfUsers >1 )? 'Participants' : 'Participant' ?></div>
            </div>
            <div class="one-third">
                <div class="stat"><?= $events->data[0]->Price?><sup>€</sup></div>
                <div class="stat-value">Publique</div>
            </div>
            <div class="one-third no-border">
                <div class="stat">150</div>
                <div class="stat-value">Cost</div>
            </div>
            </div>
        </div>
    </div>
    <div class="recommentation-card">
        <div class="recommentation-card-third">
            <div class="recommendation-card-background">
            </div>
            <div class="recommendation-card-location"><?= $events->data[2]->Location ?></div>
            <div class="recommendation-card-name"><?= $events->data[2]->Name ?></div>
            <div class="recommendation-card-descrition">
            <?= $events->data[2]->Description ?>
            </div>
            <div class="recommendation-card-info third clearfix">
            <div class="one-third">
                <div class="stat"><?= $events->data[2]->NumberOfUsers ?></div>
                <div class="stat-value"><?= ($events->data[2]->NumberOfUsers >1 )? 'Participants' : 'Participant' ?></div>
            </div>
            <div class="one-third">
                <div class="stat"><?= $events->data[2]->Price ?><sup>€</sup></div>
                <div class="stat-value">Publique</div>
            </div>
            <div class="one-third no-border">
                <div class="stat">150</div>
                <div class="stat-value">Cost</div>
            </div>
            </div>
        </div>
    </div>
  </div> 
</div> 