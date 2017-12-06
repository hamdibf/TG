<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);

$type_mesure = $_SESSION['type_mesure'];
if (isset($_SESSION['client_id'])) {
    $client_id = $_SESSION['client_id'];
}

if ($type_mesure == "mesure-rapide") {
    $_SESSION['age'] = $_REQUEST['age'];
    $_SESSION['taille'] = $_REQUEST['taille'];
    $_SESSION['poids'] = $_REQUEST['poids'];
    $_SESSION['mesure-rapide-taille'] = $_REQUEST['mesure-rapide-taille'];
    $_SESSION['mesure-rapide-col'] = $_REQUEST['mesure-rapide-col'];
    $_SESSION['mesure-rapide-bras'] = $_REQUEST['mesure-rapide-bras'];
    $_SESSION['aisance-coupe_rapide'] = $_REQUEST['aisance-coupe_rapide'];

    if (TgSession::getEmailConnected($bdd) != '') {
        $update = 'update tg_mesure set type="' . $_SESSION['type_mesure'] . '",age="' . $_SESSION['age'] . '",taille="' . $_SESSION['taille'] . '",poids="' . $_SESSION['poids'] . '",mesure_rapide_taille="' . $_SESSION['mesure-rapide-taille'] . '",mesure_rapide_col="' . $_SESSION['mesure-rapide-col'] . '",mesure_rapide_bras="' . $_SESSION['mesure-rapide-bras'] . '",coupe_vous="' . $_SESSION['aisance-coupe_rapide'] . '" where id_client="' . TgSession::getIdConnected($bdd) . '"';
        $bdd->exec($update);
        header('Location: panier-3.html');
    }
}

if ($type_mesure == "mesure-chemise") {
    $_SESSION['age'] = $_REQUEST['age'];
    $_SESSION['taille'] = $_REQUEST['taille'];
    $_SESSION['poids'] = $_REQUEST['poids'];

    $_SESSION['col_chemise'] = $_REQUEST['col_chemise'];
    $_SESSION['poignet_chemise'] = $_REQUEST['poignet_chemise'];
    $_SESSION['manche_chemise'] = $_REQUEST['manche_chemise'];
    $_SESSION['demi-poitrine_chemise'] = $_REQUEST['demi-poitrine_chemise'];
    $_SESSION['demi-taille_chemise'] = $_REQUEST['demi-taille_chemise'];
    $_SESSION['dos_chemise'] = $_REQUEST['dos_chemise'];
    $_SESSION['carrure_chemise'] = $_REQUEST['carrure_chemise'];
    $_SESSION['epaule_chemise'] = $_REQUEST['epaule_chemise'];

    if (TgSession::getEmailConnected($bdd) != '') {
        $update = 'update tg_mesure set type="' . $_SESSION['type_mesure'] . '",age="' . $_SESSION['age'] . '",taille="' . $_SESSION['taille'] . '",poids="' . $_SESSION['poids'] . '",cou_chem="' . $_SESSION['col_chemise'] . '",poignet_chem="' . $_SESSION['poignet_chemise'] . '",poitrine_chem="' . $_SESSION['demi-poitrine_chemise'] . '",dos_chem="' . $_SESSION['dos_chemise'] . '",carrure_chem="' . $_SESSION['carrure_chemise'] . '",epaule_chem="' . $_SESSION['epaule_chemise'] . '",manche_chem="' . $_SESSION['manche_chemise'] . '",demi_taille_chem="' . $_SESSION['demi-taille_chemise'] . '" where id_client="' . TgSession::getIdConnected($bdd) . '"';
        $bdd->exec($update);
        header('Location: panier-3.html');
    }
}

