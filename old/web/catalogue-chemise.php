<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);
$alias = "";
if (isset($_REQUEST['alias'])) {
    $alias = $_REQUEST['alias'];
}
$title = 'Catalogue Chemise - TailorGeorge.fr';
$h1 = 'CHEMISES SUR MESURE POUR HOMME';
$description = "";
$sql = 'select count(*) as n from tailorgeorge_modele where utilisateur = 0';
$query = $bdd->query($sql);
$data = $query->fetch();
$count = $data['n'];
$categorie = '';
if ($alias != '') {
    $_SESSION['alias'] = $alias;
    $sql = 'select * from tg_modeles_filtres where alias="' . $alias . '"';
    $query = $bdd->query($sql);
    $data = $query->fetch();
    $title = $data["title"];
    $h1 = $data["h1"];
    $description = $data["description"];
    $categorie = $data["categorie"];
    $designation = $data["designation"];
    $ss = 'select count(*) as n from tailorgeorge_modele where categorie="' . $designation . '" and utilisateur = 0';
    $qq = $bdd->query($ss);
    $dd = $qq->fetch();
    $count = $dd['n'];
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo '' . $description . ''; ?>" />
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
                        <p class="fil-arianne oswald-regular"><a href="home">Accueil</a> / Catalogue /</p>
                        <h1 class="fil-arianne-activ oswald-regular"><?php echo $h1; ?></h1>
                        <p class="modele-find"><?php echo $count; ?> modèles</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FILTRES CATALOGUE -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="filtres-catalogue-container" id="filtre_container">
                        <p class="filtres-catalogue-mobile oswald-regular" onclick="openFiltres()"><span id="span-afficher">Afficher les filtres</span><span class="masquer-span" id="span-masquer">Masquer les filtres</span></p>
                        <ul class="filtres-catalogue oswald-regular" id="filtres-catalogue">
                            <li id="filtre_couleur_select">
                                <span id="filtre_couleur_selected"><?php
                                    if ($categorie == 'COULEUR')
                                        echo ucfirst($designation);
                                    else
                                        echo 'Couleurs';
                                    ?></span>
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
                                <span id="filtre_cols_selected"><?php
                                    if ($categorie == 'COL')
                                        echo ucfirst($designation);
                                    else
                                        echo 'Cols';
                                    ?></span>
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
                                <span id="filtre_styles_selected"><?php
                                    if ($categorie == 'STYLE')
                                        echo ucfirst($designation);
                                    else
                                        echo 'Style';
                                    ?></span>
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
                                <span id="filtre_tissages_selected"><?php
                                    if ($categorie == 'TISSAGE')
                                        echo ucfirst($designation);
                                    else
                                        echo 'Tissage';
                                    ?></span>
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
                                <span id="filtre_motifs_selected"><?php
                                    if ($categorie == 'MOTIF')
                                        echo ucfirst($designation);
                                    else
                                        echo 'Motifs';
                                    ?></span>
                                <ul class="filtre-menu-deroulant dinpro-regular">
                                    <a href="chemise-tissus-unis"><li>Uni</li></a>
                                    <a href="chemise-tissus-carreaux"><li>Carreaux</li></a>
                                    <a href="chemise-tissus-rayes"><li>Rayures</li></a>
                                    <a href="chemise-tissus-fantaisies"><li>Liberty / Imprimés</li></a>
                                    <a href="chemise-tissus-ecossais"><li>Écossais / Tartans</li></a>
                                </ul>
                            </li>
                            <!--<li id="filtre_prix_select">
                            <?php
                            /* $prix = 'Prix';
                              if (isset($_REQUEST["prix_debut"])) {
                              if ($_REQUEST["prix_debut"] == "59")
                              $prix = "Prix de 59 € à 69 €";
                              if ($_REQUEST["prix_debut"] == "74")
                              $prix = "Prix de 74 € à 79 €";
                              if ($_REQUEST["prix_debut"] == "89")
                              $prix = "Prix de 89 € à 99 €";
                              if ($_REQUEST["prix_debut"] == "109")
                              $prix = "Prix à 109 €";
                              } */
                            ?>
                                <span id="filtre_prix_selected"><?php //echo $prix;    ?></span>
                                <ul class="filtre-menu-deroulant dinpro-regular">
                                    <a href="prix-59-69"><li>Prix de 59 € à 69 €</li></a>
                                    <a href="prix-74-79"><li>Prix de 74 € à 79 €</li></a>
                                    <a href="prix-89-99"><li>Prix de 89 € à 99 €</li></a>
                                    <a href="prix-109"><li>Prix à 109 €</li></a>
                                </ul>
                            </li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <!--  BANDEAU TEXTE CHEMISE UNE FOIS UN FILTRE CHOISI  -->
        <?php if ($description != '') { ?>
            <div class="container" style="margin-top:30px;">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="border-motif">
                            <p class="border-motif-texte"><?php echo '' . $description . ''; ?></p>
                        </div>
                    </div>
                </div>

            </div>
        <?php } ?>

        <!-- CATALOGUE CHEMISE -->
        <div class="container catalogue">
            <div class="row">

                <?php
                $condition_cat = '';
                if ($alias != '') {
                    $condition_cat = ' and categorie="' . $designation . '"';
                }
                $sql = 'select * from tailorgeorge_modele where utilisateur = 0 ' . $condition_cat . ' order by id_auto desc';
                $query = $bdd->query($sql);

                echo '<div class="row">';
                while ($d = $query->fetch()) {
                    echo '<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-md-4">
								<a href="chemises/' . $d['url'] . '">
									<div class="chemise-catalogue">
										<div class="chemise-catalogue-photo">
											<img src="../../' . $d['jpg_face'] . '" alt="' . $d['jpg_face_alt'] . '" >
										</div>
										<div class="catalogue-details">
											<p class="modele-catalogue">' . $d['h1'] . '</p>
											<p class="prix-catalogue oswald-bold">' . $d['prix'] . '€</p>
										</div>
									</div>
								</a>
							</div>';
                }
                /* echo '<div class="col-xs-12">
                  <div class="fin-apercu-catalogue">
                  <a href="catalogue-chemise.html" class="btn-rose">Voir tous les mod&egrave;les</a>
                  </div>
                  </div>'; */
                echo '</div>';
                ?>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript">var t =<?php echo time(); ?></script>

    </body>

</html>