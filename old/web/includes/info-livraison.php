<?php
if(TgSession::getLivraisonInfo($bdd)=="1")
{
?>
    <div class="container-fluid info-livraison" id="info">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="info-livraison-container">
                        <p class="dinpro-medium">Livraison gratuite en France sous 8 jours</p>
                        <img src="img/icon-croix-blanche.svg" alt="Croix blanche" onclick="fermerInfoLivraison()">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>