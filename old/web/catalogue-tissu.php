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

    <!-- HEADER CATALOGUE -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="header-page bgk-catalogue-chemise">
                    <p class="fil-arianne oswald-regular"><a href="index.php">accueil</a> / catalogue /</p>
                    <h1 class="fil-arianne-activ oswald-regular">Catalogue de tissus</h1>
                    <p class="modele-find">560 modèles</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FILTRES CATALOGUE -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="filtres-catalogue-container">
                    <p class="filtres-catalogue-mobile oswald-regular" onclick="openFiltres()"><span id="span-afficher">Afficher les filtres</span><span class="masquer-span" id="span-masquer">Masquer les filtres</span></p>
                    <ul class="filtres-catalogue oswald-regular" id="filtres-catalogue">
                        <li>
                           <span>Couleurs</span>
                            <ul class="filtre-menu-deroulant dinpro-regular">
                                <li class="couleur-blanc">Blanc</li>
                                <li class="couleur-noir">Noir</li>
                                <li class="couleur-bleu">Bleu</li>
                                <li class="couleur-rouge">Rouge</li>
                                <li class="couleur-rose">Rose</li>
                                <li class="couleur-marron">Marron</li>
                                <li class="couleur-vert">Vert</li>
                                <li class="couleur-gris">Gris</li>
                                <li class="couleur-violet">Violet</li>
                                <li class="couleur-jaune">Jaune</li>
                                <li class="couleur-orange">Orange</li>
                                <li class="couleur-beige">Beige</li>
                                <li class="couleur-toutes">Toutes les couleurs</li>
                            </ul>
                        </li>
                        <li>
                           <span>Style</span>
                            <ul class="filtre-menu-deroulant dinpro-regular">
                                <li>Chemisette</li>
                                <li>Fashion</li>
                                <li>Bucheron / Hipster</li>
                                <li>Grande taille</li>
                                <li>Cintrée</li>
                                <li>Infroissable</li>
                            </ul>
                        </li>
                         <li>
                           <span>Tissage</span>
                            <ul class="filtre-menu-deroulant dinpro-regular">
					            <li>Popeline</li>
					            <li>Oxford</li>
					            <li>Flanelle</li>
					            <li>Lin</li>
					            <li>Twill</li>
					            <li>Chevron</li>
                            </ul>
                        </li>
                         <li>
                           <span>Motifs</span>
                            <ul class="filtre-menu-deroulant dinpro-regular">
					            <li>Uni</li>
					            <li>Carreaux</li>
					            <li>Rayures</li>
					            <li>Liberty / Imprimés</li>
					            <li>Écossais / Tartans</li>
                            </ul>
                        </li>
                        <li>
                           <span>Prix</span>
                            <ul class="filtre-menu-deroulant dinpro-regular">
					            <li>Prix de 59 € à 69 €</li>
					            <li>Prix de 74 € à 79 €</li>
					            <li>Prix de 89 € à 99 €</li>
					            <li>Prix à 109 €</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- CATALOGUE CHEMISE -->
    <div class="container catalogue">
        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="tissu-catalogue">
                    <div class="tissu-catalogue-photo">
                        <img src="img/photo-tissu-catalogue.jpg" alt="Chemise sur mesure TailorGeorge" width="100%" height="100%">
                    </div>
                    <div class="catalogue-details">
                        <p class="modele-catalogue">T1683<br>Fil à fil 90s bleu uni</p>
                        <p class="prix-catalogue oswald-bold">79€</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="tissu-catalogue">
                    <div class="tissu-catalogue-photo">
                        <img src="img/photo-tissu-catalogue.jpg" alt="Chemise sur mesure TailorGeorge" width="100%" height="100%">
                    </div>
                    <div class="catalogue-details">
                        <p class="modele-catalogue">T1683<br>Fil à fil 90s bleu uni</p>
                        <p class="prix-catalogue oswald-bold">79€</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="tissu-catalogue">
                    <div class="tissu-catalogue-photo">
                        <img src="img/photo-tissu-catalogue.jpg" alt="Chemise sur mesure TailorGeorge" width="100%" height="100%">
                    </div>
                    <div class="catalogue-details">
                        <p class="modele-catalogue">T1683<br>Fil à fil 90s bleu uni</p>
                        <p class="prix-catalogue oswald-bold">79€</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="tissu-catalogue">
                    <div class="tissu-catalogue-photo">
                        <img src="img/photo-tissu-catalogue.jpg" alt="Chemise sur mesure TailorGeorge" width="100%" height="100%">
                    </div>
                    <div class="catalogue-details">
                        <p class="modele-catalogue">T1683<br>Fil à fil 90s bleu uni</p>
                        <p class="prix-catalogue oswald-bold">79€</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="tissu-catalogue">
                    <div class="tissu-catalogue-photo">
                        <img src="img/photo-tissu-catalogue.jpg" alt="Chemise sur mesure TailorGeorge" width="100%" height="100%">
                    </div>
                    <div class="catalogue-details">
                        <p class="modele-catalogue">T1683<br>Fil à fil 90s bleu uni</p>
                        <p class="prix-catalogue oswald-bold">79€</p>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3">
                <div class="tissu-catalogue">
                    <div class="tissu-catalogue-photo">
                        <img src="img/photo-tissu-catalogue.jpg" alt="Chemise sur mesure TailorGeorge" width="100%" height="100%">
                    </div>
                    <div class="catalogue-details">
                        <p class="modele-catalogue">T1683<br>Fil à fil 90s bleu uni</p>
                        <p class="prix-catalogue oswald-bold">79€</p>
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