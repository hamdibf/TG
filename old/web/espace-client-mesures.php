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

if (!empty($_REQUEST)) {
    $type_mesure = $_REQUEST['typeMesure'];

    if (isset($_SESSION['client_id'])) {
        $client_id = $_SESSION['client_id'];
    }
    if ($type_mesure == "mesure-rapide") {
        /* $_SESSION['mesure-rapide-taille'] = $_REQUEST['mesure-rapide-taille'];
          $_SESSION['mesure-rapide-col'] = $_REQUEST['mesure-rapide-col'];
          $_SESSION['mesure-rapide-bras'] = $_REQUEST['mesure-rapide-bras'];
          $_SESSION['aisance-coupe_rapide'] = $_REQUEST['aisance-coupe_rapide']; */

        if (TgSession::getEmailConnected($bdd) != '') {
            $update = 'update tg_mesure set type="' . $type_mesure . '",age="' . $_REQUEST['age'] . '",taille="' . $_REQUEST['taille'] . '",poids="' . $_REQUEST['poids'] . '",mesure_rapide_taille="' . $_REQUEST['mesure-rapide-taille'] . '",mesure_rapide_col="' . $_REQUEST['mesure-rapide-col'] . '",mesure_rapide_bras="' . $_REQUEST['mesure-rapide-bras'] . '",coupe_vous="' . $_REQUEST['aisance-coupe_rapide'] . '" ,mesure_modif=1, date_modif=(SELECT DATE_FORMAT(NOW(),\'%d/%m/%Y\')) where id_client="' . TgSession::getIdConnected($bdd) . '"';
            $bdd->exec($update);
        }
    }

    if ($type_mesure == "mesure-chemise") {

        /* $_SESSION['col_chemise'] = $_REQUEST['col_chemise'];
          $_SESSION['poignet_chemise'] = $_REQUEST['poignet_chemise'];
          $_SESSION['manche_chemise'] = $_REQUEST['manche_chemise'];
          $_SESSION['demi-poitrine_chemise'] = $_REQUEST['demi-poitrine_chemise'];
          $_SESSION['demi-taille_chemise'] = $_REQUEST['demi-taille_chemise'];
          $_SESSION['dos_chemise'] = $_REQUEST['dos_chemise'];
          $_SESSION['carrure_chemise'] = $_REQUEST['carrure_chemise'];
          $_SESSION['epaule_chemise'] = $_REQUEST['epaule_chemise']; */

        if (TgSession::getEmailConnected($bdd) != '') {
            $update = 'update tg_mesure set type="' . $type_mesure . '",age="' . $_REQUEST['age'] . '",taille="' . $_REQUEST['taille'] . '",poids="' . $_REQUEST['poids'] . '",cou_chem="' . $_REQUEST['col_chemise'] . '",poignet_chem="' . $_REQUEST['poignet_chemise'] . '",poitrine_chem="' . $_REQUEST['demi-poitrine_chemise'] . '",dos_chem="' . $_REQUEST['dos_chemise'] . '",carrure_chem="' . $_REQUEST['carrure_chemise'] . '",epaule_chem="' . $_REQUEST['epaule_chemise'] . '",manchestandard="' . $_REQUEST['manche_chemise'] . '",taillestandard="' . $_REQUEST['demi-taille_chemise'] . '" ,mesure_modif=1 ,date_modif=(SELECT DATE_FORMAT(NOW(),\'%d/%m/%Y\')) where id_client="' . TgSession::getIdConnected($bdd) . '"';
            $bdd->exec($update);
        }
    }

    if ($type_mesure == "mesurez-vous") {
        /* $_SESSION['cou_vous'] = $_REQUEST['cou_vous'];
          $_SESSION['poitrine_vous'] = $_REQUEST['poitrine_vous'];
          $_SESSION['ceinture_vous'] = $_REQUEST['ceinture_vous'];
          $_SESSION['carrure_vous'] = $_REQUEST['carrure_vous'];
          $_SESSION['bras-droit_vous'] = $_REQUEST['bras-droit_vous'];
          $_SESSION['bras-gauche_vous'] = $_REQUEST['bras-gauche_vous'];
          $_SESSION['coupe_vous'] = $_REQUEST['coupe_vous'];
          $_SESSION['aisance_vous'] = $_REQUEST['aisance_vous'];
          $_SESSION['dos_vous'] = $_REQUEST['dos_vous'];
          $_SESSION['poignet_vous'] = $_REQUEST['poignet_vous']; */

        if (TgSession::getEmailConnected($bdd) != '') {
            $update = 'update tg_mesure set type="' . $type_mesure . '",age="' . $_REQUEST['age'] . '",taille="' . $_REQUEST['taille'] . '",poids="' . $_REQUEST['poids'] . '",cou="' . $_REQUEST['cou_vous'] . '",poitrine="' . $_REQUEST['poitrine_vous'] . '",ceinture="' . $_REQUEST['ceinture_vous'] . '",carrure="' . $_REQUEST['carrure_vous'] . '",dos="' . $_REQUEST['dos_vous'] . '",poignet="' . $_REQUEST['poignet_vous'] . '",brasdroit="' . $_REQUEST['bras-droit_vous'] . '",brasgauche="' . $_REQUEST['bras-gauche_vous'] . '",aisance1="' . $_REQUEST['coupe_vous'] . '",aisance2="' . $_REQUEST['aisance_vous'] . '" ,mesure_modif=1, date_modif=(SELECT DATE_FORMAT(NOW(),\'%d/%m/%Y\')) where id_client="' . TgSession::getIdConnected($bdd) . '"';
            $bdd->exec($update);
        }
    }
}


