<link rel="stylesheet" type="text/css" href="/css/wallet.css">
<h1>Bienvenue dans votre portefeuille EventMap</h1>
<div class="wallet-content">
    <div class="wallet-parts">
        <p>Vous avez un total de <?= $user->UserWallet ?>€ sur votre compte</p>
    </div>
    <div class="wallet-parts">
        <a href="wallet">Ajouter des fonts à votre portefeuille</a><br>
    </div>
    <div class="wallet-parts wallet-history">
        <svg fill="white" width="24px" height="24px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8.06.56A8.05 8.05 0 0 0 1.24 4.2V1.55H0V5a1.16 1.16 0 0 0 1.15 1.14h3.44V4.9H2.27a6.79 6.79 0 0 1 5.79-3.1 6.48 6.48 0 0 1 6.7 6.2 6.48 6.48 0 0 1-6.7 6.2A6.48 6.48 0 0 1 1.36 8H.12a7.71 7.71 0 0 0 7.94 7.44A7.71 7.71 0 0 0 16 8 7.71 7.71 0 0 0 8.06.56z"/><path d="M7.44 4.28v4.34h3.6V7.38H8.68v-3.1H7.44z"/></svg>
        <div class="wallet-history-content">
            <p>Voici l'historique de vos transactions</p>  
            <div class="wallet-history-elements">
                <div class="wallet-history-element">
                    <span>EVENT NAME</span>
                    <span>EVENT DATE</span>
                </div>
            </div>

        </div>
    </div>
</div>
