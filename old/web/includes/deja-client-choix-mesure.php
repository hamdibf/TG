<!-- CHOIX TYPE DE MESURE -->
 <?php
    $ss = 'select * from tg_mesure where id_client="' . $client['id'] . '"';
    $qq = $bdd->query($ss);
    $mesures = $qq->fetch();
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h2 class="methode-titre oswald-regular">Bonjour <?php echo $client['salutation'] . ' ' . strtoupper($client['prenom']) . ' ' . strtoupper($client['nom']); ?> !</h2>
            <p class="choix-methode-mesure">Pour cette commande vous désirez utilisez quelle mesures ?</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="methode-mesure" style="min-height: 0px;">
                <h2 class="methode-titre oswald-regular">Utiliser <b>les mêmes mesures</b><br> que votre derniere commande</h2>
                <p class="duree-methode oswald-regular" style="text-decoration: underline; cursor: pointer;" data-toggle="modal" data-target="#myModal">votre commande de<br>(<?php if (!empty($dateCommandePayee)) echo $dateCommandePayee; ?>)</p>
                <div class="methode-mesure-img mesure-rapide"></div>
<!--                <p class="methode-content">Les mesures de la dernière commande étaient bonnes, vous voulez réutilisez les mêmes.</p>-->
                <a href="verification-adresse.html" class="btn-rose">suivant</a>
            </div>
        </div>
        <!--        <div class="col-xs-12 col-sm-4">
                    <div class="methode-mesure">
                        <h2 class="methode-titre oswald-regular">Modifier quelques <br>mesures</h2>
                        <p class="duree-methode oswald-regular">3 min</p>
                        <div class="methode-mesure-img mesure-vous"></div>
                        <p class="methode-content">Vous voulez modifiez quelques mesures par rapport à la dernière commande pour un résultat parfait.</p>
                        <a href="panier-2-modif-mesure.html" class="btn-rose">suivant</a>
                    </div>
                </div>-->
        <div class="col-xs-12 col-sm-6">
            <div class="methode-mesure" style="min-height: 0px;">
                <h2 class="methode-titre oswald-regular">Modifier vos mesures</h2>
<!--                <p class="duree-methode oswald-regular">3 min</p>-->
                <div class="methode-mesure-img mesure-chemise"></div>
<!--                <p class="methode-content">Vous avez grossi :( ou maigri :) ? Pas de soucis, entrez de nouvelles mesures pour cette commande.</p>-->
                <?php 
                    if ($mesures["type"] == "mesure-rapide"){
                        echo '<a href="panier-modif-mesure-rapide.html" class="btn-rose">suivant</a>';
                    } elseif ($mesures["type"] == "mesurez-vous"){
                        echo '<a href="panier-modif-mesure-corps.html" class="btn-rose">suivant</a>';
                    } elseif ($mesures["type"] == "mesure-chemise"){
                        echo '<a href="panier-modif-mesure-chemise.html" class="btn-rose">suivant</a>';
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title" id="myModalLabel" style="font-size:20px;">Vos mesures</h1>
            </div>
            <div class="modal-body" style="font-size:16px;">
                <?php
                if ($mesures['type'] = 'mesure-rapide') {
                    echo '<p><strong>Mode de mesures: Rapide</strong></p>';
                    echo '<ul style="margin-top: 12px;margin-left: 30px;line-height: 35px;list-style: circle;font-size:16px;">';
                    echo '<li>VOTRE TAILLE DE CHEMISE: ' . $mesures['mesure_rapide_taille'] . '</li>';
                    echo '<li>VOTRE ENCOLURE: ' . $mesures['mesure_rapide_col'] . '</li>';
                    echo '<li>LA LONGUEUR DE VOS MANCHES: ' . $mesures['mesure_rapide_bras'] . '</li>';
                    echo '<li>LA COUPE DE VOTRE CHEMISE: ' . $mesures['coupe_vous'] . '</li>';
                    echo '</ul>';
                }

                if ($mesures['type'] = 'mesurez-vous') {
                    echo '<p><strong>Mode de mesures: Mesures corporelles</strong></p>';
                    echo '<ul style="margin-top: 12px;margin-left: 30px;line-height: 35px;list-style: circle;font-size:16px;">';
                    echo '<li>COU: ' . $mesures['cou'] . '</li>';
                    echo '<li>POITRINE: ' . $mesures['poitrine'] . '</li>';
                    echo '<li>CEINTURE: ' . $mesures['ceinture'] . '</li>';
                    echo '<li>CARRURE: ' . $mesures['carrure'] . '</li>';
                    echo '<li>DOS: ' . $mesures['dos'] . '</li>';
                    echo '<li>POIGNET: ' . $mesures['poignet'] . '</li>';
                    echo '<li>BRAS DROIT: ' . $mesures['brasdroit'] . '</li>';
                    echo '<li>BRAS GAUCHE: ' . $mesures['brasgauche'] . '</li>';
                    echo '</ul>';
                }

                if ($mesures['type'] = 'mesurez-vous') {
                    echo '<p><strong>Mode de mesures: Mesures sur chemise</strong></p>';
                    echo '<ul style="margin-top: 12px;margin-left: 30px;line-height: 35px;list-style: circle;font-size:16px;">';
                    echo '<li>COU: ' . $mesures['cou_chem'] . '</li>';
                    echo '<li>POITRINE: ' . $mesures['poitrine_chem'] . '</li>';
                    echo '<li>EPAULE: ' . $mesures['epaule_chem'] . '</li>';
                    echo '<li>CARRURE: ' . $mesures['carrure_chem'] . '</li>';
                    echo '<li>DOS: ' . $mesures['dos_chem'] . '</li>';
                    echo '<li>POIGNET: ' . $mesures['poignet_chem'] . '</li>';
                    echo '<li>MANCHE: ' . $mesures['manchestandard'] . '</li>';
                    echo '<li>DEMI-TAILLE: ' . $mesures['taillestandard'] . '</li>';
                    echo '</ul>';
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
