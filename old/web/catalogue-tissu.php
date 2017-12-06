<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);

$alias = "1";
$type = "1";
$filtre = "1";
if (!empty($_REQUEST['alias'])) {
    $alias = $_REQUEST['alias'];
}
if (!empty($_REQUEST['type'])) {
    $type = $_REQUEST['type'];
}
if (!empty($_REQUEST['filtre'])) {
    $filtre = $_REQUEST['filtre'];
}
$h1 = 'Catalogue de tissus';
$title = 'TailorGeorge';
$description = "";
switch ($alias) {
    case "tissus-blanc":
        $title = 'Tissus blancs pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus blancs';
        $description = "Une jolie Une jolie collection de tissus blancs pour créer votre chemise sur mesure blanche. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-noir":
        $title = 'Tissus noirs pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus noirs';
        $description = "Une jolie Une jolie collection de tissus noirs pour créer votre chemise sur mesure blanche. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-bleu":
        $title = 'Tissus bleus pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus bleus';
        $description = "Une jolie Une jolie collection de tissus bleus pour créer votre chemise sur mesure bleue. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-rouge":
        $title = 'Tissus rouges pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus rouges';
        $description = "Une jolie Une jolie collection de tissus rouges pour créer votre chemise sur mesure rouge. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-rose":
        $title = 'Tissus roses pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus roses';
        $description = "Une jolie Une jolie collection de tissus roses pour créer votre chemise sur mesure rose. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-marron":
        $title = 'Tissus marron pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus marron';
        $description = "Une jolie Une jolie collection de tissus marron pour créer votre chemise sur mesure marron. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-vert":
        $title = 'Tissus verts pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus verts';
        $description = "Une jolie Une jolie collection de tissus verts pour créer votre chemise sur mesure verte. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-gris":
        $title = 'Tissus gris pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus gris';
        $description = "Une jolie Une jolie collection de tissus gris pour créer votre chemise sur mesure grise. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-violet":
        $title = 'Tissus violets pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus violets';
        $description = "Une jolie Une jolie collection de tissus violets pour créer votre chemise sur mesure violette. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-jaune":
        $title = 'Tissus jaunes pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus jaunes';
        $description = "Une jolie Une jolie collection de tissus jaunes pour créer votre chemise sur mesure jaune. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-orange":
        $title = 'Tissus orange pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus orange';
        $description = "Une jolie Une jolie collection de tissus orange pour créer votre chemise sur mesure orange. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-beige":
        $title = 'Tissus beiges pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus beiges';
        $description = "Une jolie Une jolie collection de tissus beiges pour créer votre chemise sur mesure beige. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-unis":
        $title = 'Tissus unis pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus unis';
        $description = "Une jolie collection de tissus unis pour créer votre chemise sur mesure unie. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-carreaux":
        $title = 'Tissus à carreaux pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus à carreaux';
        $description = "Une jolie collection à carreaux unis pour créer votre chemise sur mesure à carreaux. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-rayes":
        $title = 'Tissus à rayures pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus à rayures';
        $description = "Une jolie collection de tissus à rayures pour créer votre chemise sur mesure rayée. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-imprimes":
        $title = 'Tissus imprimés et Lyberty pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus imprimés et Lyberty';
        $description = "Une jolie collection de tissus imprimés et Liberty  pour créer votre chemise sur mesure fantaisie !. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-ecossais":
        $title = 'Tissus écossais pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus écossais';
        $description = "Une jolie collection de tissus tartans et écossais pour créer votre chemise sur mesure bûcheron ou hipster. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-popeline":
        $title = 'Tissus en popeline pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus en popeline';
        $description = "Une jolie collection de tissus en popeline pour créer votre chemise sur mesure en popeline. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-oxford":
        $title = 'Tissus en oxford pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus en oxford';
        $description = "Une jolie collection de tissus en oxford pour créer votre chemise sur mesure en oxford. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-flanelle":
        $title = 'Tissus en flanelle pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus en flanelle';
        $description = "Une jolie collection de tissus en flanelle pour créer votre chemise sur mesure en flanelle. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-lin":
        $title = 'Tissus en lin pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus en lin';
        $description = "Une jolie collection de tissus en lin pour créer votre chemise sur mesure en lin. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-twill":
        $title = 'Tissus en twill pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus en twill';
        $description = "Une jolie collection de tissus en twill pour créer votre chemise sur mesure en twill. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tissus-chevron":
        $title = 'Tissus en chevron pour chemises – TailorGeorge.fr';
        $h1 = 'Tissus en chevron';
        $description = "Une jolie collection de tissus en chevron pour créer votre chemise sur mesure en chevron. Dès 49€ - Livraison sous 8 jours.";
        break;
    case "tous-les-tissus":
        $title = 'Catalogue de tissus – TailorGeorge.fr';
        $h1 = 'Toutes les couleurs';
        $description = "Une jolie collection de tissus pour créer votre chemise sur mesure. Dès 49€ - Livraison sous 8 jours.";
        break;
    default:
}
$sql = 'select count(*) as n from tissu where dispo = 1';
$query = $bdd->query($sql);
$data = $query->fetch();
$count = $data['n'];
$categorie = '';
if ($alias != '1' && $type != '1') {
    $_SESSION['alias'] = $alias;
    $_SESSION['type'] = $type;
    $_SESSION['filtre'] = $filtre;
    $ss = 'select count(*) as n from tissu where UPPER(' . $type . ')=UPPER("' . $filtre . '") and dispo = 1';
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
        <meta name="description" content="<?php echo '' . $description . ''; ?>" />
        <title><?php echo $title; ?></title>
        <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
        <!-- scripts area -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
                            <li>
                                <span>Couleurs</span>
                                <ul class="filtre-menu-deroulant dinpro-regular">
                                    <a href="tissus-blanc"><li data-type="filtre" data-categorie="cat_couleur" data-id="blanc" class="couleur-blanc">Blanc</li></a>
                                    <a href="tissus-noir"><li data-type="filtre" data-categorie="cat_couleur" data-id="noir" class="couleur-noir">Noir</li></a>
                                    <a href="tissus-bleu"><li data-type="filtre" data-categorie="cat_couleur" data-id="bleu" class="couleur-bleu">Bleu</li></a>
                                    <a href="tissus-rouge"><li data-type="filtre" data-categorie="cat_couleur" data-id="rouge" class="couleur-rouge">Rouge</li></a>
                                    <a href="tissus-rose"><li data-type="filtre" data-categorie="cat_couleur" data-id="rose" class="couleur-rose">Rose</li></a>
                                    <a href="tissus-marron"><li data-type="filtre" data-categorie="cat_couleur" data-id="marron" class="couleur-marron">Marron</li></a>
                                    <a href="tissus-vert"><li data-type="filtre" data-categorie="cat_couleur" data-id="vert" class="couleur-vert">Vert</li></a>
                                    <a href="tissus-gris"><li data-type="filtre" data-categorie="cat_couleur" data-id="gris" class="couleur-gris">Gris</li></a>
                                    <a href="tissus-violet"><li data-type="filtre" data-categorie="cat_couleur" data-id="violet" class="couleur-violet">Violet</li></a>
                                    <a href="tissus-jaune"><li data-type="filtre" data-categorie="cat_couleur" data-id="jaune" class="couleur-jaune">Jaune</li></a>
                                    <a href="tissus-orange"><li data-type="filtre" data-categorie="cat_couleur" data-id="orange" class="couleur-orange">Orange</li></a>
                                    <a href="tissus-beige"><li data-type="filtre" data-categorie="cat_couleur" data-id="beige" class="couleur-beige">Beige</li></a>
                                    <a href="tous-les-tissus"><li data-type="filtre" data-categorie="cat_couleur" data-id="all" class="couleur-toutes">Toutes les couleurs</li></a>
                                </ul>
                            </li>
                            <!--                            <li>
                                                            <span>Style</span>
                                                            <ul class="filtre-menu-deroulant dinpro-regular">
                                                                <li>Chemisette</li>
                                                                <li>Fashion</li>
                                                                <li>Bucheron / Hipster</li>
                                                                <li>Grande taille</li>
                                                                <li>Cintrée</li>
                                                                <li>Infroissable</li>
                                                            </ul>
                                                        </li>-->
                            <li>
                                <span>Tissage</span>
                                <ul class="filtre-menu-deroulant dinpro-regular">
                                    <a href="tissus-popeline"><li data-type="filtre" data-categorie="cat_tissage" data-id="popeline">Popeline</li></a>
                                    <a href="tissus-oxford"><li data-type="filtre" data-categorie="cat_tissage" data-id="oxford">Oxford</li></a>
                                    <a href="tissus-flanelle"><li data-type="filtre" data-categorie="cat_tissage" data-id="flanelle">Flanelle</li></a>
                                    <a href="tissus-lin"><li data-type="filtre" data-categorie="cat_tissage" data-id="lin">Lin</li></a>
                                    <a href="tissus-twill"><li data-type="filtre" data-categorie="cat_tissage" data-id="twill">Twill</li></a>
                                    <a href="tissus-chevron"><li data-type="filtre" data-categorie="cat_tissage" data-id="chevron">Chevron</li></a>
                                </ul>
                            </li>
                            <li>
                                <span>Motifs</span>
                                <ul class="filtre-menu-deroulant dinpro-regular">
                                    <a href="tissus-unis"><li data-type="filtre" data-categorie="cat_motif" data-id="unis">Uni</li></a>
                                    <a href="tissus-carreaux"><li data-type="filtre" data-categorie="cat_motif" data-id="carreaux">Carreaux</li></a>
                                    <a href="tissus-rayes"><li data-type="filtre" data-categorie="cat_motif" data-id="rayes">Rayures</li></a>
                                    <a href="tissus-imprimes"><li data-type="filtre" data-categorie="cat_motif" data-id="faitaisies">Liberty / Imprimés</li></a>
                                    <a href="tissus-ecossais"><li data-type="filtre" data-categorie="cat_motif" data-id="ecossais">Écossais / Tartans</li></a>
                                </ul>
                            </li>
                            <!--                            <li>
                                                            <span>Prix</span>
                                                            <ul class="filtre-menu-deroulant dinpro-regular">
                                                                <li data-type="filtre" data-categorie="cat_prix" data-id="59-69">Prix de 59 € à 69 €</li>
                                                                <li data-type="filtre" data-categorie="cat_prix" data-id="74-79">Prix de 74 € à 79 €</li>
                                                                <li data-type="filtre" data-categorie="cat_prix" data-id="89-99">Prix de 89 € à 99 €</li>
                                                                <li data-type="filtre" data-categorie="cat_prix" data-id="109-109">Prix à 109 €</li>
                                                                <li data-type="filtre" data-categorie="cat_prix" data-id="all">Tous</li>
                                                            </ul>
                                                        </li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <form id="configurateur" name="configurateur" action="configurateur/index.php" method="POST">
            <input type="hidden" name="id" value="">
            <input type="hidden" name="reference" value="">
            <input type="hidden" name="api_code" value="" >
            <input type="hidden" name="api_url" value="" >
            <input type="hidden" name="api_titre" value="" >
            <input type="hidden" name="api_prix" value="" >
            <input type="hidden" name="api_description" value="" >
            <input type="hidden" name="api_h1" value="" >
            <input type="hidden" name="api_couleur" value="" >
            <input type="hidden" name="api_tissage" value="" >
            <input type="hidden" name="api_dessin" value="" >
        </form>
        <input type="hidden" id="cat_couleur" name="cat_couleur" value="all">
        <input type="hidden" id="cat_motif" name="cat_motif" value="all">
        <input type="hidden" id="cat_tissage" name="cat_tissage" value="all">
        <input type="hidden" id="cat_prix" name="cat_prix" value="all">
        <input type="hidden" id="tissu" name="tissu" value="">
        <!-- CATALOGUE TISSUS -->
        <?php
        $ss = 'select reference, code, url, titre, prix, description, H1, couleur1, tissage, dessin, construction, epaisseur from tissu where UPPER(' . $type . ')=UPPER("' . $filtre . '") and dispo = 1 and code != "T000"';
        $query = $bdd->query($ss);
        ?>
        <div class="container catalogue">
            <div class="row" id="fabrics-container">
                <!--<div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="tissu-catalogue">
                        <div class="tissu-catalogue-photo">
                            <img src="img/photo-tissu-catalogue.jpg" alt="Chemise sur mesure TailorGeorge" width="100%" height="100%">
                        </div>
                        <div class="catalogue-details">
                            <p class="modele-catalogue">T1683<br>Fil à fil 90s bleu uni</p>
                            <p class="prix-catalogue oswald-bold">79€</p>
                        </div>
                    </div>
                </div>-->
                <?php
                //onclick="configurer(\'tissu_code_' . $value["reference"] . '\',\'' . $value["reference"] . '\',\'' . $value["code"] . '\',\'' . $value["url"] . '\',\'' . addslashes($value["titre"]) . '\',\'' . $value["prix"] . '\',\'' . addslashes($value["description"]) . '\',\'' . addslashes($value["H1"]) . '\',\'' . addslashes($value["couleur1"]) . '\',\'' . addslashes($value["tissage"]) . '\',\'' . addslashes($value["dessin"]) . '\')"
                while ($value = $query->fetch()) {
                    echo '<div class="col-xs-6 col-sm-4 col-md-3"><div id="tissu_' . $value["reference"] . '" class="tissu-catalogue"><div class="tissu-catalogue-photo" onclick="showPopup(\'' . $value["reference"] . '\',\'' . $value["code"] . '\',\'' . $value["url"] . '\',\'' . addslashes($value["titre"]) . '\',\'' . $value["prix"] . '\',\'' . addslashes($value["description"]) . '\',\'' . addslashes(utf8_encode($value["H1"])) . '\',\'' . addslashes($value["couleur1"]) . '\',\'' . addslashes($value["tissage"]) . '\',\'' . addslashes($value["dessin"]) . '\',\'' . $value["epaisseur"] . '\')"><img src="http://www.ls-chemise.com/tissu/150/' . $value["code"] . '.jpg" alt="' . addslashes(utf8_encode($value["H1"])) . '" width="100%" height="100%" /></div><div class="catalogue-details" style="max-height: 155px;height: 155px;"><a href="chemise-sur-mesure-' . $value["url"] . '.html" style="width: 100%;"><p class="modele-catalogue">' . $value["reference"] . '<br>' . utf8_encode($value["construction"]) . '</p><p class="prix-catalogue oswald-bold" style="font-size:2.1em;">' . $value["prix"] . ' €</p></a></div></div></div>';
                }
                ?>
            </div>
        </div>

        <!--<div class="container catalogue">
            <div class="row" id="fabrics-container">
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
                </div>-->

        <div id="popup" class="container" style="display: none;">
            <div class="row" style="margin-left: -20px; margin-right: -10px; min-height: 449px;">
                <img src="https://www.ls-chemise.com/style/wait.gif" alt="" id="waitpopup" style="display: none;">
                <!--<div id="contenu_popup">-->
                    <!--<div id="autres_tissus"><span>Tissus similaires : </span>
                        <div onclick="appel2('3090.W010.0103', 'https://www.ls-chemise.com/', 'catalogue');" style="background:url(https://www.ls-chemise.com/tissu/150/3090.W010.0103.jpg);">
                        </div>
                        <div onclick="appel2('3601.W7290.0005', 'https://www.ls-chemise.com/', 'catalogue');" style="background:url(https://www.ls-chemise.com/tissu/150/3601.W7290.0005.jpg);">
                        </div>
                        <div onclick="appel2('2629.851', 'https://www.ls-chemise.com/', 'catalogue');" style="background:url(https://www.ls-chemise.com/tissu/150/2629.851.jpg);">
                        </div>
                        <div onclick="appel2('T2841', 'https://www.ls-chemise.com/', 'catalogue');" style="background:url(https://www.ls-chemise.com/tissu/150/T2841.jpg);">
                        </div>
                        <div onclick="appel2('3090.W020.2633', 'https://www.ls-chemise.com/', 'catalogue');" style="background:url(https://www.ls-chemise.com/tissu/150/3090.W020.2633.jpg);">
                        </div>
                    </div>-->
                <div class="col-xs-offset-2 col-xs-7 col-sm-offset-2 col-sm-4 col-md-offset-2 col-md-2" style="padding-left: 0px;">
                    <div id="photo_detail"></div>
                </div>
                <div class="col-xs-offset-2 col-xs-7 col-sm-4 col-md-4" style="background: white; min-height: 449px;">
                    <div id="detail"></div>
                </div>
                <div style="float: left; margin-left: -41px;"><p id="fermer" onclick="fermer_popup();"></p></div>
            </div>
            <!--</div>-->
        </div>
        <div id="background" style="display: none; opacity: 0.7;"></div>



        <?php include("includes/footer.php"); ?>
        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script>
                    function fermerInfoLivraison() {
                        $.ajax({url: "js/ajax/cookie_livraison_info.php?t=", success: function(result) {}});
                        $("#info").hide();
                    }

                    function openFiltres() {
                        filtres.classList.toggle("open-filtres");
                        spanafficher.classList.toggle("masquer-span");
                        spanmasquer.classList.toggle("masquer-span");
                    }

                    $("#filtre_couleur_select").on("click", function(e) {
                        $("#filtre_couleur_selected").html(e.target.textContent);
                        load_home_models();
                    });
                    $("#filtre_cols_select").on("click", function(e) {
                        $("#filtre_cols_selected").html(e.target.textContent);
                        load_home_models();
                    });
                    $("#filtre_styles_select").on("click", function(e) {
                        $("#filtre_styles_selected").html(e.target.textContent);
                        load_home_models();
                    });
                    $("#filtre_tissages_select").on("click", function(e) {
                        $("#filtre_tissages_selected").html(e.target.textContent);
                        load_home_models();
                    });
                    $("#filtre_motifs_select").on("click", function(e) {
                        $("#filtre_motifs_selected").html(e.target.textContent);
                        load_home_models();
                    });
                    $("#filtre_prix_select").on("click", function(e) {
                        $("#filtre_prix_selected").html(e.target.textContent);
                        load_home_models();
                    });
                    //$("[id^='tissu_']").on("click", function(e) {
                    function showPopup(reference, code, url, titre, prix, description, H1, couleur, tissage, dessin, epaisseur) {
                        $('#photo_detail').html('<img src="https://www.ls-chemise.com/tissu/525/' + code + '.jpg" alt="">');
                        $('#detail').html('<h1 class="h1_texte">' + H1 + '</h1><p class="fort">PRIX : ' + prix + ' € <span>/ chemise</span></p><ul style="margin-top:10px;"><li><span>Référence :</span> ' + reference + '</li><li><span>Tissage :</span> ' + url + '</li><li><span>Épaisseur :</span> <img src="https://www.ls-chemise.com/style/epaisseur' + epaisseur + '.gif"></li><li class="text">' + description + '</li></ul><a id="btn_commande_tissu" class="btn-rose" onclick="configurer(\'tissu_code_' + reference + '\',\'' + reference + '\',\'' + code + '\',\'' + url + '\',\'' + titre + '\',\'' + prix + '\',\'' + description + '\',\'' + H1 + '\',\'' + couleur + '\',\'' + tissage + '\',\'' + dessin + '\')">Créez votre chemise avec ce tissu </a>');
                        installBackground();
                        $('#popup').css('display', 'block');
                    }
                    function configurer(id, reference, code, url, titre, prix, description, h1, couleur, tissage, dessin) {
                        document.forms['configurateur'].id.value = id;
                        document.forms['configurateur'].reference.value = reference;
                        document.forms['configurateur'].api_code.value = code;
                        document.forms['configurateur'].api_url.value = url;
                        document.forms['configurateur'].api_titre.value = titre;
                        document.forms['configurateur'].api_prix.value = prix;
                        document.forms['configurateur'].api_description.value = description;
                        document.forms['configurateur'].api_h1.value = h1;
                        document.forms['configurateur'].api_couleur.value = couleur;
                        document.forms['configurateur'].api_tissage.value = tissage;
                        document.forms['configurateur'].api_dessin.value = dessin;
                        document.forms['configurateur'].submit();
                    }
                    function fermer_popup() {
                        desinstallBackground();
                        $('#contenu_popup').innerHTML = '';
                        $('#popup').css('display', 'none');
                    }
                    function desinstallBackground() {
                        $('#background').css('display', 'none');
                    }
                    function installBackground() {
                        h = $(document).height();
                        c = $('#background');
                        c.css('height', h + 'px');
                        c.css('display', 'block');
                    }
        </script>

    </body>

</html>