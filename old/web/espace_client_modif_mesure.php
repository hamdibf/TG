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

        <!-- HEADER CONNEXION -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="header-page bgk-connexion">
                        <p class="fil-arianne oswald-regular"><a href="index.php">accueil</a> / <a href="connexion.php">login</a></p>
                        <h1 class="fil-arianne-activ oswald-regular">Espace client de <?php echo $client["prenom"] . ' ' . $client["nom"]; ?></h1>
                        <a class="modele-find" href="connexion.php">Déconnexion</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- MESURE RAPIDE -->
        <?php include("includes/client-modif-mesure.php"); ?>
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