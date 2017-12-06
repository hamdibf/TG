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
($client["adresse_identique"] == 1) ? $adresse_identique = "yes" : $adresse_identique = "no";
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
                        <li><a class="oswald-regular sous-nav-actif" href="espace-client-coordonnees.php">Coordonnées</a></li>
                        <li><a class="oswald-regular" href="espace-client-mesures.php">Mesures</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-10">
                    <!-- COORDONNEES CONTAINER -->
                    <?php include('includes/coordonnees.php') ?>
                    <div class="fin-apercu-catalogue">
                        <a id="btn_suivant" class="btn-rose big-btn">Sauvegarder</a>
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