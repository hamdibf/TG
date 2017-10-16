<?php 
	session_start();
	require_once('./config/config.php');
	require_once('./config/session.php');
	TgSession::add($bdd);
	
	
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Panier Step 1 - TailorGeorge.fr</title>
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
                    <li><a class="header-panier-lien lien-actif" href="panier-1.html">1. Panier</a></li>
                    <li><a class="header-panier-lien" href="panier-2.html">2. Mesures</a></li>
                    <li><a class="header-panier-lien" href="panier-3.html">3. Coordonnées</a></li>
                    <li><a class="header-panier-lien" href="panier-4.html">4. Récapitulatif & Paiement</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!--  PANIER  -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
               <div class="panier-container">
                    <?php 
						$id = session_id();
						$total = 0;
						$sql = 'select * from tg_paniers_items where panier_id="'.$id.'"';
						$query = $bdd->query($sql);
						while($data = $query->fetch()) 
						{
							$ss = 'select * from tailorgeorge_modele where id_auto="'.$data['product_id'].'"';
							$qq = $bdd->query($ss);
							$dd = $qq->fetch();
							$total += $dd["prix"];
					?>
					<div class="article-panier">
                        <div class="photo-article-panier">
                            <img src="../../<?php echo $dd["jpg_face"]; ?>" alt="">
                        </div>
                        <div class="description-article-panier">
                            <div class="description-top">
                                <p class="nom-article-panier"><?php echo $dd["h1"]; ?></p>
                                <p class="prix-article-panier oswald-bold"><?php echo $dd["prix"]; ?>€</p>
                            </div>
                            <div class="description-bottom">
                                <p class="option-article">Voir le détail</p>
                                <p class="option-article option-supprimer" onclick="deletePanierItem('<?php echo $data["product_id"]; ?>')" style="cursor:pointer;">Supprimer</p>
                            </div>
                        </div>
                    </div>
					<?php } ?>					
               </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-6 col-md-3 col-md-offset-7">
                <div class="prix-panier-container">
                    <ul class="prix-panier">
                        <li>Total de vos achat <span class="li-span-tarif"><?php echo $total; ?>€</span></li>
                        <li>Frais de livraison <span class="li-span-tarif">8€</span></li>
                        <li>Montal total ttc <span class="li-span-tarif"><?php echo ($total+8); ?>€</span></li>
                    </ul>
                    <a href="panier-2.html" class="btn-rose btn-block">Valider mon panier</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript">var t=<?php echo time(); ?></script>

</body>

</html>