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

    <!-- HEADER CONNEXION -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="header-page bgk-connexion">
                    <p class="fil-arianne oswald-regular"><a href="index.php">accueil</a> / <a href="connexion.php">login</a></p>
                    <h1 class="fil-arianne-activ oswald-regular">Espace client de Jérôme Krakus</h1>
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
                <!-- MESURES CONTAINER -->
                <?php include('includes/client-choix-mesure.php') ?>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>