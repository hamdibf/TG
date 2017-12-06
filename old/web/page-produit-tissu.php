<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);
$_SESSION["tissu_en_cours"] = $_REQUEST['alias'];
$alias = $_REQUEST['alias'];

$sql = 'select * from tissu where url="' . $alias . '" and dispo = 1';
$query = $bdd->query($sql);
$d = $query->fetch();
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php echo $d['titre']; ?></title>

        <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">

    </head>

    <body>

        <!-- INFO-LIVRAISON -->
        <?php include("includes/info-livraison.php"); ?>

        <!-- NAVIGATION -->
        <?php include("includes/navigation.php"); ?>

        <!-- HEADER PAGE PRODUIT -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="header-page-produit">
                        <?php
                        $link = "catalogue-tissu.html";
                        /* if (!empty($_SESSION['alias'])) {
                          $link = $_SESSION['alias'];
                          } */
                        ?>
                        <a class="lien-retour-catalogue" href="<?php echo $link; ?>"> &lt; Retour au catalogue tissus</a>
                    </div>
                </div>
            </div>
        </div>

        <!--  ARTICLE + DESCRIPTION  -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <!-- PHOTO DE L'ARTICLE -->
                    <div class = "article-container" style="margin-left: 30px; height: 449px;">
                        <img src = "<?php echo 'https://www.ls-chemise.com/tissu/525/' . $d['code'] . '.jpg'; ?>" alt = "" style="margin-left: 0px;">
                    </div>
                </div>
                <div class = "col-xs-12 col-md-6">
                    <!--DESCRIPTION DE L'ARTICLE -->
                    <div class = "description-container">
                        <h1 class="h1_texte"><?php echo $d['H1']; ?> </h1>
                        <p style="font-size: 1.5em;"><?php echo $d['description']; ?></p>
                        <p class="oswald-bold" style="font-size: 3em; margin-top: 15px;"><?php echo $d['prix']; ?>€<span class="oswald-regular" style="font-size: 0.5em;">    la chemise sur mesure</span></p>
                        <ul style="margin-top: 15px;font-size: 1.5em;">
                            <li style="margin-top: 10px;"><span>Référence :</span>  <?php echo $d['reference']; ?> </li>
                            <li style="margin-top: 10px;"><span>Origine :</span>  <?php echo $d['origine']; ?> </li>
                            <li style="margin-top: 10px;"><span>Matière :</span>  <?php echo $d['matiere']; ?> </li>
                            <li style="margin-top: 10px;"><span>Tissage :</span>  <?php echo $d['tissage']; ?> </li>
                            <li style="margin-top: 10px;"><span>Fil :</span>  <?php echo $d['fil']; ?> </li>
                            <li style="margin-top: 10px;"><span>Épaisseur :</span> <img <?php echo 'src="https://www.ls-chemise.com/style/epaisseur' . $d['epaisseur'] . '.gif"'; ?>></li>
                        </ul>
                        <a onclick="<?php echo "configurer('tissu_code_" . $d['reference'] . "','" . $d['reference'] . "','" . $d['code'] . "','" . $d['url'] . "','" . $d['titre'] . "','" . $d['prix'] . "','" . $d['description'] . "','" . $d['H1'] . "','" . $d['couleur1'] . "','" . $d['tissage'] . "','" . $d['dessin'] . "')"; ?>" class="btn-rose" style="margin-top: 30px;">Créer votre chemise avec ce tissu</a>
                    </div>
                </div>
            </div>
        </div>

        <!--  AUTRES MODELES  -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="autres-modeles-titre" style="margin-top: 80px">Découvrez d'autres tissus <?php echo $d['couleur1'] . 's '; ?></h2>
                </div>
                <?php
                $sql = 'select * from tissu where couleur1 = "' . $d['couleur1'] . '" and dispo = 1 and reference != "' . $d['reference'] . '" limit 0,6';
                $query = $bdd->query($sql);

                echo '<div class="row">';
                while ($value = $query->fetch()) {
                    echo '<div class="col-xs-6 col-sm-2 col-md-2"><a href="chemise-sur-mesure-' . $value["url"] . '.html"><div id="tissu_' . $value["reference"] . '" class="tissu-catalogue"><div class="tissu-catalogue-photo" onclick="showPopup(\'' . $value["reference"] . '\',\'' . $value["code"] . '\',\'' . $value["url"] . '\',\'' . addslashes($value["titre"]) . '\',\'' . $value["prix"] . '\',\'' . addslashes($value["description"]) . '\',\'' . addslashes(utf8_encode($value["H1"])) . '\',\'' . addslashes($value["couleur1"]) . '\',\'' . addslashes($value["tissage"]) . '\',\'' . addslashes($value["dessin"]) . '\',\'' . $value["epaisseur"] . '\')"><img src="http://www.ls-chemise.com/tissu/150/' . $value["code"] . '.jpg" alt="' . addslashes(utf8_encode($value["H1"])) . '" width="100%" height="100%" /></div><div class="catalogue-details" style="max-height: 155px;height: 155px;"><a href="chemise-sur-mesure-' . $value["url"] . '.html" style="width: 100%;"><p class="modele-catalogue">' . $value["construction"] . '</p><p class="prix-catalogue oswald-bold" style="font-size:2.1em;">' . $value["prix"] . ' €</p></a></div></div></a></div>';
                }
                ?>
                <div class="col-xs-12" style="margin-top: 50px">
                    <div class="fin-apercu-catalogue">
                        <a href="catalogue-tissu.html" class="btn-rose">Voir tous nos tissus</a>
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
        <?php include("includes/footer.php"); ?>
        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript">var t =<?php echo time(); ?>;
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
        </script>

    </body>

</html>