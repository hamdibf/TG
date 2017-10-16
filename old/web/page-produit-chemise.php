<?php 
	session_start();
	require_once('./config/config.php');
	require_once('./config/session.php');
	TgSession::add($bdd);
	$_SESSION["chemise_en_cours"] = $_REQUEST['alias'];
	$alias = $_REQUEST['alias'];
	$sql = 'select * from tailorgeorge_modele where url="'.$alias.'.html"';
	$query = $bdd->query($sql);
	$d = $query->fetch();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $d['title']; ?></title>
    <base href="../">
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
	
</head>

<body>

    <!-- INFO-LIVRAISON -->
    <?php include("includes/info-livraison.php"); ?>
    
    <!-- NAVIGATION -->
    <?php include("includes/navigation.php"); ?>

    <!-- HEADER PAGE PRODUIT -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="header-page-produit">
					<?php $link = "catalogue-chemise.html"; if($_SESSION['alias']!='') { $link = $_SESSION['alias']; } ?>
                    <a class="lien-retour-catalogue" href="<?php echo $link; ?>"> &lt; Retour au catalogue</a>
                </div>
            </div>
        </div>
    </div>
    
    <!--  ARTICLE + DESCRIPTION  -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <!-- PHOTO DE L'ARTICLE -->
                <div class="article-container">
                    <img src="<?php echo '../../'.$d['jpg_face']; ?>" alt="">
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <!-- DESCRIPTION DE L'ARTICLE -->
                <div class="description-container">
                    <h1 class="description-titre"><?php echo $d['h1']; ?></h1>
                    <p class="description-content"><?php echo $d['description']; ?></p>
                    <!-- OPTION DE L'ARTICLE -->
                    <ul class="options-chemise">
						<?php
							$s_col = 'select * from tailorgeorge_cols where code="'.$d['col'].'"';
							$q_col = $bdd->query($s_col);
							$col = $q_col->fetch();
							$s_poignet = 'select * from tailorgeorge_poignets where code="'.$d['poignets'].'"';
							$q_poignet = $bdd->query($s_poignet);
							$poignet = $q_poignet->fetch();
							$bas = 'Arrondi';
							if($d['bas_chemise']=="F") { $bas="Droit avec fentes"; } 
							if($d['bas_chemise']=="D") { $bas="Droit"; } 
							$gorge = 'Simple';
							if($d['gorge']=="A") { $gorge="Américaine"; } 
							if($d['gorge']=="C") { $gorge="Cachée"; } 	
						?>
                        <li class="option-description oswald-regular"><?php echo 'Col '.$col['col']; ?></li>
                        <li class="option-description oswald-regular"><?php echo 'Gorge  '.$gorge; ?></li>
                        <li class="option-description oswald-regular"><?php echo 'Bas '.$bas; ?></li>
                        <li class="option-description oswald-regular"><?php echo 'Poignet '.$poignet['poignet']; ?></li>
                    </ul>
                    <a href="" class="ajouter-monogramme">+ Ajouter un monogramme (option offerte !)</a>
                    <p class="description-prix oswald-bold"><?php echo $d['prix']; ?>€<span class="description-prix-info-livraison dinpro-regular">Chez vous le <?php echo date('d M Y', strtotime(date("Y-m-d"). ' + 9 days')); ?></span></p>
                    <a href="commande.html" class="btn-rose">Commandez à mes mesures</a>
                    <a href="configurateur" class="modifier-chemise">Ou modifiez le style de cette chemise dans le configurateur</a>
                </div>
            </div>
        </div>
    </div>
    
    <!--  AUTRES MODELES  -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="autres-modeles-titre">Autres chemises bleues qui vous plairont...</h2>
            </div>
			<?php
			$sql = 'select * from tailorgeorge_modele where home="1" order by id_auto desc limit 0,3';
			$query = $bdd->query($sql);
			
			echo '<div class="row">';
			while($d = $query->fetch())
			{		
				echo '<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-md-4">
							<a href="chemises/'.$d['url'].'">
								<div class="chemise-catalogue">
									<div class="chemise-catalogue-photo">
										<img src="../../'.$d['jpg_face'].'" alt="'.$d['jpg_face_alt'].'" >
									</div>
									<div class="catalogue-details">
										<p class="modele-catalogue">'.$d['h1'].'</p>
										<p class="prix-catalogue oswald-bold">'.$d['prix'].'€</p>
									</div>
								</div>
							</a>
						</div>';
				
			}
			?>            
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript">var t=<?php echo time(); ?></script>

</body>

</html>