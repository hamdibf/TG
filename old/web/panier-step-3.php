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
$pays_facturation = $client["pays"];
$pays_livraison = $client["pays_livraison"];
if (!empty($_REQUEST["adresse_identique"]) && $ds['client_id'] != 0) {
    if ($_REQUEST["adresse_identique"] == "yes") {
        $s = 'UPDATE `tg_client` SET
            `telephone` = "' . htmlspecialchars($_REQUEST["number"]) . '",
            `adresse` = "' . htmlspecialchars($_REQUEST["adresse"]) . '",
            `renseignement` = "' . htmlspecialchars($_REQUEST["renseignement"]) . '",
            `postal` = "' . htmlspecialchars($_REQUEST["code-postal"]) . '",
            `ville` = "' . htmlspecialchars($_REQUEST["ville"]) . '",
            `pays` = "' . htmlspecialchars($_REQUEST["pays"]) . '",
            `nom_livraison` = "' . htmlspecialchars($_REQUEST["nom_livraison"]) . '",
            `prenom_livraison` = "' . htmlspecialchars($_REQUEST["prenom_livraison"]) . '",
            `nom` = "' . htmlspecialchars($_REQUEST["nom"]) . '",
            `prenom` = "' . htmlspecialchars($_REQUEST["prenom"]) . '",
            `societe` = "' . htmlspecialchars($_REQUEST["societe_facturation"]) . '",
            `societe_livraison` = "' . htmlspecialchars($_REQUEST["societe_livraison"]) . '",
            `adresse_livraison` = "' . htmlspecialchars($_REQUEST["adresse"]) . '",
            `renseignement_livraison` =  "' . htmlspecialchars($_REQUEST["renseignement"]) . '",
            `postal_livraison` = "' . htmlspecialchars($_REQUEST["code-postal"]) . '",
            `ville_livraison` = "' . htmlspecialchars($_REQUEST["ville"]) . '",
            `pays_livraison` =  "' . htmlspecialchars($_REQUEST["pays"]) . '",
            `adresse_identique` = 1 WHERE id = ' . $ds['client_id'] . ' ;';
    } elseif ($_REQUEST["adresse_identique"] == "no") {
        $s = 'UPDATE `tg_client` SET
            `telephone` = "' . htmlspecialchars($_REQUEST["number"]) . '",
            `adresse` = "' . htmlspecialchars($_REQUEST["adresse_facturation"]) . '",
            `renseignement` = "' . htmlspecialchars($_REQUEST["renseignement_facturation"]) . '",
            `postal` = "' . htmlspecialchars($_REQUEST["code-postal_facturation"]) . '",
            `ville` = "' . htmlspecialchars($_REQUEST["ville_facturation"]) . '",
            `pays` = "' . htmlspecialchars($_REQUEST["pays_facturation"]) . '",
            `nom_livraison` = "' . htmlspecialchars($_REQUEST["nom_livraison"]) . '",
            `prenom_livraison` = "' . htmlspecialchars($_REQUEST["prenom_livraison"]) . '",
            `nom` = "' . htmlspecialchars($_REQUEST["nom"]) . '",
            `prenom` = "' . htmlspecialchars($_REQUEST["prenom"]) . '",
            `societe` = "' . htmlspecialchars($_REQUEST["societe_facturation"]) . '",
            `societe_livraison` = "' . htmlspecialchars($_REQUEST["societe_livraison"]) . '",
            `adresse_livraison` = "' . htmlspecialchars($_REQUEST["adresse"]) . '",
            `renseignement_livraison` =  "' . htmlspecialchars($_REQUEST["renseignement"]) . '",
            `postal_livraison` = "' . htmlspecialchars($_REQUEST["code-postal"]) . '",
            `ville_livraison` = "' . htmlspecialchars($_REQUEST["ville"]) . '",
            `pays_livraison` =  "' . htmlspecialchars($_REQUEST["pays"]) . '",
            `adresse_identique` = 0  WHERE id = ' . $ds['client_id'] . ' ;';
    }
    $bdd->exec($s);
    header('Location:recapitulatif.html');
}
$href = "panier-2.html";
if ($ds['client_id'] != 0) {
    ($client["adresse_identique"] == 1) ? $adresse_identique = "yes" : $adresse_identique = "no";

    $sqlMesures = 'select * from tg_mesure where id_client="' . $ds['client_id'] . '"';
    $queryMesures = $bdd->query($sqlMesures);
    $resultMesures = $queryMesures->fetch();
    if ($resultMesures['type'] == 'mesure-rapide') {
        $href = "panier-modif-mesure-rapide.html";
    }
    if ($resultMesures['type'] == 'mesure-chemise') {
        $href = "panier-modif-mesure-chemise.html";
    }
    if ($resultMesures['type'] == 'mesurez-vous') {
        $href = "panier-modif-mesure-corps.html";
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

        <!-- HEADER PANIER -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="header-panier">
                        <li><a class="header-panier-lien" href="panier.html">1. Panier</a></li>
                        <li><a class="header-panier-lien" href="<?php echo $href; ?>">2. Mesures</a></li>
                        <li><a class="header-panier-lien lien-actif" href="verification-adresse.html">3. Coordonnées</a></li>
                        <li><a class="header-panier-lien" href="recapitulatif.html">4. Récapitulatif & Paiement</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--  COORDONNEES  -->
        <div class="container">
            <?php include("includes/corrdonnees-connecte.php"); ?>
        </div>

        <!--  ETAPE SUIVANTE  -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="fin-apercu-catalogue">
                        <a class="btn-rose big-btn" id="btn_suivant">Suivant</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript">var t =<?php echo time(); ?></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script>
            $("#btn_suivant").on("click", function(e) {
                $("#formEditCoordonnees").submit();
            });
            function affiche_facturation(etat) {
                if (etat == "on") {
                    $("#yes").css({'background': 'url(img/checked.png) no-repeat', 'background-size': '17px'});
                    $("#no").css({'background': 'url(img/unchecked.png) no-repeat', 'background-size': '17px'});
                    $('#adresse_identique').val("yes");
                    $("#bloc_facturation").slideUp();
                } else if (etat == "off") {
                    $("#yes").css({'background': 'url(img/unchecked.png) no-repeat', 'background-size': '17px'});
                    $("#no").css({'background': 'url(img/checked.png) no-repeat', 'background-size': '17px'});
                    $('#adresse_identique').val("no");
                    $("#bloc_facturation").fadeIn(500);
                }
            }
        </script>
    </body>

</html>