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
	
	$ss = 'select * from tg_mesure where id_client="'.$client['id'].'"';
	$qq = $bdd->query($ss);
	$mesures = $qq->fetch();
	
	$ss = 'select sum(product_price) as total from tg_paniers_items where panier_id="'.$id.'"';
	$qq = $bdd->query($ss);
	$panier = $qq->fetch();
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
                    <li><a class="header-panier-lien" href="panier-step-2.php">2. Mesures</a></li>
                    <li><a class="header-panier-lien" href="panier-step-3.php">3. Coordonnées</a></li>
                    <li><a class="header-panier-lien lien-actif" href="panier-step-4.php">4. Récapitulatif & Paiement</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <!--  RECAP  -->
    <div class="container">
        <div class="row">
            <!-- COORDONNEES  -->
            <div class="col-xs-12 col-sm-6">
                <div class="methode-mesure methode-medium">
                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Vos coordonnées</h2>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6" style="text-align: left;">
                            <p class="titre-coordonnee-recap oswald-regular">De facturation</p>
                            <ul class="ul-recap">
                                <li><?php echo $client["salutation"].' '.$client["prenom"].' '.$client["nom"]; ?></li>                                
                                <li><?php echo 'Tel.:'.$client["telephone"]; ?></li>
                                <li><?php echo $client["adresse"].' '.$client["renseignement"]; ?></li>
                                <li><?php echo $client["ville"]; ?></li>
                                <li>
									<?php 
												$s = 'select * from tg_pays where code="'.$client["pays"].'"';
												$q = $bdd->query($s);
												$pays=$q->fetch();
												echo $pays['nom'];
									?>
								</li>
                            </ul>  
                        </div>
                        <div class="col-xs-12 col-sm-6" style="text-align: left;">
                            <p class="titre-coordonnee-recap oswald-regular">De livraison</p>
                            <ul class="ul-recap">
                                <li><?php echo $client["salutation"].' '.$client["prenom"].' '.$client["nom"]; ?></li>                                
                                <li><?php echo 'Tel.:'.$client["telephone"]; ?></li>
                                <li><?php echo $client["adresse_livraison"].' '.$client["renseignement_livraison"]; ?></li>
                                <li><?php echo $client["ville_livraison"]; ?></li>
                                <li>
									<?php 
												$s = 'select * from tg_pays where code="'.$client["pays_livraison"].'"';
												$q = $bdd->query($s);
												$pays=$q->fetch();
												echo $pays['nom'];
									?>
								</li>
                            </ul>  
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="methode-mesure methode-medium">
					<?php 
						$mesure_type = '';
						if($mesures['type']=='mesure-rapide') {$mesure_type = 'Rapide';}
						if($mesures['type']=='mesure-chemise') {$mesure_type = 'Chemise';}
						if($mesures['type']=='mesurez-vous') {$mesure_type = 'vos mesures';}
					?>
                    <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Vos mesures (<?php echo $mesure_type; ?>)</h2>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6" style="text-align: left;">
                            <ul class="ul-recap">
                                <li><span class="oswald-regular">Poids :</span> <?php echo $mesures["poids"]; ?> kg</li>
                                <li><span class="oswald-regular">Taille :</span> <?php echo $mesures["taille"]; ?> cm</li>
                                <li><span class="oswald-regular">Age :</span> <?php echo $mesures["age"]; ?> ans</li>
                                <?php 
									if($mesures['type']=='mesurez-vous')
									{
										
									}
									if($mesures['type']=='mesure-chemise')
									{
										
									}
								?>
                            </ul>  
                        </div>
                        <div class="col-xs-12 col-sm-6" style="text-align: left;">
                            <ul class="ul-recap">
								<?php 
									if($mesures['type']=='mesure-rapide')
									{
										echo '<li><span class="oswald-regular">Taille de chemise :</span> '.$mesures["mesure_rapide_taille"].' cm</li>';
										echo '<li><span class="oswald-regular">Encolure :</span> '.$mesures["mesure_rapide_col"].' cm</li>';
										echo '<li><span class="oswald-regular">Longueur des manches :</span> '.$mesures["mesure_rapide_bras"].' cm</li>';
										echo '<li><span class="oswald-regular">Coupe de chemise :</span> '.$mesures["coupe_vous"].'</li>';
									}
									if($mesures['type']=='mesurez-vous')
									{
										echo '<li><span class="oswald-regular">Cou :</span> '.$mesures["cou"].' cm</li>';
										echo '<li><span class="oswald-regular">Poitrine :</span> '.$mesures["poitrine"].' cm</li>';
										echo '<li><span class="oswald-regular">Ceinture :</span> '.$mesures["ceinture"].' cm</li>';
										echo '<li><span class="oswald-regular">Carrure :</span> '.$mesures["carrure"].' cm</li>';
										echo '<li><span class="oswald-regular">Bras Gauche :</span> '.$mesures["brasgauche"].' cm</li>';
										echo '<li><span class="oswald-regular">Bras Droite :</span> '.$mesures["brasdroit"].' cm</li>';
										echo '<li><span class="oswald-regular">Dos :</span> '.$mesures["dos"].' cm</li>';
										echo '<li><span class="oswald-regular">Poignet :</span> '.$mesures["poignet"].' cm</li>';
										echo '<li><span class="oswald-regular">Coupe :</span> '.$mesures["aisance1"].'</li>';
										echo '<li><span class="oswald-regular">Aisance :</span> '.$mesures["aisance2"].'</li>';
									}
									if($mesures['type']=='mesure-chemise')
									{
										echo '<li><span class="oswald-regular">Encolure :</span> '.$mesures["cou_chem"].' cm</li>';
										echo '<li><span class="oswald-regular">Poitrine :</span> '.$mesures["poitrine_chem"].' cm</li>';
										echo '<li><span class="oswald-regular">Ceinture :</span> '.$mesures["ceinture_chem"].' cm</li>';
										echo '<li><span class="oswald-regular">Epaule :</span> '.$mesures["epaule_chem"].' cm</li>';
										echo '<li><span class="oswald-regular">Bras :</span> '.$mesures["bras_chem"].' cm</li>';
										echo '<li><span class="oswald-regular">Dos :</span> '.$mesures["dos_chem"].' cm</li>';
									}
								?>                                
                            </ul>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                
            </div>
            <div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-3 col-md-offset-9">
                <div class="prix-panier-container">
                    <ul class="prix-panier">
                        <li>Total de vos achat <span class="li-span-tarif"><?php echo number_format($panier["total"]-8,2); ?>€</span></li>
                        <li>Frais de livraison <span class="li-span-tarif">8.00€</span></li>
                        <li>Montal total ttc <span class="li-span-tarif"><?php echo number_format($panier["total"],2); ?>€</span></li>
                    </ul>
                    <a href="paiement.html" class="btn-rose btn-block">Passer au paiement</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- JAVASCRIPT -->
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>	
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript">var t=<?php echo time(); ?></script>
	<script type="text/javascript" src="js/index.js"></script>

</body>

</html>