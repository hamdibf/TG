<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);

$h1 = 'Avis clients - TailorGeorge, chemises sur mesure en ligne';
$title = 'Avis clients – TailorGeorge';
$description = "Découvrez plus de 50 avis sur TailorGeorge, chemises sur mesure en ligne";
$sql = 'select count(*) as n from tissu where dispo = 1';
$query = $bdd->query($sql);
$data = $query->fetch();
$count = $data['n'];
$categorie = '';
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
                        <p class="fil-arianne oswald-regular"><a href="index.php">accueil</a> / avis /</p>
                        <h1 class="fil-arianne-activ oswald-regular"><?php echo $h1; ?></h1>
                        <!-- <p class="modele-find"><?php //echo $count;       ?> modèles</p>-->
                    </div>
                </div>
            </div>
        </div>

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
                                $s = 'select * from tg_avisclient_general where best="1"  order by id desc';
                                $q = $bdd->query($s);
                                while ($avis = $q->fetch()) {
                                    ?>
                                    <div class="temoignages-content">
                                        <p class="temoignage-client" style="text-align: justify;">"<?php echo stripslashes($avis['avis']); ?>"</p>
                                        <p class="temoignage-nom-client"><?php echo $avis['nom']; ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include("includes/footer.php"); ?>
        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

    </body>

</html>