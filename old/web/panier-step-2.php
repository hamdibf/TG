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
    $sqlCommandes = 'select * from commande_payee where id_client="' . $ds['client_id'] . '" order by id desc limit 1';
    $queryCMD = $bdd->query($sqlCommandes);
    $resultCMD = $queryCMD->fetch();
    $sqlMesures = 'select * from tg_mesure where id_client="' . $ds['client_id'] . '"';
    $queryMesures = $bdd->query($sqlMesures);
    $resultMesures = $queryMesures->fetch();
    $memesMesures = false;
    if (empty($resultCMD) && !empty($resultMesures)) {
        header('Location: recapitulatif.html');
    } elseif (!empty($resultCMD) && !empty($resultMesures)) {
        if (!$resultMesures["mesure_modif"]) {
            header('Location: choix-mesures.html');
        } else {
            header('Location: verification-adresse.html');
        }
    } else {
        header('Location: choix-mesures.html');
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
                        <li><a class="header-panier-lien" href="panier.html">1. Panier</a></li>
                        <li><a class="header-panier-lien lien-actif" href="panier-2.html">2. Mesures</a></li>
                        <li><a class="header-panier-lien" href="#">3. Coordonnées</a></li>
                        <li><a class="header-panier-lien" href="#">4. Récapitulatif & Paiement</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--  IDENTIFICATION  -->
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
                        <form action="choix-mesures.html" id="formLogin" method="POST">
                            <div class="input-group">
                                <label class="label label-icone" for="email">Adresse mail</label>
                                <input class="input input-email" type="email"  id="email"  name="email" onfocus="activLabel(this)" onblur="activLabel(this)">
                            </div>
                            <div class="input-group">
                                <label class="label label-icone"  for="mdp">Mot de passe</label>
                                <input class="input input-password" id="mdp" type="password" name="mdp" onfocus="activLabel(this)" onblur="activLabel(this)">
                            </div>
                            <p class="mdp-oublie"><a class="mdp-oublie" data-toggle="modal" data-target="#modal_doubure">Mot de passe oublié ?</a></p>
                        </form>
                        <div id = "message_login" style = "margin:20px;font-size:14px;"></div>
                        <!--<a href="panier-2-deja-client.html" class="btn-rose">suivant</a>-->
                        <a class = "btn-rose" id = "login_btn" href = "#">suivant</a>
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
                    <div class="modal-body oswald-regular" id="body_modal_doublure_tissu" style="height:150px;overflow: auto; font-size: 15px;">
                        Indiquez-nous votre adresse email, nous vous renverrons aussitôt votre nouveau mot de passe
                        <div class="input-group" style="margin-top: 25px; width: 70%; margin-right: auto; margin-left: auto;">
                            <input class="input input-email" type="email" id="email2" name="email2" style="font-size: 1em;" onblur="verifMail(this)">
                        </div>
                        <div id = "message_pwd" style = "margin:20px;font-size:14px; text-align: center; color: red;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-rose" style="padding: 6px 12px; text-transform: none; font-size: 1.4em; border-color: #fff;" id="change_pwd">Valider</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="close">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <?php include("includes/footer.php"); ?>
        <!-- JAVASCRIPT -->
        <script type = "text/javascript" src = "js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript">var t =<?php echo time(); ?></script>
        <script type="text/javascript" src="js/main.js"></script>
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

                                    $(document).ready(function() {
                                    //espace-client.php
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