if ($type_mesure == "mesurez-vous") {
    $_SESSION['age'] = $_REQUEST['age'];
    $_SESSION['taille'] = $_REQUEST['taille'];
    $_SESSION['poids'] = $_REQUEST['poids'];
    $_SESSION['cou_vous'] = $_REQUEST['cou_vous'];
    $_SESSION['poitrine_vous'] = $_REQUEST['poitrine_vous'];
    $_SESSION['ceinture_vous'] = $_REQUEST['ceinture_vous'];
    $_SESSION['carrure_vous'] = $_REQUEST['carrure_vous'];
    $_SESSION['bras-droit_vous'] = $_REQUEST['bras-droit_vous'];
    $_SESSION['bras-gauche_vous'] = $_REQUEST['bras-gauche_vous'];
    $_SESSION['coupe_vous'] = $_REQUEST['coupe_vous'];
    $_SESSION['aisance_vous'] = $_REQUEST['aisance_vous'];
    $_SESSION['dos_vous'] = $_REQUEST['dos_vous'];
    $_SESSION['poignet_vous'] = $_REQUEST['poignet_vous'];

    if (TgSession::getEmailConnected($bdd) != '') {
        $update = 'update tg_mesure set type="' . $_SESSION['type_mesure'] . '",age="' . $_SESSION['age'] . '",taille="' . $_SESSION['taille'] . '",poids="' . $_SESSION['poids'] . '",cou="' . $_SESSION['cou_vous'] . '",poitrine="' . $_SESSION['poitrine_vous'] . '",ceinture="' . $_SESSION['ceinture_vous'] . '",carrure="' . $_SESSION['carrure_vous'] . '",dos="' . $_SESSION['dos_vous'] . '",poignet="' . $_SESSION['poignet_vous'] . '",brasdroit="' . $_SESSION['bras-droit_vous'] . '",brasgauche="' . $_SESSION['bras-gauche_vous'] . '",aisance1="' . $_SESSION['coupe_vous'] . '",aisance2="' . $_SESSION['aisance_vous'] . '" where id_client="' . TgSession::getIdConnected($bdd) . '"';
        $bdd->exec($update);
        header('Location: panier-3.html');
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Nouveau Compte - TailorGeorge</title>
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
                        <p class="fil-arianne oswald-regular"><a href="home">accueil</a> / <a href="#">Espace Client</a> /</p>
                        <h1 class="fil-arianne-activ oswald-regular">Cr&eacute;er un nouveau compte</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- ESPACE CLIENT -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <!-- COORDONNEES CONTAINER -->
                    <!-- COORDONEES -->
                    <div class="row">
                        <div class="col-xs-12">
                            <!--  COORDONNEE  -->
                            <form action="notification.html" method="POST">
                                <input type="hidden" name="action" value="nouveau-compte">
                                <!-- NOM / PRENOM / NUM -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="methode-mesure methode-small">
                                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Vous</h2>
                                            <div class="row">

                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- PRENOM -->
                                                    <div class="input-group">
                                                        <select class="select-mesure input" name="salutation" style="width: 100%;" required>
                                                            <option value="Mr.">Mr.</option>
                                                            <option value="Mme.">Mme.</option>
                                                            <option value="Mlle.">Mlle.</option>
                                                            <option value="Dr.">Dr.</option>
                                                            <option value="Prof.">Prof.</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- PRENOM -->
                                                    <div class="input-group">
                                                        <label class="label" for="prenom">Prénom</label>
                                                        <input class="input" type="text" name="prenom" onfocus="activLabel(this)" onblur="activLabel(this)" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- NOM -->
                                                    <div class="input-group">
                                                        <label class="label" for="taille">Nom</label>
                                                        <input class="input" type="text" name="nom" onfocus="activLabel(this)" onblur="activLabel(this)" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- POIDS -->
                                                    <div class="input-group">
                                                        <label class="label" for="telephone">Numéro de Tél.</label>
                                                        <input class="input" type="number" name="telephone" onfocus="activLabel(this)" onblur="activLabel(this)" required>
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- POIDS -->
                                                    <div class="input-group">
                                                        <label class="label" for="telephone2">Numéro de Tél. (secours)</label>
                                                        <input class="input" type="number" name="telephone2" onfocus="activLabel(this)" onblur="activLabel(this)">
                                                    </div>
                                                </div>


                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- NOM -->
                                                    <div class="input-group">
                                                        <label class="label" for="email">Email</label>
                                                        <input class="input" type="email" name="email" id="email_nouveau_compte"  onfocus="activLabel(this)" onblur="activLabel(this)" required>
                                                        <div id="email_msg" style="margin-top: 15px;color: crimson;font-weight: bold;"></div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ADRESSE DE FACTURATION -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="methode-mesure methode-small">
                                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Adresse de facturation</h2>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- ADRESSE -->
                                                    <div class="input-group">
                                                        <label class="label" for="adresse">Adresse</label>
                                                        <input class="input" type="text" name="adresse_facturation" onfocus="activLabel(this)" onblur="activLabel(this)" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- ADRESSE SUITE -->
                                                    <div class="input-group">
                                                        <label class="label" for="societe">Societé</label>
                                                        <input class="input" type="text" name="societe_facturation" onfocus="activLabel(this)" onblur="activLabel(this)">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- RENSEIGNEMENT -->
                                                    <div class="input-group">
                                                        <label class="label" for="renseignement">Infos (code, étage...)</label>
                                                        <input class="input" type="text" name="renseignement_facturation" onfocus="activLabel(this)" onblur="activLabel(this)">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- CODE POSTAL -->
                                                    <div class="input-group">
                                                        <label class="label" for="code-postal">Code postal</label>
                                                        <input class="input" type="text" name="code-postal_facturation" onfocus="activLabel(this)" onblur="activLabel(this)" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- VILLE -->
                                                    <div class="input-group">
                                                        <label class="label" for="ville">Ville</label>
                                                        <input class="input" type="text" name="ville_facturation" onfocus="activLabel(this)" onblur="activLabel(this)" required>
                                                    </div>
                                                </div>
                                                <?php
                                                $sql = 'select code, nom from tg_pays';
                                                $query = $bdd->query($sql);
                                                ?>
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- PAYS -->
                                                    <div class="input-group">
                                                        <select class="select-mesure input" name="pays_facturation" style="width: 100%;" required>
                                                            <?php
                                                            while ($d = $query->fetch()) {
                                                                echo '<option value="' . $d["code"] . '">' . $d["nom"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ADRESSE DE LIVRAISON -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="methode-mesure methode-small">
                                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Adresse de livraison</h2>
                                            <p class="livraison-info">Les livraisons ont lieu du lundi au vendredi de 9h à 18h. Vous pouvez nous indiquer une adresse différente (bureau, amis...)</p>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- ADRESSE -->
                                                    <div class="input-group">
                                                        <label class="label" for="adresse">Adresse</label>
                                                        <input class="input" type="text" name="adresse_livraison" onfocus="activLabel(this)" onblur="activLabel(this)" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- SOCIETE -->
                                                    <div class="input-group">
                                                        <label class="label" for="societe">Societé</label>
                                                        <input class="input" type="text" name="societe_livraison" onfocus="activLabel(this)" onblur="activLabel(this)">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- RENSEIGNEMENT -->
                                                    <div class="input-group">
                                                        <label class="label" for="renseignement">Infos (code, étage...)</label>
                                                        <input class="input" type="text" name="renseignement_livraison" onfocus="activLabel(this)" onblur="activLabel(this)">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- CODE POSTAL -->
                                                    <div class="input-group">
                                                        <label class="label" for="code-postal">Code postal</label>
                                                        <input class="input" type="text" name="code-postal_livraison" onfocus="activLabel(this)" onblur="activLabel(this)" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- VILLE -->
                                                    <div class="input-group">
                                                        <label class="label" for="ville">Ville</label>
                                                        <input class="input" type="text" name="ville_livraison" onfocus="activLabel(this)" onblur="activLabel(this)" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <!-- PAYS -->
                                                    <div class="input-group">
                                                        <select class="select-mesure input" name="pays_livraison" style="width: 100%;" required>
                                                            <?php
                                                            $sql = 'select code, nom from tg_pays';
                                                            $query = $bdd->query($sql);
                                                            while ($data = $query->fetch()) {
                                                                echo '<option value="' . $data["code"] . '">' . $data["nom"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="submit-container" id="submit_area">
                                            <input class="btn-rose"  type="submit" value="Cr&eacute;er mon compte ...">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript">var t =<?php echo time(); ?></script>
        <script type="text/javascript" src="js/index.js?t=<?php echo time(); ?>"></script>

    </body>

</html>