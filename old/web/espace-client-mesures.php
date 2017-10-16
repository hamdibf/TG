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
                <!-- COORDONNEES CONTAINER -->
                <div class="methode-mesure methode-small">
                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Vos mesures</h2>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6" style="text-align: left;">
                            <ul class="ul-recap">
                                <li><span class="oswald-regular">Poids :</span> 75 kg</li>
                                <li><span class="oswald-regular">Taille :</span> 175 cm</li>
                                <li><span class="oswald-regular">Age :</span> 27 ans</li>
                                <li><span class="oswald-regular">Coupe :</span> Droite</li>
                                <li><span class="oswald-regular">Cou :</span> 37 cm</li>    
                                <li><span class="oswald-regular">Poitrine :</span>98 cm</li>
                            </ul>  
                        </div>
                        <div class="col-xs-12 col-sm-6" style="text-align: left; margin-bottom: 30px;">
                            <ul class="ul-recap">
                                <li><span class="oswald-regular">Carrure :</span> 45 cm</li>
                                <li><span class="oswald-regular">Dos :</span> 70 cm</li>
                                <li><span class="oswald-regular">Bras droit :</span> 64 cm</li>
                                <li><span class="oswald-regular">Bras gauche :</span> 64 cm</li>
                                <li><span class="oswald-regular">Poignets :</span> 19.5 cm</li>
                                <li><span class="oswald-regular">Ceinture :</span> 98 cm</li>
                            </ul>  
                        </div>
                        <div class="col-xs-12">
                            <a class="modifier-info-compte" href="espace-client-modif-mesures.php">Modifiez vos mesures</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>