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
                        <p class="choix-methode-mesure"><a href="panier-modif-mesure-rapide.html" id="rapide" style="font-size: 1.2em; text-decoration: underline;" > <b>Mesures rapides</b></a></p>
                    </div>
                    <div class="col-md-4">
                        <p class="choix-methode-mesure"><a id="corporelle" style="font-size: 1.2em;"> Mesures corporelle</a></p>
                    </div>
                    <div class="col-md-4">
                        <p class="choix-methode-mesure"><a href="panier-modif-mesure-chemise.html" id="chemise" style="font-size: 1.2em; text-decoration: underline;"> Mesures sur chemise</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- MESUREZ VOUS -->
        <div id="mesure_corporelle" class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- FORMULAIRE MESUREZ-VOUS -->
                    <form action="inscription-adresse.html" method="POST">
                        <input type="hidden" name="typeMesure" value="mesurez-vous" >
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
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Cou</h2>
                                    <div class="methode-mesure-img big mesurez-vous-cou"></div>
                                    <div class="input-group no-margin-bottom">
                                        <label class="label" for="cou_vous">Cou (cm)</label>
                                        <input class="input" type="text" name="cou_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['cou'])) echo $mesures['cou']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez le tour de cou en dessous de la pomme d'Adam en insérant un doigt entre le mètre ruban et le cou.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Poitrine</h2>
                                    <div class="methode-mesure-img big mesurez-vous-poitrine"></div>
                                    <div class="input-group no-margin-bottom">
                                        <label class="label" for="poitrine_vous">Poitrine (cm)</label>
                                        <input class="input" type="text" name="poitrine_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['poitrine'])) echo $mesures['poitrine']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez votre tour de poitrine en plaçant votre mètre sous les bras, sans gonfler la poitrine.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Ceinture</h2>
                                    <div class="methode-mesure-img big mesurez-vous-ceinture"></div>
                                    <div class="input-group no-margin-bottom">
                                        <label class="label" for="ceinture_vous">Ceinture (cm)</label>
                                        <input class="input" type="text" name="ceinture_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['ceinture'])) echo $mesures['ceinture']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez votre tour de taille en plaçant le mètre au creux de la taille, sans rentrer le ventre.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Carrure</h2>
                                    <div class="methode-mesure-img big mesurez-vous-carrure"></div>
                                    <div class="input-group no-margin-bottom">
                                        <label class="label" for="carrure_vous">Carrure (cm)</label>
                                        <input class="input" type="text" name="carrure_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['carrure'])) echo $mesures['carrure']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez d'un bord de l'épaule à l'autre.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Dos</h2>
                                    <div class="methode-mesure-img big mesurez-vous-dos"></div>
                                    <div class="input-group">
                                        <label class="label" for="dos_vous">Dos (cm)</label>
                                        <input class="input" type="text" name="dos_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['dos'])) echo $mesures['dos']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez depuis le bas du cou jusqu'à la longueur désirée, sous les fesses.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Poignet</h2>
                                    <div class="methode-mesure-img big mesurez-vous-poignet"></div>
                                    <div class="input-group no-margin-bottom">
                                        <label class="label" for="poignet_vous">Poignet (cm)</label>
                                        <input class="input" type="text" name="poignet_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['poignet'])) echo $mesures['poignet']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez votre tour de poignet au niveau de l'os.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Bras</h2>
                                    <div class="methode-mesure-img big mesurez-vous-bras"></div>
                                    <div class="input-group">
                                        <label class="label" for="bras-gauche_vous">Gauche (cm)</label>
                                        <input class="input" type="text" name="bras-gauche_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['brasgauche'])) echo $mesures['brasgauche']; ?>">
                                    </div>
                                    <div class="input-group no-margin-bottom">
                                        <label class="label" for="bras-droit">Droit (cm)</label>
                                        <input class="input" type="text" name="bras-droit_vous" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['brasdroit'])) echo $mesures['brasdroit']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez de la pointe d'épaule à la jointure du pouce.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Coupe / Aisance</h2>
                                    <div class="methode-mesure-img aisance-coupe"></div>
                                    <div class="input-group">
                                        <select class="select-mesure" name="coupe_vous" id="coupe_vous" required value="<?php if (!empty($mesures['aisance1'])) echo $mesures['aisance1']; ?>">
                                            <option value="droit" <?php if (!empty($mesures['aisance1']) && $mesures['aisance1'] == "droit") echo 'selected="selected"'; ?>>Droite</option>
                                            <option value="cintre" <?php if (!empty($mesures['aisance1']) && $mesures['aisance1'] == "cintre") echo 'selected="selected"'; ?>>Cintrée</option>
                                        </select>
                                    </div>
                                    <div class="input-group no-margin-bottom">
                                        <select class="select-mesure" name="aisance_vous" id="aisance_vous" required value="<?php if (!empty($mesures['aisance2'])) echo $mesures['aisance2']; ?>">
                                            <option value="ample" <?php if (!empty($mesures['aisance2']) && $mesures['aisance2'] == "ample") echo 'selected="selected"'; ?>>Ample</option>
                                            <option value="standard" <?php if (!empty($mesures['aisance2']) && $mesures['aisance2'] == "standard") echo 'selected="selected"'; ?>>Standard</option>
                                            <option value="pres-du-corps" <?php if (!empty($mesures['aisance2']) && $mesures['aisance2'] == "pres-du-corps") echo 'selected="selected"'; ?>>Près du corps</option>
                                        </select>
                                    </div>
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
        <script type="text/javascript">
                                            $(document).ready(function() {
                                                document.getElementById("rapide").addEventListener("click", function(e) {
                                                    $("#mesure_rapide").show();
                                                    $("#mesure_corporelle").hide();
                                                    $("#mesure_chemise").hide();
                                                });
                                                document.getElementById("corporelle").addEventListener("click", function(t) {
                                                    $("#mesure_rapide").hide();
                                                    $("#mesure_corporelle").show();
                                                    $("#mesure_chemise").hide();
                                                });
                                                document.getElementById("chemise").addEventListener("click", function(n) {
                                                    $("#mesure_rapide").hide();
                                                    $("#mesure_corporelle").hide();
                                                    $("#mesure_chemise").show();
                                                });
                                            });
        </script>

    </body>

</html>