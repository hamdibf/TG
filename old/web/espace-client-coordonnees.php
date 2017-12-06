<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);
$id = session_id();
$s = 'select * from tg_sessions where session_id="' . $id . '"';
$q = $bdd->query($s);
$ds = $q->fetch();

if (!empty($_REQUEST["adresse_identique"])) {
    if ($_REQUEST["adresse_identique"] == "yes") {
        $s = 'UPDATE `tg_client` SET
                `telephone` = "' . htmlspecialchars($_REQUEST["number"]) . '",
                `adresse` = "' . htmlspecialchars($_REQUEST["adresse"]) . '",
                `renseignement` = "' . htmlspecialchars($_REQUEST["renseignement"]) . '",
                `postal` = "' . htmlspecialchars($_REQUEST["code-postal"]) . '",
                `ville` = "' . htmlspecialchars($_REQUEST["ville"]) . '",
                `pays` = "' . htmlspecialchars($_REQUEST["pays"]) . '",
                `nom_livraison` = "' . htmlspecialchars($_REQUEST["nom_livraison"]) . '",
                `prenom_livraison` = "' . htmlspecialchars($_REQUEST["prenom_livraison"]) . '",
                `nom` = "' . htmlspecialchars($_REQUEST["nom"]) . '",
                `prenom` = "' . htmlspecialchars($_REQUEST["prenom"]) . '",
                `societe` = "' . htmlspecialchars($_REQUEST["societe_facturation"]) . '",
                `societe_livraison` = "' . htmlspecialchars($_REQUEST["societe_livraison"]) . '",
                `adresse_livraison` = "' . htmlspecialchars($_REQUEST["adresse"]) . '",
                `renseignement_livraison` =  "' . htmlspecialchars($_REQUEST["renseignement"]) . '",
                `postal_livraison` = "' . htmlspecialchars($_REQUEST["code-postal"]) . '",
                `ville_livraison` = "' . htmlspecialchars($_REQUEST["ville"]) . '",
                `pays_livraison` =  "' . htmlspecialchars($_REQUEST["pays"]) . '",
                `adresse_identique` = 1  WHERE id = ' . $ds['client_id'] . ' ;';
    } elseif ($_REQUEST["adresse_identique"] == "no") {
        $s = 'UPDATE `tg_client` SET
                `telephone` = "' . htmlspecialchars($_REQUEST["number"]) . '",
                `adresse` = "' . htmlspecialchars($_REQUEST["adresse_facturation"]) . '",
                `renseignement` = "' . htmlspecialchars($_REQUEST["renseignement_facturation"]) . '",
                `postal` = "' . htmlspecialchars($_REQUEST["code-postal_facturation"]) . '",
                `ville` = "' . htmlspecialchars($_REQUEST["ville_facturation"]) . '",
                `pays` = "' . htmlspecialchars($_REQUEST["pays_facturation"]) . '",
                `nom_livraison` = "' . htmlspecialchars($_REQUEST["nom_livraison"]) . '",
                `prenom_livraison` = "' . htmlspecialchars($_REQUEST["prenom_livraison"]) . '",
                `nom` = "' . htmlspecialchars($_REQUEST["nom"]) . '",
                `prenom` = "' . htmlspecialchars($_REQUEST["prenom"]) . '",
                `societe` = "' . htmlspecialchars($_REQUEST["societe_facturation"]) . '",
                `societe_livraison` = "' . htmlspecialchars($_REQUEST["societe_livraison"]) . '",
                `adresse_livraison` = "' . htmlspecialchars($_REQUEST["adresse"]) . '",
                `renseignement_livraison` =  "' . htmlspecialchars($_REQUEST["renseignement"]) . '",
                `postal_livraison` = "' . htmlspecialchars($_REQUEST["code-postal"]) . '",
                `ville_livraison` = "' . htmlspecialchars($_REQUEST["ville"]) . '",
                `pays_livraison` =  "' . htmlspecialchars($_REQUEST["pays"]) . '",
                `adresse_identique` = 0  WHERE id = ' . $ds['client_id'] . ' ;';
    }
    $bdd->exec($s);
}
$ss = 'select * from tg_client where id="' . $ds['client_id'] . '"';
$qq = $bdd->query($ss);
$client = $qq->fetch();
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

        <!-- ESPACE CLIENT -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-2">
                    <!-- SOUS NAVIGATION -->
                    <ul class="espace-client-sous-nav">
                        <li><a class="oswald-regular" href="espace-client.php">Commandes</a></li>
                        <li><a class="oswald-regular sous-nav-actif" href="espace-client-coordonnees.php">Coordonnées</a></li>
                        <li><a class="oswald-regular" href="espace-client-mesures.php">Mesures</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-10">
                    <!-- COORDONNEES CONTAINER -->
                    <div class="methode-mesure methode-small">
                        <h2 class="methode-titre oswald-regular" style="margin-bottom: 30px;">Vos coordonnées</h2>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6" style="text-align: left; margin-bottom: 30px;">
                                <h2 class="oswald-regular" style="font-size: 1.5em; margin-bottom: 10px; color:#f26d7d; text-align: left">De facturation</h2>
                                <?php
                                $selectPays = 'select nom from tg_pays where code = ' . $client["pays"] . ';';
                                $queryPays = $bdd->query($selectPays);
                                $pays = $queryPays->fetch();
                                $selectPaysLiv = 'select nom from tg_pays where code = ' . $client["pays"] . ';';
                                $queryPaysLiv = $bdd->query($selectPaysLiv);
                                $paysLiv = $queryPaysLiv->fetch();
                                ?>
                                <ul class="ul-recap">
                                    <li><?php echo $client["prenom"]; ?></li>
                                    <li><?php echo $client["nom"]; ?></li>
                                    <li><?php echo $client["adresse"]; ?></li>
                                    <li><?php echo $client["renseignement"]; ?></li>
                                    <li><?php echo $client["societe"]; ?></li>
                                    <li><?php echo 'Tél.: ' . $client["telephone"]; ?></li>
                                    <li><?php echo $client["postal"]; ?></li>
                                    <li><?php echo $client["ville"]; ?></li>
                                    <li><?php echo $pays["nom"]; ?></li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-6" style="text-align: left; margin-bottom: 30px;">
                                <h2 class="oswald-regular" style="font-size: 1.5em; margin-bottom: 10px; color:#f26d7d; text-align: left">De livraison</h2>
                                <ul class="ul-recap">
                                    <li><?php echo $client["prenom_livraison"]; ?></li>
                                    <li><?php echo $client["nom_livraison"]; ?></li>
                                    <li><?php echo $client["adresse_livraison"]; ?></li>
                                    <li><?php echo $client["adresse"]; ?></li>
                                    <li><?php echo $client["renseignement_livraison"]; ?></li>
                                    <li><?php echo $client["societe_livraison"]; ?></li>
                                    <li><?php echo 'Tél.: ' . $client["telephone"]; ?></li>
                                    <li><?php echo $client["postal_livraison"]; ?></li>
                                    <li><?php echo $client["ville_livraison"]; ?></li>
                                    <li><?php echo $paysLiv["nom"]; ?></li>
                                </ul>
                            </div>
                            <div class="col-xs-12">
                                <a class="modifier-info-compte" href="espace-client-modif-coordonnees.php">Modifiez vos coordonnées</a>
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