<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);

$id = session_id();
$s = 'select * from tg_sessions where session_id="' . $id . '"';
$q = $bdd->query($s);
$ds = $q->fetch();

$ss = 'select * from tg_client where id="' . $ds['client_id'] . '"';
$qq = $bdd->query($ss);
$client = $qq->fetch();

$ss = 'select * from tg_mesure where id_client="' . $client['id'] . '"';
$qq = $bdd->query($ss);
$mesures = $qq->fetch();

$ss = 'select sum(product_price) as total from tg_paniers_items where panier_id="' . $id . '"';
$qq = $bdd->query($ss);
$panier = $qq->fetch();

if ($mesures['type'] == 'mesure-rapide') {
    $href = "panier-modif-mesure-rapide.html";
}
if ($mesures['type'] == 'mesure-chemise') {
    $href = "panier-modif-mesure-chemise.html";
}
if ($mesures['type'] == 'mesurez-vous') {
    $href = "panier-modif-mesure-corps.html";
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Tailorgeorge</title>
        <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>

    <body>

        <!-- INFO-LIVRAISON -->
        <?php include("includes/info-livraison.php"); ?>

        <!-- NAVIGATION -->
        <?php include("includes/navigation.php"); ?>

        <!-- HEADER PANIER -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="header-panier">
                        <li><a class="header-panier-lien" href="panier.html">1. Panier</a></li>
                        <li><a class="header-panier-lien" href="<?php echo $href; ?>">2. Mesures</a></li>
                        <li><a class="header-panier-lien" href="verification-adresse.html">3. Coordonnées</a></li>
                        <li><a class="header-panier-lien lien-actif" href="recapitulatif.html">4. Récapitulatif & Paiement</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--  RECAP  -->
        <div class="container">
            <div class="row">
                <!-- COORDONNEES  -->
                <div class="col-xs-12 col-sm-8">
                    <div class="methode-mesure methode-medium">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6" style="text-align: left;">
                                <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px; text-align: left; color:#f26d7d">Adresse livraison</h2>
                                <ul class="ul-recap">
                                    <li><?php echo $client["prenom_livraison"] . ' ' . $client["nom_livraison"]; ?></li>
                                    <li><?php echo 'Tel.:' . $client["telephone"]; ?></li>
                                    <li><?php echo $client["adresse_livraison"]; ?></li>
                                    <li><?php echo $client["renseignement_livraison"]; ?></li>
                                    <li><?php echo $client["societe_livraison"]; ?></li>
                                    <li><?php echo $client["postal_livraison"]; ?></li>
                                    <li><?php echo $client["ville_livraison"]; ?></li>
                                    <li>
                                        <?php
                                        $s = 'select * from tg_pays where code="' . $client["pays_livraison"] . '"';
                                        $q = $bdd->query($s);
                                        $pays = $q->fetch();
                                        echo $pays['nom'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <?php
                            $mesure_type = '';
                            if ($mesures['type'] == 'mesure-rapide') {
                                $mesure_type = 'Rapide';
                            }
                            if ($mesures['type'] == 'mesure-chemise') {
                                $mesure_type = 'Chemise';
                            }
                            if ($mesures['type'] == 'mesurez-vous') {
                                $mesure_type = 'Corporelles';
                            }
                            ?>
                            <div class="col-xs-12 col-sm-6" style="text-align: left;">
                                <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px; color:#f26d7d; text-align: left">Vos mesures (<?php echo $mesure_type; ?>)</h2>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4" style="text-align: left;">
                                        <ul class="ul-recap">
                                            <li><span class="oswald-regular">Poids :</span> <?php echo $mesures["poids"]; ?> kg</li>
                                            <li><span class="oswald-regular">Taille :</span> <?php echo $mesures["taille"]; ?> cm</li>
                                            <li><span class="oswald-regular">Age :</span> <?php echo $mesures["age"]; ?> ans</li>
                                            <?php
                                            if ($mesures['type'] == 'mesurez-vous') {

                                            }
                                            if ($mesures['type'] == 'mesure-chemise') {

                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-8" style="text-align: left;">
                                        <ul class="ul-recap">
                                            <?php
                                            if ($mesures['type'] == 'mesure-rapide') {
                                                echo '<li><span class="oswald-regular">Taille de chemise :</span> ' . $mesures["mesure_rapide_taille"] . '</li>';
                                                echo '<li><span class="oswald-regular">Encolure :</span> ' . $mesures["mesure_rapide_col"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Longueur des manches :</span> ' . $mesures["mesure_rapide_bras"] . '</li>';
                                                echo '<li><span class="oswald-regular">Coupe de chemise :</span> ' . $mesures["aisance1"] . '</li>';
                                            }
                                            if ($mesures['type'] == 'mesurez-vous') {
                                                echo '<li><span class="oswald-regular">Cou :</span> ' . $mesures["cou"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Poitrine :</span> ' . $mesures["poitrine"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Ceinture :</span> ' . $mesures["ceinture"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Carrure :</span> ' . $mesures["carrure"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Bras Gauche :</span> ' . $mesures["brasgauche"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Bras Droite :</span> ' . $mesures["brasdroit"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Dos :</span> ' . $mesures["dos"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Poignet :</span> ' . $mesures["poignet"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Coupe :</span> ' . $mesures["aisance1"] . '</li>';
                                                echo '<li><span class="oswald-regular">Aisance :</span> ' . $mesures["aisance2"] . '</li>';
                                            }
                                            if ($mesures['type'] == 'mesure-chemise') {
                                                echo '<li><span class="oswald-regular">Carrure :</span> ' . $mesures["carrure_chem"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Poitrine :</span> ' . $mesures["poitrine_chem"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Poignet :</span> ' . $mesures["poignet_chem"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Epaule :</span> ' . $mesures["epaule_chem"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Manche :</span> ' . $mesures["manchestandard"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Dos :</span> ' . $mesures["dos_chem"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Taille :</span> ' . $mesures["taillestandard"] . ' cm</li>';
                                                echo '<li><span class="oswald-regular">Col :</span> ' . $mesures["cou_chem"] . ' cm</li>';
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="methode-mesure methode-medium">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6" style="text-align: left;">
                                <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px; text-align: left; color:#f26d7d">Adresse facturation</h2>
                                <ul class="ul-recap">
                                    <li><?php echo $client["prenom"] . ' ' . $client["nom"]; ?></li>
                                    <li><?php echo 'Tel.:' . $client["telephone"]; ?></li>
                                    <li><?php echo $client["adresse"]; ?></li>
                                    <li><?php echo $client["renseignement"]; ?></li>
                                    <li><?php echo $client["societe"]; ?></li>
                                    <li><?php echo $client["postal"]; ?></li>
                                    <li><?php echo $client["ville"]; ?></li>
                                    <li>
                                        <?php
                                        $s = 'select * from tg_pays where code="' . $client["pays"] . '"';
                                        $q = $bdd->query($s);
                                        $pays = $q->fetch();
                                        echo $pays['nom'];
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-6" style="text-align: left;">
                                <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px; text-align: left; color:#f26d7d">Date Livraison <span style="font-size: 0.6em; text-transform: none; color:#f26d7d">(estimation)</span></h2>
                                <p class="oswald-regular" style="font-size: 1.3em; margin-bottom: 20px; text-align: left;"><?php
                                    $date = strtotime("+8 day");
                                    echo date('d/m/Y', $date);
                                    ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4" style="text-align: left;">
                    <div class="methode-mesure methode-medium">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12" style="text-align: left;max-height: 400px; overflow-y: overlay;">
                                <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px; color:#f26d7d">Détail commande</h2>
                                <?php
                                $id = session_id();
                                $total = 0;
                                $sql = 'select * from tg_paniers_items where panier_id="' . $id . '"';
                                $query = $bdd->query($sql);
                                $img = "";
                                while ($data = $query->fetch()) {
                                    $ss = 'select * from tailorgeorge_modele where id_auto="' . $data['product_id'] . '"';
                                    $qq = $bdd->query($ss);
                                    $dd = $qq->fetch();
                                    $total += $dd["prix"] * $data["quantite"];
                                    $img = end(explode("/", $dd["jpg_face"]));
                                    $imgResult = "../../img/" . $img;
                                    ?>
                                    <div class="row">
                                        <div class="col-xs-11 col-sm-4 col-md-4" style="overflow: hidden;">
                                            <!--<div class="article-panier" style="margin:0px;padding:0px;border-bottom: 1px dashed #BFBFBF;">-->
                                            <div class="photo-article-panier" style="width:110px;min-width:10px;height:100px;">
                                                <img src="<?php echo $imgResult; ?>" alt="" style="transform: translate(-30px);">
                                            </div>
                                        </div>

                                        <div class="col-xs-9 col-sm-5 col-md-5" style="text-align: left">
                                            <p style="font-size:13px;line-height: 1.4em;text-transform: uppercase;"><?php echo $dd["h1"]; ?></p>
                                        </div>
                                        <div class="col-xs-1 col-sm-2 col-md-2" style="text-align:right">
                                            <p class="prix-article-panier oswald-bold" style="font-size:13px;"><?php echo $dd["prix"]; ?>€</p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12" style="text-align: left;">
                                <div class="prix-panier-container">
                                    <ul class="prix-panier">
                                        <li class="li-span-tarif" style="border-top: 1px dashed #BFBFBF;">Total <span><?php echo number_format($total, 2); ?>€</span></li>
                                        <li class="li-span-tarif">Livraison <span>OFFERTE</span></li>
                                        <!--<li>Montal total ttc <span class="li-span-tarif"><?php //echo number_format($panier["total"], 2);                                               ?>€</span></li>-->
                                    </ul>
                                    <a href="paiement.html" class="btn-rose btn-block" style="margin-left:auto; margin-right: auto; ">PAYER <span style="font-size: 0.8em; text-transform: none;"><div>(paiement sécurisé)</div></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--</div>
                    <div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-3 col-md-offset-9">-->

                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript">var t =<?php echo time(); ?></script>
        <script type="text/javascript" src="js/index.js"></script>

    </body>

</html>