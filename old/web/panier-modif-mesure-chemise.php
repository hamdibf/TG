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
                        <p class="choix-methode-mesure"><a href="panier-modif-mesure-corps.html" id="corporelle" style="font-size: 1.2em; text-decoration: underline;"> Mesures corporelle</a></p>
                    </div>
                    <div class="col-md-4">
                        <p class="choix-methode-mesure"><a id="chemise" style="font-size: 1.2em;"> Mesures sur chemise</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- MESURE CHEMISE -->
        <div id="mesure_chemise" class="container">

            <div class="row">
                <div class="col-xs-12">
                    <!-- FORMULAIRE MESURE SUR CHEMISE -->
                    <form action="inscription-adresse.html" method="POST">
                        <input type="hidden" name="typeMesure" value="mesure-chemise" >
                        <!-- MESURE RAPIDE -->
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
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Col</h2>
                                    <div class="methode-mesure-img mesure-chemise-col"></div>
                                    <div class="input-group">
                                        <label class="label" for="col_chemise">Col (cm)</label>
                                        <input class="input" type="text" name="col_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['cou_chem'])) echo $mesures['cou_chem']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez depuis le centre du bouton, jusqu'au centre de la boutonnière, le col étant à plat.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Poignet</h2>
                                    <div class="methode-mesure-img mesure-chemise-poignet"></div>
                                    <div class="input-group">
                                        <label class="label" for="poignet_chemise">Poignet (cm)</label>
                                        <input class="input" type="text" name="poignet_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['poignet_chem'])) echo $mesures['poignet_chem']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez d'un bord à l'autre, le poignet étant bien à plat.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Manche</h2>
                                    <div class="methode-mesure-img mesure-chemise-manche"></div>
                                    <div class="input-group">
                                        <label class="label" for="manche_chemise">Manche (cm)</label>
                                        <input class="input" type="text" name="manche_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['manchestandard'])) echo $mesures['manchestandard']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez depuis la couture de l'épaule jusqu'au bout du poignet.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Demi-poitrine</h2>
                                    <div class="methode-mesure-img mesure-chemise-demi-poitrine"></div>
                                    <div class="input-group">
                                        <label class="label" for="demi-poitrine_chemise">Demi-poitrine (cm)</label>
                                        <input class="input" type="text" name="demi-poitrine_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['poitrine_chem'])) echo $mesures['poitrine_chem']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez depuis la couture gauche jusqu'à la couture droite, juste en-dessous des manches.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Demi-taille</h2>
                                    <div class="methode-mesure-img mesure-chemise-demi-taille"></div>
                                    <div class="input-group">
                                        <label class="label" for="demi-taille_chemise">Demi-taille (cm)</label>
                                        <input class="input" type="text" name="demi-taille_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['taillestandard'])) echo $mesures['taillestandard']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez depuis la couture gauche jusqu'à la couture droite, au niveau de la taille.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Dos</h2>
                                    <div class="methode-mesure-img mesure-chemise-dos"></div>
                                    <div class="input-group">
                                        <label class="label" for="dos_chemise">Dos (cm)</label>
                                        <input class="input" type="text" name="dos_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['dos_chem'])) echo $mesures['dos_chem']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez depuis la couture du col, jusqu'au bas de la chemise.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Carrure</h2>
                                    <div class="methode-mesure-img mesure-chemise-carrure"></div>
                                    <div class="input-group">
                                        <label class="label" for="carrure_chemise">Carrure (cm)</label>
                                        <input class="input" type="text" name="carrure_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['carrure_chem'])) echo $mesures['carrure_chem']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez d'un bord de l'épaule à l'autre.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="methode-mesure-rapide">
                                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Épaule</h2>
                                    <div class="methode-mesure-img mesure-chemise-epaule"></div>
                                    <div class="input-group">
                                        <label class="label" for="epaule_chemise">Épaule (cm)</label>
                                        <input class="input" type="text" name="epaule_chemise" onfocus="activLabel(this)" onblur="activLabel(this)" required value="<?php if (!empty($mesures['epaule_chem'])) echo $mesures['epaule_chem']; ?>">
                                    </div>
                                    <p class="mesure-conseil">Mesurez depuis la base du cou jusqu'à la pointe de l'épaule.</p>
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