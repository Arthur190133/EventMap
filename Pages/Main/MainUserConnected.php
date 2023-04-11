<link rel="stylesheet" href="/css/main.css">
<div class="recommendated-cards">
  <div class="recommendated-cards-content">
    <div class="recommentation-card">
        <div class="recommentation-card-second">
            <div class="recommendation-card-background">
            </div>
            <div class="recommendation-card-location">Belgique</div>
            <div class="recommendation-card-name">Walibi</div>
            <div class="recommendation-card-descrition">
                EventDescription
            </div>
            <div class="recommendation-card-info second clearfix">
            <div class="one-third">
                <div class="stat">0</div>
                <div class="stat-value">Participants</div>
            </div>
            <div class="one-third">
                <div class="stat">30<sup>€</sup></div>
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
            <div class="recommendation-card-location"><?= $events->data[0]->Location ?></div>
            <div class="recommendation-card-name"><?= $events->data[0]->Name ?></div>
            <div class="recommendation-card-descrition">
            <?= $events->data[0]->Description ?>
            </div>
            <div class="recommendation-card-info first clearfix">
            <div class="one-third">
                <div class="stat"><?= $events->data[0]->NumberOfUsers ?></div>
                <div class="stat-value">Participants</div>
            </div>
            <div class="one-third">
                <div class="stat">30<sup>€</sup></div>
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
            <div class="recommendation-card-location">Belgique</div>
            <div class="recommendation-card-name">Walibi</div>
            <div class="recommendation-card-descrition">
                EventDescription
            </div>
            <div class="recommendation-card-info third clearfix">
            <div class="one-third">
                <div class="stat">0</div>
                <div class="stat-value">Participants</div>
            </div>
            <div class="one-third">
                <div class="stat">30<sup>€</sup></div>
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