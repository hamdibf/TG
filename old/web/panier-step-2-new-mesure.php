<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);
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
                        <li><a class="header-panier-lien" href="panier-step-1.php">1. Panier</a></li>
                        <li><a class="header-panier-lien lien-actif" href="panier-step-2.php">2. Mesures</a></li>
                        <li><a class="header-panier-lien" href="panier-step-3.php">3. Coordonnées</a></li>
                        <li><a class="header-panier-lien" href="panier-step-4.php">4. Récapitulatif & Paiement</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
        <!--  NEW MESURE  -->
        <?php include("includes/panier-client-choix-mesure.php"); ?>

        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

    </body>

</html>