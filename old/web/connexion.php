<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);

$id = session_id();
$s = 'select * from tg_sessions where session_id="' . $id . '"';
$q = $bdd->query($s);
$ds = $q->fetch();
if ($ds['client_id'] != 0) {
    if (isset($_REQUEST['commande'])) {
        if (isset($_SESSION["chemise_en_cours"]) && !isset($_REQUEST["modele_id"])) {
//ajouter au panier
            $s = 'select * from tailorgeorge_modele where url="' . $_SESSION["chemise_en_cours"] . '.html"';
            $q = $bdd->query($s);
            $product = $q->fetch();
            $ss = 'insert into tg_paniers_items(panier_id,product_id,product_price) values ("' . $id . '","' . $product["id_auto"] . '","' . $product["prix"] . '")';
            $bdd->exec($ss);

            $sqlCommandes = 'select * from commande_payee where id_client="' . $ds['client_id'] . '" order by id desc limit 1';
            $sqlMesures = 'select * from tg_mesure where id_client="' . $ds['client_id'] . '"';
            $queryCMD = $bdd->query($sqlCommandes);
            $queryMesures = $bdd->query($sqlMesures);
            $resultCMD = $queryCMD->fetch();
            $resultMesures = $queryMesures->fetch();
            if (empty($resultCMD) && !empty($resultMesures)) {
                header('Location: panier.html');
            } else {
                //redirection vers la page deja client
                header('Location: panier.html');
            }
        } elseif (isset($_REQUEST["modele_id"]) && !isset($_SESSION["chemise_en_cours"])) {
            $s = 'select * from tailorgeorge_modele where id_auto="' . $_REQUEST["modele_id"] . '"';
            $q = $bdd->query($s);
            $product = $q->fetch();
            $ss = 'insert into tg_paniers_items(panier_id,product_id,product_price) values ("' . $id . '","' . $product["id_auto"] . '","' . $product["prix"] . '")';
            $bdd->exec($ss);

            $sqlCommandes = 'select * from commande_payee where id_client="' . $ds['client_id'] . '" order by id desc limit 1';
            $sqlMesures = 'select * from tg_mesure where id_client="' . $ds['client_id'] . '"';
            $queryCMD = $bdd->query($sqlCommandes);
            $queryMesures = $bdd->query($sqlMesures);
            $resultCMD = $queryCMD->fetch();
            $resultMesures = $queryMesures->fetch();
            if (empty($resultCMD) && !empty($resultMesures)) {
                header('Location: panier.html');
            } else {
                //redirection vers la page deja client
                header('Location: panier.html');
            }
        }
    } else {
        header('Location: espace-client.html');
    }
} else {
    if (isset($_REQUEST['commande']) && $_REQUEST['commande'] == "oui") {
        if (isset($_SESSION["chemise_en_cours"])) {
            $s = 'select * from tailorgeorge_modele where url="' . $_SESSION["chemise_en_cours"] . '.html"';
            $q = $bdd->query($s);
            $product = $q->fetch();
            $ss = 'insert into tg_paniers_items(panier_id,product_id,product_price) values ("' . $id . '","' . $product["id_auto"] . '","' . $product["prix"] . '")';
            $bdd->exec($ss);
            header('Location: panier.html');
        } elseif (!isset($_SESSION["chemise_en_cours"]) && isset($_REQUEST["modele_id"])) {
            $s = 'select * from tailorgeorge_modele where id_auto="' . $_REQUEST["modele_id"] . '"';
            $q = $bdd->query($s);
            $product = $q->fetch();
            $ss = 'insert into tg_paniers_items(panier_id,product_id,product_price) values ("' . $id . '","' . $product["id_auto"] . '","' . $product["prix"] . '")';
            $bdd->exec($ss);
            header('Location: panier.html');
        }
    }
}
unset($_SESSION['chemise_en_cours']);
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Se connecter – TailorGeorge.fr</title>
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
                        <p class="fil-arianne oswald-regular"><a href="home">accueil</a> / </p>
                        <h1 class="fil-arianne-activ oswald-regular">Espace client tailor george</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- CONNEXION DEJA CLIENT / NOUVEAU CONTAINER -->
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-push-6">
                    <div class="connexion-container">
                        <h2 class="h2-connexion oswald-regular">Nouveau sur tailorgeorge ?</h2>
                        <p class="p-connexion">Créez facilement votre profil mesure en quelques clics<span class="dinpro-medium">100% SATISFAIT</span></p>
                        <a href="inscription-mesures.html" class="btn-rose">suivant</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-sm-pull-6">
                    <div class="connexion-container deja-client">
                        <h2 class="h2-connexion oswald-regular">Déjà client ?</h2>
                        <p class="p-connexion">Utilisez les mesures de vos précédentes commandes ou modifiez celles-ci</p>
                        <form action="espace-client.html" id="formLogin" method="POST">
                            <div class="input-group">
                                <label class="label label-icone" for="email">Adresse mail</label>
                                <input class="input input-email" type="email" id="email" name="email" onfocus="activLabel(this)" onblur="activLabel(this)">
                            </div>
                            <div class="input-group">
                                <label class="label label-icone" for="mdp">Mot de passe</label>
                                <input class="input input-password" type="password" id="mdp" name="mdp" onfocus="activLabel(this)" onblur="activLabel(this)">
                            </div>
                            <p><a class="mdp-oublie" onclick="initializeModal();">Mot de passe oublié ?</a></p>
                            <?php
                            if (isset($_REQUEST['commande'])) {
                                echo '<input type="hidden" name="commande" value="' . $_REQUEST['commande'] . '">';
                            }
                            ?>
                        </form>
                        <div id = "message_login" style = "margin:20px;font-size:14px;"></div>
                        <a class="btn-rose" id="login_btn" href="#" click="veriflogin()">suivant</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal_doubure" tabindex="-1" role="dialog" aria-labelledby="modal_doubure_label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title oswald-bold" id="modal_doubure_label" style="font-size: 15px;">Mot de passe oublié?</h4>
                    </div>
                    <div class="modal-body oswald-regular" id="body_modal" style="height:150px;overflow: auto; font-size: 15px;">
                        Indiquez-nous votre adresse email, nous vous renverrons aussitôt votre nouveau mot de passe
                        <div class="input-group" style="margin-top: 25px; width: 70%; margin-right: auto; margin-left: auto;">
                            <input class="input input-email" type="email" id="email2" name="email2" style="font-size: 1em;" onblur="verifMail(this)">
                        </div>
                    </div>
                    <div class="oswald-regular" id = "message_pwd" style = "margin:20px;font-size:14px; text-align: center; color: red;"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-rose" style="padding: 6px 12px; text-transform: none; font-size: 1.4em; border-color: #fff;" id="change_pwd">Valider</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
        <!--JAVASCRIPT -->
        <script type = "text/javascript" src = "js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript">var t =<?php echo time(); ?></script>
        <script type="text/javascript" src="js/index.js"></script>

        <script>
                                function verifMail(champ)
                                {
                                    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
                                    if (!regex.test(champ.value))
                                    {
                                        surligne(champ, true);
                                        return false;
                                    } else
                                    {
                                        surligne(champ, false);
                                        return true;
                                    }
                                }
                                function surligne(champ, erreur)
                                {
                                    if (erreur)
                                        champ.style.backgroundColor = "#fba";
                                    else
                                        champ.style.backgroundColor = "";
                                }
                                function initializeModal() {
                                    $("#body_modal").html('Indiquez-nous votre adresse email, nous vous renverrons aussitôt votre nouveau mot de passe <div class="input-group" style="margin-top: 25px; width: 70%; margin-right: auto; margin-left: auto;"><input class="input input-email" type="email" id="email2" name="email2" style="font-size: 1em;" onblur="verifMail(this)"></div>');
                                    $("#message_pwd").html('');
                                    $("#change_pwd").css('display', '');
                                    $('#modal_doubure').modal('show');
                                }
                                $(document).ready(function() {

                                    $("#login_btn").on("click", function(e) {
                                        var email = $("#email").val();
                                        var mdp = $("#mdp").val();
                                        $("#message_login").html('Verification en cours...');
                                        $.ajax({
                                            url: "js/ajax/login.php?t=" + t,
                                            data: 'email=' + email + '&mdp=' + mdp,
                                            success: function(result) {
                                                $("#message_login").html(result);
                                                if (result == 1) {
                                                    $("#message_login").css('display', 'none');
                                                    $("#formLogin").submit();
                                                }
                                            }});
                                    });
                                    $("#change_pwd").on("click", function(e) {
                                        var email = $("#email2").val();
                                        if (verifMail(document.getElementById('email2'))) {
                                            $.ajax({
                                                url: "js/ajax/mot_de_passe_oublie.php?t=" + t,
                                                data: 'email=' + email,
                                                success: function(result) {
                                                    if (result == 1) {
                                                        $("#change_pwd").css('display', 'none');
                                                        $("#message_pwd").css('color', 'black');
                                                        $("#message_pwd").html('Un courriel contenant votre nouveau mot de passe a été envoyé !');
                                                        setTimeout(function() {
                                                            $('#modal_doubure').modal('hide');
                                                            $('.modal-backdrop').remove();
                                                        }, 5000);
                                                        //$("#body_modal").html('Indiquez-nous votre adresse email, nous vous renverrons aussitôt votre nouveau mot de passe <div class="input-group" style="margin-top: 25px; width: 70%; margin-right: auto; margin-left: auto;"><input class="input input-email" type="email" id="email2" name="email2" style="font-size: 1em;" onblur="verifMail(this)"></div>');
                                                        //setTimeout(function() {}, 5000);
                                                        //$('#modal_doubure').modal('hide');
                                                        //$('body').removeClass('modal-open');
                                                        //$('.modal-backdrop').remove();
                                                    } else {
                                                        $("#message_pwd").html(result);
                                                        $("#message_pwd").css('display', '');
                                                    }
                                                }
                                            });
                                        }
                                    });

                                    $(document).bind('keypress', function(e) {
                                        if (e.keyCode == 13) {
                                            $('#login_btn').trigger('click');
                                        }
                                    });
                                });
        </script>

    </body>

</html>