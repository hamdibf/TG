<?php 
	session_start();
	require_once('./config/config.php');
	require_once('./config/session.php');
	TgSession::add($bdd);
	
	$id = session_id();
	$s = 'select * from tg_sessions where session_id="'.$id.'"';
	$q = $bdd->query($s);
	$ds = $q->fetch();
	
	if($ds['client_id']!=0) 
	{
		header('Location: panier-2-deja-client.html'); 
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
                    <li><a class="header-panier-lien" href="panier-1.html">1. Panier</a></li>
                    <li><a class="header-panier-lien lien-actif" href="panier-2.html">2. Mesures</a></li>
                    <li><a class="header-panier-lien" href="panier-3.html">3. Coordonnées</a></li>
                    <li><a class="header-panier-lien" href="panier-4.html">4. Récapitulatif & Paiement</a></li>
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
                    <a href="nouveau-client.html" class="btn-rose">suivant</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-sm-pull-6">
                <div class="connexion-container deja-client">
                    <h2 class="h2-connexion oswald-regular">Déjà client ?</h2>
                    <p class="p-connexion">Utilisez les mesures de vos précédentes commandes ou modifiez celles-ci</p>
                    <form action="">
                        <div class="input-group">
                            <label class="label label-icone" for="email">Adresse mail</label>
                            <input class="input input-email" type="email" name="email" onfocus="activLabel(this)" onblur="activLabel(this)">
                        </div>
                        <div class="input-group">
                            <label class="label label-icone" for="mdp">Mot de passe</label>
                            <input class="input input-password" type="password" name="mdp" onfocus="activLabel(this)" onblur="activLabel(this)">
                        </div>    
                        <p class="mdp-oublie">Mot de passe oublié ?</p>
                    </form>
                    <a href="panier-step-2-deja-client.html" class="btn-rose">suivant</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>