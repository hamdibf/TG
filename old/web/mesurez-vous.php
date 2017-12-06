<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);
$_SESSION['type_mesure'] = 'mesurez-vous';
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
                        <p class="fil-arianne oswald-regular"><a href="home">accueil</a> / <a href="inscription-mesures.html">Type de mesure</a> /</p>
                        <h1 class="fil-arianne-activ oswald-regular">Mesurez-vous</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- MESURE SUR CHEMISE -->
        <?php include("includes/client-mesurez-vous.php"); ?>
        <?php include("includes/footer.php"); ?>

        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript">var t =<?php echo time(); ?></script>
        <script type="text/javascript" src="js/index.js"></script>
    </body>

</html>