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
	
	$_SESSION['client_id'] = $client['id'];
	
	$ss = 'select * from tg_mesure where id_client="'.$client['id'].'"';
	$qq = $bdd->query($ss);
	$mesures = $qq->fetch();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Panier, Modifier les mesures - TailorGeorge.com</title>
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
                    <li><a class="header-panier-lien" href="panier-step-3.php">3. Coordonnées</a></li>
                    <li><a class="header-panier-lien" href="panier-step-4.php">4. Récapitulatif & Paiement</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <!--  MODIF MESURES  -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="methode-titre oswald-regular">Ajustez vos mesures</h2>
                <p class="choix-methode-mesure">Voici les mesures de votre dernière commande :</p>
            </div>
            <div class="col-xs-12">
                <div class="modif-mesure-container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-2">
                            <div class="modif-mesure-chemise chemise-face">
                                <div class="ajustement-container ajustement-col">
                                    <p class="ajustement-btn" id="cou_chem-add">+</p>
                                    <input type="text" class="ajustement-input" name="cou_chem" id="cou_chem" value="<?php if($mesures['cou_chem']==''||$mesures['cou_chem']=='NON-DEFINI') echo '74'; else echo $mesures['cou_chem']; ?>">
                                    <p class="ajustement-btn" id="cou_chem-sub">-</p>
                                </div>
                                <div class="ajustement-container ajustement-poitrine">
                                    <p class="ajustement-btn" id="poitrine_chem-add">+</p>
                                    <input type="text" class="ajustement-input" name="poitrine_chem" id="poitrine_chem" value="<?php if($mesures['poitrine_chem']==''||$mesures['poitrine_chem']=='NON-DEFINI') echo '74'; else echo $mesures['poitrine_chem']; ?>">
                                    <p class="ajustement-btn" id="poitrine_chem-sub">-</p>
                                </div>
                                <div class="ajustement-container ajustement-taille">
                                    <p class="ajustement-btn" id="ceinture_chem-add">+</p>
                                    <input type="text" class="ajustement-input" name="ceinture_chem" id="ceinture_chem" value="<?php if($mesures['ceinture_chem']==''||$mesures['ceinture_chem']=='NON-DEFINI') echo '74'; else echo $mesures['ceinture_chem']; ?>">
                                    <p class="ajustement-btn" id="ceinture_chem-sub">-</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="modif-mesure-chemise chemise-dos">
                                <div class="ajustement-container ajustement-epaule">
                                    <p class="ajustement-btn" id="epaule_chem-add">+</p>
                                    <input type="text" class="ajustement-input" name="epaule_chem" id="epaule_chem" value="<?php if($mesures['epaule_chem']==''||$mesures['epaule_chem']=='NON-DEFINI') echo '74'; else echo $mesures['epaule_chem']; ?>">
                                    <p class="ajustement-btn" id="epaule_chem-sub">-</p>
                                </div>
                                <div class="ajustement-container ajustement-bras">
                                    <p class="ajustement-btn" id="bras_chem-add">+</p>
                                    <input type="text" class="ajustement-input" name="bras_chem" id="bras_chem" value="<?php if($mesures['bras_chem']==''||$mesures['bras_chem']=='NON-DEFINI') echo '74'; else echo $mesures['bras_chem']; ?>">
                                    <p class="ajustement-btn" id="bras_chem-sub">-</p>
                                </div>
                                <div class="ajustement-container ajustement-dos">
                                    <p class="ajustement-btn" id="dos_chem-add">+</p>
                                    <input type="text" class="ajustement-input" name="dos_chem" id="dos_chem" value="<?php if($mesures['dos_chem']==''||$mesures['dos_chem']=='NON-DEFINI') echo '74'; else echo $mesures['dos_chem']; ?>">
                                    <p class="ajustement-btn" id="dos_chem-sub">-</p>
                                </div>
                            </div>
                        </div>
                    </div>					
                </div>
            </div>
            <div class="col-xs-12">
                <div class="fin-apercu-catalogue">
                    <a href="panier-3.html" class="btn-rose">Valider les ajustements</a>
                </div>
            </div>
        </div>
    </div>
    
     <!-- JAVASCRIPT -->
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript">var t=<?php echo time(); ?></script>
	<script type="text/javascript" src="js/index.js"></script>
</body>

</html>