if ($ds['client_id'] != 0) {
    $sqlMesures = 'select * from tg_mesure where id_client="' . TgSession::getIdConnected($bdd) . '"';
    $queryMesures = $bdd->query($sqlMesures);
    $resultMesures = $queryMesures->fetch();
    $_SESSION['type_mesure'] = $resultMesures['type'];
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

        <!-- HEADER CONNEXION -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="header-page bgk-connexion">
                        <p class="fil-arianne oswald-regular"><a href="index.php">accueil</a> / <a href="connexion.php">login</a></p>
                        <h1 class="fil-arianne-activ oswald-regular">Espace client de <?php echo $client["prenom"] . ' ' . $client["nom"]; ?></h1>
                        <a class="modele-find" href="connexion.php">Déconnexion</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ESPACE CLIENT -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-2">
                    <!-- SOUS NAVIGATION -->
                    <ul class="espace-client-sous-nav">
                        <li><a class="oswald-regular" href="espace-client.php">Commandes</a></li>
                        <li><a class="oswald-regular" href="espace-client-coordonnees.php">Coordonnées</a></li>
                        <li><a class="oswald-regular sous-nav-actif" href="espace-client-mesures.php">Mesures</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-10">
                    <!-- COORDONNEES CONTAINER -->
                    <div class="methode-mesure methode-small">
                        <h2 class="methode-titre oswald-regular" style="margin-bottom: 30px;">Vos mesures</h2>
                        <div class="row">
                            <?php
                            if (!empty($resultMesures)) {
                                if ($resultMesures["type"] == "mesure-rapide") {
                                    echo '<div class="col-xs-12 col-sm-4" style="text-align: left; margin-bottom: 15px;">
                                            <ul class="ul-recap"><h2 class="oswald-regular" style="font-size: 1.5em; margin-bottom: 10px; color:#f26d7d; text-align: left">Mesures rapides</h2></ul></div>
                                            <div class="col-xs-12 col-sm-4" style="text-align: left; margin-bottom: 15px;">
                                            <ul class="ul-recap">
                                        <li><span class="oswald-regular">Poids :</span> ' . $resultMesures["poids"] . ' kg</li>
                                        <li><span class="oswald-regular">Taille :</span> ' . $resultMesures["taille"] . ' cm</li>
                                        <li><span class="oswald-regular">Age :</span> ' . $resultMesures["age"] . ' ans</li>
                                    </ul></div>
                                    <div class="col-xs-12 col-sm-4" style="text-align: left; margin-bottom: 15px;">
                                            <ul class="ul-recap">
                                        <li><span class="oswald-regular">Mesure rapide taille :</span> ' . $resultMesures["mesure_rapide_taille"] . '</li>
                                        <li><span class="oswald-regular">Mesure rapide col :</span> ' . $resultMesures["mesure_rapide_col"] . ' cm</li>
                                        <li><span class="oswald-regular">Mesure rapide bras :</span> ' . $resultMesures["mesure_rapide_bras"] . '</li>
                                        <li><span class="oswald-regular">Mesure rapide coupe :</span> ' . $resultMesures["coupe_vous"] . '</li>
                                    </ul></div>';
                                }
                                if ($resultMesures["type"] == "mesurez-vous") {
                                    echo '<div class="col-xs-12 col-sm-4" style="text-align: left; margin-bottom: 15px;">
                                            <ul class="ul-recap"><h2 class="oswald-regular" style="font-size: 1.5em; margin-bottom: 10px; color:#f26d7d; text-align: left">Mesures corporelle</h2></ul></div>
                                            <div class="col-xs-12 col-sm-4" style="text-align: left; margin-bottom: 15px;">
                                        <ul class="ul-recap">
                                            <li><span class="oswald-regular">Poids :</span> ' . $resultMesures["poids"] . ' kg</li>
                                            <li><span class="oswald-regular">Taille :</span> ' . $resultMesures["taille"] . ' cm</li>
                                            <li><span class="oswald-regular">Age :</span> ' . $resultMesures["age"] . ' ans</li>
                                            <li><span class="oswald-regular">Coupe :</span> ' . $resultMesures["aisance1"] . '</li>
                                            <li><span class="oswald-regular">Cou :</span> ' . $resultMesures["cou"] . ' cm</li>
                                            <li><span class="oswald-regular">Poitrine :</span>' . $resultMesures["poitrine"] . ' cm</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-4" style="text-align: left; margin-bottom: 15px;">
                                        <ul class="ul-recap">
                                            <li><span class="oswald-regular">Carrure :</span> ' . $resultMesures["carrure"] . ' cm</li>
                                            <li><span class="oswald-regular">Dos :</span> ' . $resultMesures["dos"] . ' cm</li>
                                            <li><span class="oswald-regular">Bras droit :</span> ' . $resultMesures["brasdroit"] . ' cm</li>
                                            <li><span class="oswald-regular">Bras gauche :</span> ' . $resultMesures["brasgauche"] . ' cm</li>
                                            <li><span class="oswald-regular">Poignets :</span> ' . $resultMesures["poignet"] . ' cm</li>
                                            <li><span class="oswald-regular">Ceinture :</span> ' . $resultMesures["ceinture"] . ' cm</li>
                                        </ul>
                                    </div>';
                                }
                                if ($resultMesures["type"] == "mesure-chemise") {
                                    echo '<div class="col-xs-12 col-sm-4" style="text-align: left; margin-bottom: 15px;">
                                            <ul class="ul-recap"><h2 class="oswald-regular" style="font-size: 1.5em; margin-bottom: 10px; color:#f26d7d; text-align: left">Mesures chemise</h2></ul></div>
                                            <div class="col-xs-12 col-sm-4" style="text-align: left; margin-bottom: 15px;">
                                        <ul class="ul-recap">
                                            <li><span class="oswald-regular">Poids :</span> ' . $resultMesures["poids"] . ' kg</li>
                                            <li><span class="oswald-regular">Taille :</span> ' . $resultMesures["taille"] . ' cm</li>
                                            <li><span class="oswald-regular">Age :</span> ' . $resultMesures["age"] . ' ans</li>
                                            <li><span class="oswald-regular">Cou chemise :</span> ' . $resultMesures["cou_chem"] . ' cm</li>
                                            <li><span class="oswald-regular">Poitrine chemise :</span> ' . $resultMesures["poitrine_chem"] . ' cm</li>
                                            <li><span class="oswald-regular">Carrure chemise :</span> ' . $resultMesures["carrure_chem"] . ' cm</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-12 col-sm-4" style="text-align: left; margin-bottom: 15px;">
                                        <ul class="ul-recap"><h2 class="oswald-regular" style="font-size: 1.5em; margin-bottom: 10px; color:#f26d7d; text-align: left"></h2>
                                            <li><span class="oswald-regular">Dos chemise :</span> ' . $resultMesures["dos_chem"] . ' cm</li>
                                            <li><span class="oswald-regular">Poignet chemise :</span> ' . $resultMesures["poignet_chem"] . ' cm</li>
                                            <li><span class="oswald-regular">Epaule chemise :</span> ' . $resultMesures["epaule_chem"] . ' cm</li>
                                            <li><span class="oswald-regular">Manche chemise :</span> ' . $resultMesures["manchestandard"] . ' cm</li>
                                            <li><span class="oswald-regular">Demi-taille chemise :</span> ' . $resultMesures["taillestandard"] . ' cm</li>
                                        </ul>
                                    </div>';
                                }
                            }
                            ?>
                            <div class="col-xs-12">
                                <a class="modifier-info-compte" href="espace_client_modif_mesure.html">Modifiez vos mesures</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>

        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

    </body>

</html>