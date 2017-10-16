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
		if(isset($_REQUEST['commande']))
		{
			//ajouter au panier
			$s = 'select * from tailorgeorge_modele where url="'.$_SESSION["chemise_en_cours"].'.html"';
			$q = $bdd->query($s);
			$product = $q->fetch();
			$ss = 'insert into tg_paniers_items(panier_id,product_id,product_price) values ("'.$id.'","'.$product["id_auto"].'","'.$product["prix"].'")';
			$bdd->exec($ss);
			//redirection vers la page deja client
			header('Location: panier-2-deja-client.html'); 
		}
		else
		{
			header('Location: espace-client.html');
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
                    <a href="nouveau-client.html" class="btn-rose">suivant</a>
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
                        <p><a href="motpasseoublie.html" class="mdp-oublie">Mot de passe oublié ?</a></p>
                    </form>
					<div id="message_login" style="margin:20px;font-size:14px;"></div>
                    <a class="btn-rose" id="login_btn" href="#" click="veriflogin()">suivant</a>
                </div>
            </div>
        </div>
    </div>

	<!-- JAVASCRIPT -->
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>	
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript">var t=<?php echo time(); ?></script>
	<script type="text/javascript" src="js/index.js"></script>
	
	<script>
		var t=<?php echo time(); ?>
		//espace-client.php
		$("#login_btn").on("click",function(e){ 
			console.log('111');
			var email = $("#email").val();
			var mdp = $("#mdp").val();
			$("#message_login").html('Verification en cours...');
			$.ajax({
				url: "js/ajax/login.php?t="+t,
				data: 'email='+email+'&mdp='+mdp,
				success: function( result ) {			
					$("#message_login").html(result);
					if(result==1) {$("#message_login").css('display','none'); $("#formLogin").submit();}
				}});
		});
		</script>

</body>

</html>