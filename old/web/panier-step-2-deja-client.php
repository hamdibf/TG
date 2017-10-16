<?php 
	session_start();
	require_once('./config/config.php');
	require_once('./config/session.php');
	TgSession::add($bdd);
	
	$id = session_id();
	$s = 'select * from tg_sessions where session_id="'.$id.'"';
	$q = $bdd->query($s);
	$ds = $q->fetch();
	
	$ss = 'select * from tg_client where id="'.$ds['client_id'].'"';
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
    <title>Panier Step 2, D&eacute;j&agrave; Client - TailorGeorge.fr</title>
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
    
    <!--  MESURES  -->
    <?php include("includes/deja-client-choix-mesure.php"); ?>
    
    <!-- JAVASCRIPT -->
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript">var t=<?php echo time(); ?></script>
	<script type="text/javascript" src="js/index.js"></script>
</body>

</html>