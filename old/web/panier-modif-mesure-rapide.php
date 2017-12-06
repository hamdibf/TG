<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);

$id = session_id();
$s = 'select * from tg_sessions where session_id="' . $id . '"';
$q = $bdd->query($s);
$ds = $q->fetch();

$ss = 'select * from tg_client where id="' . $ds['client_id'] . '"';
$qq = $bdd->query($ss);
$client = $qq->fetch();

$ss = 'select * from tg_mesure where id_client="' . $client['id'] . '"';
$qq = $bdd->query($ss);
$mesures = $qq->fetch();

$_SESSION['type_mesure'] = $mesures["type"];
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
                        <li><a class="header-panier-lien" href="verification-adresse.html">3. Coordonnées</a></li>
                        <li><a class="header-panier-lien" href="panier-step-4.php">4. Récapitulatif & Paiement</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--  RETOUR CHOIX MESURE  -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!--<p class="choix-methode-mesure"><a href="panier-step-2-new-mesure.php"> &laquo; Retour au choix des mesures</a></p>-->
                </div>
            </div>
        </div>
        <?php
        if (!isset($_SESSION["info_mesure"])) {
            echo '<div class="container" style="text-align:center;">
            <div class="row">
                <div class="col-xs-12 col-sm-offset-4 col-sm-4" style="margin-bottom:50px">
                        <h1 class="methode-titre oswald-regular">Bonjour ' . $client["prenom"] . '!</h1>
                        <hr class="message-inner-separator" style="margin-top: 10px; margin-bottom: 10px;">
                        <p style="font-size: 1.4em">Vérifiez vos mesures ci-dessous ou modifiez-les</p>
                        <p style="font-size: 1.4em">(Mesures modifiées le ' . $mesures["date_modif"] . ')</p>
                </div>
            </div>
        </div>';
            $_SESSION["info_mesure"] = "vu";
        }
        ?>

        <!-- MESURE RAPIDE -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-md-4">
                        <p class="choix-methode-mesure"><a id="rapide" style="font-size: 1.2em;" > <b>Mesures rapides</b></a></p>
                    </div>
                    <div class="col-md-4">
                        <p class="choix-methode-mesure"><a href="panier-modif-mesure-corps.html" id="corporelle" style="font-size: 1.2em; text-decoration: underline;"> Mesures corporelle</a></p>
                    </div>
                    <div class="col-md-4">
                        <p class="choix-methode-mesure"><a href="panier-modif-mesure-chemise.html" id="chemise" style="font-size: 1.2em; text-decoration: underline;"> Mesures sur chemise</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div id="mesure_rapide" class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- FORMULAIRE MESURE RAPIDE -->
                    <form action="inscription-adresse.html" method="POST">
                        <input type="hidden" name="typeMesure" value="mesure-rapide" >
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="methode-mesure methode-small">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Aide au calibrage</h2>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4">
                                            <!-- AGE -->
                                            <div class="input-group">
                                                <label class="label" for="age">Age</label>
                                                <input class="input" type="text" name="age" id="age" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php
                                                if (!empty($mesures['age'])) {
                                                    echo $mesures['age'];
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4">
                                            <!-- TAILLE -->
                                            <div class="input-group">
                                                <label class="label" for="taille">Taille (cm)</label>
                                                <input class="input" type="text" name="taille" id="taille" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php
                                                if (!empty($mesures['taille'])) {
                                                    echo $mesures['taille'];
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-4">
                                            <!-- POIDS -->
                                            <div class="input-group no-margin-bottom">
                                                <label class="label" for="poids">Poids (kg)</label>
                                                <input class="input" type="text" name="poids" id="poids" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php
                                                if (!empty($mesures['poids'])) {
                                                    echo $mesures['poids'];
                                                }
                                                ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- MESURE RAPIDE -->
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Choisissez votre taille de chemise</h2>
                                    <div class="methode-mesure-img mesure-rapide-taille"></div>
                                    <select class="select-mesure" name="mesure-rapide-taille" id="mesure-rapide-taille" required>
                                        <option value="XS" <?php
                                        if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "XS") {
                                            echo 'selected';
                                        }
                                        ?>>37 - (XS) - 14,5</option>
                                        <option value="S" <?php
                                        if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "S") {
                                            echo 'selected';
                                        }
                                        ?>>38 - (S) - 14,5</option>
                                        <option value="S+" <?php
                                        if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "S+") {
                                            echo 'selected';
                                        }
                                        ?>>39 - (S+) - 14,5</option>
                                        <option value="M" <?php
                                        if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "M") {
                                            echo 'selected';
                                        }
                                        ?>>40 - (M) - 14,5</option>
                                        <option value="M+" <?php
                                        if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "M+") {
                                            echo 'selected';
                                        }
                                        ?>>41 - (M+) - 14,5</option>
                                        <option value="L" <?php
                                        if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "L") {
                                            echo 'selected';
                                        }
                                        ?>>42 - (L) - 14,5</option>
                                        <option value="L+" <?php
                                        if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "L+") {
                                            echo 'selected';
                                        }
                                        ?>>43 - (L+) - 14,5</option>
                                        <option value="XL" <?php
                                        if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "XL") {
                                            echo 'selected';
                                        }
                                        ?>>44 - (XL) - 14,5</option>
                                        <option value="XL+" <?php
                                        if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "XL+") {
                                            echo 'selected';
                                        }
                                        ?>>45 - (XL+) - 14,5</option>
                                        <option value="XXL" <?php
                                        if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "XXL") {
                                            echo 'selected';
                                        }
                                        ?>>46 - (XXL) - 14,5</option>
                                        <option value="XXL+" <?php
                                        if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "XXL+") {
                                            echo 'selected';
                                        }
                                        ?>>47 - (XXL+) - 14,5</option>
                                        <option value="XXXl" <?php
                                        if (!empty($mesures['mesure_rapide_taille']) && $mesures["mesure_rapide_taille"] == "XXXl") {
                                            echo 'selected';
                                        }
                                        ?>>48 - (XXXL) - 14,5</option>
                                    </select>
                                    <p class="mesure-conseil">(Choisissez la taille qui vous va le mieux au niveau du corps)</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Ajustez votre encolure</h2>
                                    <div class="methode-mesure-img mesure-rapide-col"></div>
                                    <select class="select-mesure" name="mesure-rapide-col" id="mesure-rapide-col" required>
                                        <option value="37" <?php
                                        if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "37") {
                                            echo 'selected';
                                        }
                                        ?>>37 cm</option>
                                        <option value="38" <?php
                                        if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "38") {
                                            echo 'selected';
                                        }
                                        ?>>38 cm</option>
                                        <option value="39" <?php
                                        if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "39") {
                                            echo 'selected';
                                        }
                                        ?>>39 cm</option>
                                        <option value="40" <?php
                                        if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "40") {
                                            echo 'selected';
                                        }
                                        ?>>40 cm</option>
                                        <option value="41" <?php
                                        if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "41") {
                                            echo 'selected';
                                        }
                                        ?>>41 cm</option>
                                        <option value="42" <?php
                                        if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "42") {
                                            echo 'selected';
                                        }
                                        ?>>42 cm</option>
                                        <option value="43" <?php
                                        if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "43") {
                                            echo 'selected';
                                        }
                                        ?>>43 cm</option>
                                        <option value="44" <?php
                                        if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "44") {
                                            echo 'selected';
                                        }
                                        ?>>44 cm</option>
                                        <option value="45" <?php
                                        if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "45") {
                                            echo 'selected';
                                        }
                                        ?>>45 cm</option>
                                        <option value="46" <?php
                                        if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "46") {
                                            echo 'selected';
                                        }
                                        ?>>46 cm</option>
                                        <option value="47" <?php
                                        if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "47") {
                                            echo 'selected';
                                        }
                                        ?>>47 cm</option>
                                        <option value="48" <?php
                                        if (!empty($mesures['mesure_rapide_col']) && $mesures["mesure_rapide_col"] == "48") {
                                            echo 'selected';
                                        }
                                        ?>>48 cm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Ajustez la longueur de vos manches</h2>
                                    <div class="methode-mesure-img mesure-rapide-bras"></div>
                                    <select class="select-mesure" name="mesure-rapide-bras" id="mesure-rapide-bras" required>
                                        <option value="extracourte" <?php
                                        if (!empty($mesures['mesure_rapide_bras']) && $mesures["mesure_rapide_bras"] == "extracourte") {
                                            echo 'selected';
                                        }
                                        ?>>Manches extra-courtes (-4 cm)</option>
                                        <option value="courte" <?php
                                        if (!empty($mesures['mesure_rapide_bras']) && $mesures["mesure_rapide_bras"] == "courte") {
                                            echo 'selected';
                                        }
                                        ?>>Manches plus courtes (-2 cm)</option>
                                        <option value="standard"  <?php
                                        if (!empty($mesures['mesure_rapide_bras']) && $mesures["mesure_rapide_bras"] == "standard") {
                                            echo 'selected';
                                        }
                                        ?>>Manches standards</option>
                                        <option value="longue" <?php
                                        if (!empty($mesures['mesure_rapide_bras']) && $mesures["mesure_rapide_bras"] == "longue") {
                                            echo 'selected';
                                        }
                                        ?>>Manches plus longues (+2 cm)</option>
                                        <option value="extralongue" <?php
                                        if (!empty($mesures['mesure_rapide_bras']) && $mesures["mesure_rapide_bras"] == "extralongue") {
                                            echo 'selected';
                                        }
                                        ?>>Manches extra-longues (+4 cm)</option>
                                    </select>
                                    <p class="mesure-conseil">Longueur standard = 64 cm</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Choisissez la coupe de votre chemise</h2>
                                    <div class="methode-mesure-img aisance-coupe"></div>
                                    <select class="select-mesure" name="aisance-coupe_rapide" id="aisance-coupe_rapide" required>
                                        <option value="droit" <?php
                                        if (!empty($mesures['coupe_vous']) && $mesures["coupe_vous"] == "droit") {
                                            echo 'selected';
                                        }
                                        ?>>Droite</option>
                                        <option value="cintre" <?php
                                        if (!empty($mesures['coupe_vous']) && $mesures["coupe_vous"] == "cintre") {
                                            echo 'selected';
                                        }
                                        ?>>Cintrée</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- ENREGISTRER MESURE-RAPIDE -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="submit-container">
                                    <input class="btn-rose" type="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript">var t =<?php echo time(); ?></script>
        <script type="text/javascript" src="js/index.js"></script>

    </body>

</html>