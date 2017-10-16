<?php 
	session_start();
	require_once('./config/config.php');
	require_once('./config/session.php');
	TgSession::add($bdd);
	$id = session_id();
	
	if($_SESSION['notification']== "1")
	{
		$_SESSION['notification'] = "0";
	}
	else
	{
		$_SESSION['message_button'] = "Retour &agrave; la page d'accueil";
		$_SESSION['link_button'] = 'home';
		
		$_SESSION['message_title'] = 'CENTRE DES NOTIFICATIONS';
		$_SESSION['message_desc'] = 'Vous n\'avez pas de notifications pour le moment !';
		
		$_SESSION['notification'] = "0";
	}
	
	if(isset($_REQUEST["action"]))
	{
		if($_REQUEST["action"]=="paiement")
		{
			if($_SESSION['paiement']=='success')
			{
				$_SESSION['message_title'] = 'CONFIMRATION COMMANDE';
				$_SESSION['message_desc'] = 'Votre commande a &eacute;t&eacute; confirm&eacute;. Votre facture a &eacute;t&eacute; envoy&eacute; &agrave; votre boite email';
				
				//vider le panier
				$s = 'delete from tg_paniers_items where panier_id="'.$id.'"';
				$bdd->exec($s);
				
				//update commande
				$update = 'update tg_commande_chemise set paye="oui" where code_commande="'.$_SESSION['code_commande'].'"';
				$bdd->exec($update);
				
				//send an email with all details to the customer			
				$to = $_SESSION['client_email'];
				$subject = "TailorGeorge.com - Code Commande ".$_SESSION['code_commande'];
				$message = '
				<html>
				<head>
				<title>TailorGeorge.com - Code Commande '.$_SESSION['code_commande'].'</title>
				</head>
				<body>
				<p><img src="http://achrafothman.net/tg/old/web/img/logo-png.PNG" /></p>
				<p>TailorGeorge.com - Code Commande '.$_SESSION['code_commande'].'</p>
				<p>Bonjour ,</p>
				<br/>
				<table>
				<tr>
				<th></th>
				<th></th>
				</tr>
				<tr>
				<td></td>
				<td></td>
				</tr>
				</table>
				</body>
				</html>
				';
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: TailorGeorge.com <tg@achrafothman.net>' . "\r\n";
				mail($to,$subject,$message,$headers);
				//redirection
				$_SESSION['notification'] = "1";
				header('Location:notification.html');				
			}
			else
			{
				$_SESSION['message_title'] = 'ERREUR PAIEMENT';
				$_SESSION['message_desc'] = 'Un erreur est survenu lors du paiement. veuillez re-essayer.';
				$_SESSION['message_button'] = 'Retour au panier';
				$_SESSION['link_button'] = 'panier-4.html';
				//redirection
				$_SESSION['notification'] = "1";
				header('Location:notification.html');
			}
		}
		
		if($_REQUEST["action"]=="nouveau-compte")
		{
			//Le mot de passe est genere automatiquement, un email sera envoye au client avec tous ce details
			$pass_salt = 'tg'.time();
			$s = 'INSERT INTO `tg_client` (
						`id`, 
						`courriel`, 
						`nom`, 
						`prenom`, 
						`password`, 
						`telephone`, 
						`adresse`, 
						`adresse2`, 
						`renseignement`, 
						`postal`, 
						`ville`, 
						`pays`, 
						`nom_livraison`, 
						`prenom_livraison`, 
						`societe_livraison`, 
						`adresse_livraison`, 
						`adresse2_livraison`, 
						`renseignement_livraison`, 
						`postal_livraison`, 
						`ville_livraison`, 
						`pays_livraison`, 
						`reduction`, 
						`commentaire`, 
						`newsletter`, 
						`salt`,
						`salutation`
					) VALUES (
						NULL, 
						"'.$_REQUEST["email"].'", 
						"'.$_REQUEST["nom"].'", 
						"'.$_REQUEST["prenom"].'", 
						"'.$pass_salt.'", 
						"'.$_REQUEST["telephone"].'", 
						"'.$_REQUEST["adresse_facturation"].'", 
						"", 
						"'.$_REQUEST["renseignement_facturation"].'", 
						"'.$_REQUEST["code-postal_facturation"].'", 
						"'.$_REQUEST["ville_facturation"].'", 
						"'.$_REQUEST["pays_facturation"].'", 
						"'.$_REQUEST["nom"].'", 
						"'.$_REQUEST["prenom"].'", 
						"'.$_REQUEST["societe_livraison"].'", 
						"'.$_REQUEST["adresse_livraison"].'", 
						"", 
						"'.$_REQUEST["renseignement_livraison"].'", 
						"'.$_REQUEST["code-postal_livraison"].'", 
						"'.$_REQUEST["ville_livraison"].'", 
						"'.$_REQUEST["pays_livraison"].'", 
						"0", 
						"", 
						"0", 
						"'.$pass_salt.'",
						"'.$_REQUEST["salutation"].'"
					);';
			$bdd->exec($s);			
			//get id new client
			$ss = 'select * from tg_client where salt="'.$pass_salt.'"';
			$qq = $bdd->query($ss);
			$client = $qq->fetch();
			//inserer les mesures
			$sss = 'INSERT INTO `tg_mesure` (
						`id`, 
						`mail_client`, 
						`id_client`, 
						`type`, 
						`cou`, 
						`poitrine`, 
						`carrure`, 
						`dos`, 
						`brasdroit`, 
						`brasgauche`, 
						`poignet`, 
						`symetriepoignet`, 
						`ceinture`, 
						`bassin`, 
						`cou_chem`, 
						`poitrine_chem`, 
						`carrure_chem`, 
						`dos_chem`, 
						`bras_chem`, 
						`poignet_chem`, 
						`ceinture_chem`, 
						`epaule_chem`, 
						`taillestandard`, 
						`encolure`, 
						`manchestandard`, 
						`poids`, 
						`taille`, 
						`age`, 
						`aisance1`, 
						`aisance2`, 
						`aisance3`, 
						`commentaire`, 
						`unite`,
						`coupe_vous`,
						`mesure_rapide_taille`,
						`mesure_rapide_col`,
						`mesure_rapide_bras`
					) VALUES (
						NULL, 
						"'.$_REQUEST["email"].'",
						"'.$client["id"].'", 
						"'.$_SESSION["type_mesure"].'",
						"'.$_SESSION['cou_vous'].'",
						"'.$_SESSION['poitrine_vous'].'",
						"'.$_SESSION['carrure_vous'].'",
						"'.$_SESSION['dos_vous'].'",
						"'.$_SESSION['bras-droit_vous'].'",
						"'.$_SESSION['bras-gauche_vous'].'", 
						"'.$_SESSION['poignet_vous'].'",
						"'.'NON-DEFINI'.'", 
						"'.$_SESSION['ceinture_vous'].'",
						"'.'NON-DEFINI'.'", 
						"'.$_SESSION['col_chemise'].'", 
						"'.$_SESSION['demi-poitrine_chemise'].'",
						"'.$_SESSION['carrure_chemise'].'",
						"'.$_SESSION['dos_chemise'].'",
						"'.'NON-DEFINI'.'", 
						"'.$_SESSION['poignet_chemise'].'",
						"'.'NON-DEFINI'.'", 
						"'.$_SESSION['epaule_chemise'].'", 
						"'.$_SESSION['demi-taille_chemise'].'",
						"'.'NON-DEFINI'.'", 
						"'.$_SESSION['manche_chemise'].'",
						"'.$_SESSION["poids"].'",
						"'.$_SESSION["taille"].'",
						"'.$_SESSION["age"].'",
						"'.$_SESSION["aisance-coupe_rapide"].'", 
						"'.$_SESSION["coupe_vous"].'",
						"'.$_SESSION['aisance_vous'].'",
						"'.'NON-DEFINI'.'",
						"'.'NON-DEFINI'.'",
						"'.$_SESSION['coupe_vous'].'",
						"'.$_SESSION['mesure-rapide-taille'].'",
						"'.$_SESSION['mesure-rapide-col'].'",
						"'.$_SESSION['mesure-rapide-bras'].'"
					)';
			$bdd->exec($sss);
			//send an email with all details to the customer			
			$to = $_REQUEST["email"];
			$subject = "TailorGeorge.com - Nouveau Compte";
			$message = '
			<html>
			<head>
			<title>TailorGeorge.com - Nouveau Compte</title>
			</head>
			<body>
			<p><img src="http://achrafothman.net/tg/old/web/img/logo-png.PNG" /></p>
			<p>TailorGeorge.com - Nouveau Compte</p>
			<p>Bonjour '.$_REQUEST["salutation"].' '.ucfirst($_REQUEST["prenom"]).' '.ucfirst($_REQUEST["nom"]).',</p>
			<br/>
			Voici vos param&egrave;tres d\'acc&egrave;s:
			<table>
			<tr>
			<th>Identifiant</th>
			<th>Mot de passe</th>
			</tr>
			<tr>
			<td>'.$_REQUEST["email"].'</td>
			<td>'.$pass_salt.'</td>
			</tr>
			</table>
			</body>
			</html>
			';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: TailorGeorge.com <tg@achrafothman.net>' . "\r\n";
			mail($to,$subject,$message,$headers);						
			//send an email with all details to the webmaster			
			$to = 'achraf.othman@gmail.com';
			$subject = "TailorGeorge.com - Nouveau Compte";
			$message = '
			<html>
			<head>
			<title>TailorGeorge.com - Nouveau Compte</title>
			</head>
			<body>
			<p><img src="http://achrafothman.net/tg/old/web/img/logo-png.PNG" /></p>
			<p>Un nouveau compte a ete cree !</p>
			<p>Client: '.$_REQUEST["salutation"].' '.ucfirst($_REQUEST["prenom"]).' '.ucfirst($_REQUEST["nom"]).',</p>
			<br/>
			Pparam&egrave;tres d\'acc&egrave;s:
			<table>
			<tr>
			<th>Identifiant</th>
			<th>Mot de passe</th>
			</tr>
			<tr>
			<td>'.$_REQUEST["email"].'</td>
			<td>'.$pass_salt.'</td>
			</tr>
			</table>
			</body>
			</html>
			';
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: TailorGeorge.com <tg@achrafothman.net>' . "\r\n";
			mail($to,$subject,$message,$headers);						
			//se connecter 
			$sss = 'update tg_sessions set client_email="'.$_REQUEST['email'].'",client_id="'.$client["id"].'",date_connexion="'.date("Y-m-d H:i:s").'" where session_id="'.$id.'"';
			$bdd->exec($sss);
			//message notification
			$_SESSION['message_title'] = 'NOUVEAU COMPTE';
			$_SESSION['message_desc'] = 'Votre compte a &eacute;t&eacute; cr&eacute;e. Un email a &eacute;t&eacute; envoy&eacute; contenant les informations de connexion.';
			//redirection
			$_SESSION['notification'] = "1";
			header('Location:notification.html');
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
    <title>Notification - Tailorgeorge</title>
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
                    <h1 class="fil-arianne-activ oswald-regular">Notification</h1>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ESPACE CLIENT -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <!-- COORDONNEES CONTAINER -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="methode-mesure methode-small">
                            <h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;"><?php echo $_SESSION['message_title']; ?></h2>
                            <p class="livraison-info"><?php echo $_SESSION['message_desc']; ?></p>                            
                        </div>
                    </div>
                </div>
                <div class="fin-apercu-catalogue">
                    <a href="<?php echo $_SESSION['link_button']; ?>" class="btn-rose big-btn"><?php echo $_SESSION['message_button']; ?></a>
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