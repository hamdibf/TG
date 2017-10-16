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
    <title>Créez Votre Propre Chemise, Chesmises sur Mesures – TailorGeorge.fr</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">	
</head>

<body>    
    <?php include("includes/info-livraison.php"); ?>
    
    <!-- NAVIGATION -->
    <?php include("includes/navigation.php"); ?>

    <!-- HEADER CATALOGUE -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="header-home">
                    <h1 class="oswald-regular">Nous fabriquons&nbsp;des<span class="oswald-bold">chesmises sur mesures</span></h1>
                    <a href="configurateur" class="btn-rose">Créez votre propre chemise</a>
                </div>
            </div>
        </div>
    </div>

    <!-- BANDEAU H2 + FILTRES CATALOGUE -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="h2-home dinpro-medium">PLus de 3000 modèles de chemises sur mesures</h2>
                <div class="filtres-catalogue-container">
                    <p class="filtres-catalogue-mobile oswald-regular" onclick="openFiltres()">
					<span id="span-afficher">Afficher les filtres</span><span class="masquer-span" id="span-masquer">Masquer les filtres</span></p>
                    <ul class="filtres-catalogue oswald-regular" id="filtres-catalogue">
                        <li id="filtre_couleur_select">
                           <span id="filtre_couleur_selected">Couleurs</span>
                            <ul class="filtre-menu-deroulant dinpro-regular">
                                <a href="chemise-tissus-blanc"><li class="couleur-blanc">Blanc</li></a>
                                <a href="chemise-tissus-noir"><li class="couleur-noir">Noir</li></a>
                                <a href="chemise-tissus-bleu"><li class="couleur-bleu">Bleu</li></a>
                                <a href="chemise-tissus-rouge"><li class="couleur-rouge">Rouge</li></a>
                                <a href="chemise-tissus-rose"><li class="couleur-rose">Rose</li></a>
                                <a href="catalogue-chemise.html"><li class="couleur-toutes">Toutes les couleurs</li></a>
                            </ul>
                        </li>
                        <li id="filtre_cols_select">
                           <span id="filtre_cols_selected">Cols</span>
                            <ul class="filtre-menu-deroulant dinpro-regular">
                                <a href="chemise-col-mao"><li>Mao</li></a>
                                <a href="chemise-col-italien"><li>Italien</li></a>
                                <a href="chemise-col-officier"><li>Officier</li></a>
                                <a href="chemise-col-casse"><li>Cassé</li></a>
                                <a href="chemise-col-inverse"><li>Inversé</li></a>
                                <a href="chemise-col-anglais"><li>Anglais</li></a>
                            </ul>
                        </li>
                        <li id="filtre_styles_select">
                           <span id="filtre_styles_selected">Style</span>
                            <ul class="filtre-menu-deroulant dinpro-regular">
                                <a href="chemisettes"><li>Chemisette</li></a>
                                <a href="chemise-fashion"><li>Fashion</li></a>
                                <a href="chemise-bucherons"><li>Bucheron / Hipster</li></a>
                                <a href="chemise-grandes-tailles"><li>Grande taille</li></a>
                                <a href="chemise-cintrées"><li>Cintrée</li></a>
                                <a href="chemise-sans-repassage"><li>Infroissable</li></a>
                            </ul>
                        </li>
                        <li id="filtre_tissages_select">
                           <span id="filtre_tissages_selected">Tissage</span>
                            <ul class="filtre-menu-deroulant dinpro-regular">
					            <a href="chemise-tissus-popeline"><li>Popeline</li></a>
					            <a href="chemise-tissus-oxford"><li>Oxford</li></a>
					            <a href="chemise-tissus-flanelle"><li>Flanelle</li></a>
					            <a href="chemise-tissus-lin"><li>Lin</li></a>
					            <a href="chemise-tissus-twill"><li>Twill</li></a>
					            <a href="chemise-tissus-chevron"><li>Chevron</li></a>
                            </ul>
                        </li>
                        <li id="filtre_motifs_select">
                           <span id="filtre_motifs_selected">Motifs</span>
                            <ul class="filtre-menu-deroulant dinpro-regular">
					            <a href="chemise-tissus-unis"><li>Uni</li></a>
					            <a href="chemise-tissus-carreaux"><li>Carreaux</li></a>
					            <a href="chemise-tissus-rayes"><li>Rayures</li></a>
					            <a href="chemise-tissus-fantaisies"><li>Liberty / Imprimés</li></a>
					            <a href="chemise-tissus-ecossais"><li>Écossais / Tartans</li></a>
                            </ul>
                        </li>
                        <li id="filtre_prix_select">
                           <span id="filtre_prix_selected">Prix</span>
                            <ul class="filtre-menu-deroulant dinpro-regular">
					            <a href="prix-59-69"><li>Prix de 59 € à 69 €</li></a>
					            <a href="prix-74-79"><li>Prix de 74 € à 79 €</li></a>
					            <a href="prix-89-99"><li>Prix de 89 € à 99 €</li></a>
					            <a href="prix-109"><li>Prix à 109 €</li></a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- CATALOGUE CHEMISE -->
    <div class="container catalogue" id="container_catalogue">
        
    </div>

    <!--  BANDEAU TISSUS  -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 ">
                <div class="bandeau-tissu">
                    <p class="bandeau-tissu-top">Une collection de tissus</p>
                    <h2 class="bandeau-tissu-content oswald-regular">100% coton</h2>
                    <p class="bandeau-tissu-bot">Des meilleurs tisseurs européens</p>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="logo-tisseur">
                    <img src="img/logo-albini.png" alt="">
                    <img src="img/logo-canclini.png" alt="">
                    <img src="img/logo-liberty.png" alt="">
                    <img src="img/logo-soktas.png" alt="">
                    <img src="img/logo-somelos.png" alt="">
                    <img src="img/logo-tessitura.png" alt="">
                    <img src="img/logo-thomas.png" alt="">
                </div>
            </div>
            <div class="col-xs-12">
               <div class="fin-apercu-catalogue">
                    <a href="catalogue-tissu.html" class="btn-rose">Voir tous nos tissus</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- TEMOIGNAGES -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="temoignages-container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="temoignages-titre">
                                <img class="temoignages-love" src="img/icon-love.svg" alt="">
                                <h2>Nos clients parlent&nbsp;de&nbsp;nous</h2>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						<?php
							$s = 'select * from tg_avisclient_general where best="1" order by id desc limit 0,3';
							$q = $bdd->query($s);
							while($avis = $q->fetch()) {
						?>
                            <div class="temoignages-content">
                                <p class="temoignage-client">"<?php echo $avis['avis']; ?>"</p>
                                <p class="temoignage-nom-client"><?php echo $avis['nom']; ?></p>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- FOOTER -->


    <!-- JAVASCRIPT -->
    
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>	
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript">var t=<?php echo time(); ?></script>
	<script type="text/javascript" src="js/index.js"></script>
</body>

</html>
