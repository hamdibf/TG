<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);

$id = session_id();
$s = 'select * from tg_sessions where session_id="' . $id . '"';
$q = $bdd->query($s);
$ds = $q->fetch();
if ($ds['client_id'] != 0) {
    $sqlCl = 'select * from tg_client where id="' . $ds['client_id'] . '"';
    $client = $bdd->query($sqlCl);
    $clientResult = $client->fetch();

    $sql = 'select * from tg_commande_chemise where id_client="' . $ds['client_id'] . '" order by id desc';
    $commandes = $bdd->query($sql);
}
if ($ds['client_id'] != 0 && !empty($_REQUEST['commande'])) {
    $sqlCommandes = 'select * from commande_payee where id_client="' . $ds['client_id'] . '" order by id desc limit 1';
    $sqlMesures = 'select * from tg_mesure where id_client="' . $ds['client_id'] . '"';
    $queryCMD = $bdd->query($sqlCommandes);
    $queryMesures = $bdd->query($sqlMesures);
    $resultCMD = $queryCMD->fetch();
    $resultMesures = $queryMesures->fetch();

    if (!$resultMesures["mesure_modif"]) {
        header('Location: choix-mesures.html');
    } else {
        if ($resultMesures["type"] == "mesure-rapide") {
            header('Location: panier-modif-mesure-rapide.html');
        } elseif ($resultMesures["type"] == "mesurez-vous") {
            header('Location: panier-modif-mesure-corps.html');
        } elseif ($resultMesures["type"] == "mesure-chemise") {
            header('Location: panier-modif-mesure-chemise.html');
        }
    }
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
                        <h1 class="fil-arianne-activ oswald-regular">Espace client de <?php echo $clientResult['prenom'] . ' ' . $clientResult['nom'] ?></h1>
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
                        <li><a class="oswald-regular sous-nav-actif" href="espace-client.php">Commandes</a></li>
                        <li><a class="oswald-regular" href="espace-client-coordonnees.php">Coordonnées</a></li>
                        <li><a class="oswald-regular" href="espace-client-mesures.php">Mesures</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-10">
                    <!-- COMMANDES CONTAINER -->
                    <div class="methode-mesure methode-small">
                        <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Commandes passées</h2>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12" style="float: none; margin-left: auto; margin-right: auto">
                                <!-- ADRESSE SUITE -->
                                <?php
                                $cols = ["CLA" => "Classique", "ITA" => "Italien", "ITR" => "Italien rond", "ITO" => "Italien ouvert", "CTW" => "Cutaway", "BOU" => "Boutonné", "DAN" => "Dandy", "ANG" => "Anglais", "ACIG" => "Napolitain", "TEN" => "Longues Pointes", "MAO" => "Mao", "MMO" => "Maomao", "OFR" => "Officier", "OFC" => "Officier carré", "REP" => "Indien", "INS" => "Inversé", "CAS" => "Cérémonie", "MBT" => "Mini boutonné", "MCL" => "Mini classique", "MRO" => "Mini rond", "INP" => "Mini inversé", "BOU" => "Boutonné 2 boutons", "ITO" => "Italien ouvert 2 boutons", "ACIG" => "Napolitain 2 boutons"];
                                $epaulettes = ["" => "Sans", "EPO" => "Avec"];
                                $tenue_col = ["R" => "Rigide", "S" => "Souple"];
                                $baleine = ["A" => "Avec", "S" => "Sans", "ITA" => "Amovibles"];
                                $poignets = ["A11" => "1 bouton", "A22" => "2 boutons", "A12" => "Ajustable", "B11" => "1 bouto", "B22" => "2 bouton", "B12" => "Ajustable", "PMR" => "Rond", "PMC" => "Carré", "N22" => "Portofino", "MC" => "Manches courtes"];
                                $poches = ["0" => "Aucune poche", "1" => "Ronde", "1C" => "Carrée", "1G" => "Rabat", "1PS" => "Soufflet", "1SR" => "Aviateur", "2" => "Rondes (x2)", "2C" => "Carrées (x2)", "2G" => "Rabats (x2)", "2PS" => "Soufflets (x2)", "2SR" => "Aviateurs (x2)"];
                                $bas = ["L" => "Arrondi", "D" => "Droit", "F" => "Droit avec fentes"];
                                $gorge = ["S" => "Simple", "A" => "Américaine", "C" => "Cachée"];
                                $dos = ["" => "Sans plis", "P" => "Pli central", "2P" => "Chevrons"];
                                $pinces = ["P" => "Avec", "" => "Sans"];
                                $boutonnieres = ["1938" => "Beige", "1801" => "Blanc mat", "1830" => "Bleu clair", "1966" => "Bleu marine", "1676" => "Bleu roi", "1835" => "Bordeaux", "1874" => "Gris", "1666" => "Jaune pale", "1455" => "Jaune vif", "1911" => "Mauve", "1800" => "Noir", "1965" => "Orange", "1818" => "Rose pale", "1113" => "Rose vif", "1747" => "Rouge", "1801" => "Ton sur ton", "1832" => "Vert fonce", "1647" => "Vert pomme", "1751" => "Vert vif", "1833" => "Violet"];

                                $broderie_position = ["PCO" => "Milieu poche", "B4" => "4eme boutonnière", "PDR" => "Poignet droit", "PGA" => "Poignet gauche"];
                                $doublure_col = ["-" => "Sans", "" => "Sans", "C" => "Col blanc", "EPC" => "Ext. pied col", "IPC" => "Int. pied col", "PCE" => "Full pied col", "CC" => "Full col"];
                                $doublure_poignet = ["-" => "Sans", "" => "Sans", "PP" => "Poignets blancs", "IP" => "Int. poignets", "P" => "Full poignets"];
                                ?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Code commande</th>
                                            <th>Date</th>
                                            <th>Tissu</th>
                                            <th>Col</th>
                                            <th>Poignets</th>
                                            <th>Dos</th>
                                            <th>Pinces</th>
                                            <th>Bas de chemise</th>
                                            <th>Gorge</th>
                                            <th>Poches</th>
                                            <th>Epaulettes</th>
                                            <th>Boutons</th>
                                            <th>Boutonniere</th>
                                            <th>Payé</th>
                                            <th>Prix</th>
                                            <th>Quantité</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($ds['client_id'] != 0) {
                                            while ($commande = $commandes->fetch()) {
                                                echo '<tr><td>' . $commande["code_commande"] . '</td><td>' . date_format(new DateTime($commande["date"]), 'd/m/Y') . '</td><td>' . $commande["tissu"] . '</td><td>' . $cols[$commande["col"]] . '</td><td>' . $poignets[$commande["poignets"]] . '</td><td>' . $dos[$commande["dos"]] . '</td><td>' . $pinces[$commande["pinces"]] . '</td><td>' . $bas[$commande["baschemise"]] . '</td><td>' . $gorge[$commande["gorge"]] . '</td><td>' . $poches[$commande["poches"]] . '</td><td>' . $epaulettes[$commande["epaulette"]] . '</td><td>' . $commande["boutons"] . '</td><td>' . $boutonnieres[$commande["boutonniere"]] . '</td><td>' . $commande["paye"] . '</td><td>' . $commande["prix"] . '</td><td>' . $commande["quantite"] . '</td><td><a class="oswald-regular sous-nav-actif" id="commande_' . $commande["code_modele"] . '">Configurer</a><br><a id="versPanier_' . $commande["code_modele"] . '" class="oswald-regular sous-nav-actif">Commander</a></td></tr>';
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div id=formToSubmit></div>
                                <div id=formToPanier></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script>
            $("[id^='commande_']").on("click", function(e) {
                var indice = $(this).attr("id").split("_")[1];
                var t =<?php echo time(); ?>;
                $.ajax({
                    url: "js/ajax/reconfigCommande.php?t=" + t,
                    data: 'idModele=' + indice,
                    success: function(result) {
                        $("#formToSubmit").html(result);
                        $("#toConfig").submit();
                    }});
            });
            $("[id^='versPanier_']").on("click", function(e) {
                var indice = $(this).attr("id").split("_")[1];
                var t =<?php echo time(); ?>;
                $.ajax({
                    url: "js/ajax/re_commander.php?t=" + t,
                    data: 'idModele=' + indice,
                    success: function(result)
                    {
                        $("#formToPanier").html(result);
                        $("#toPanier").submit();
                    }
                });
            });
        </script>

    </body>

</html>