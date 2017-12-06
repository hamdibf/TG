<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);
$id = session_id();
$s = 'select * from tg_sessions where session_id="' . $id . '"';
$q = $bdd->query($s);
$ds = $q->fetch();

$ss = 'select * from tg_client where id="' . $ds['client_id'] . '"';
$qq = $bdd->query($ss);
$client = $qq->fetch();

$_SESSION['client_email'] = $client['courriel'];

$code_commande = time();
$_SESSION['code_commande'] = $code_commande;

$ss = 'select * from tg_paniers_items where panier_id="' . $id . '"';
$qq = $bdd->query($ss);

setlocale(LC_TIME, "fr_FR");
$dateFormat = strftime("%A %d %B %Y");

$date = strtotime("+8 day");
$dateFormat = date('d/m/Y', $date);


$cols = ["CLA" => "Classique", "ITA" => "Italien", "ITR" => "Italien rond", "ITO" => "Italien ouvert", "CTW" => "Cutaway", "BOU" => "Boutonné", "DAN" => "Dandy", "ANG" => "Anglais", "ACIG" => "Napolitain", "TEN" => "Longues Pointes", "MAO" => "Mao", "MMO" => "Maomao", "OFR" => "Officier", "OFC" => "Officier carré", "REP" => "Indien", "INS" => "Inversé", "CAS" => "Cérémonie", "MBT" => "Mini boutonné", "MCL" => "Mini classique", "MRO" => "Mini rond", "INP" => "Mini inversé", "BOU" => "Boutonné 2 boutons", "ITO" => "Italien ouvert 2 boutons", "ACIG" => "Napolitain 2 boutons"];
$tenue_col = ["R" => "Rigide", "S" => "Souple"];
$baleine = ["A" => "Avec", "S" => "Sans", "ITA" => "Amovibles"];
$poignets = ["A11" => "1 bouton", "A22" => "2 boutons", "A12" => "Ajustable", "B11" => "1 bouto", "B22" => "2 bouton", "B12" => "Ajustable", "PMR" => "Rond", "PMC" => "Carré", "N22" => "Portofino", "MC" => "Manches courtes"];
$poches = ["0" => "Aucune poche", "1" => "Ronde", "1C" => "Carrée", "1G" => "Rabat", "1PS" => "Soufflet", "1SR" => "Aviateur", "2" => "Rondes (x2)", "2C" => "Carrées (x2)", "2G" => "Rabats (x2)", "2PS" => "Soufflets (x2)", "2SR" => "Aviateurs (x2)"];
$bas = ["L" => "Arrondi", "D" => "Droit", "F" => "Droit avec fentes"];
$gorge = ["S" => "Simple", "A" => "Américaine", "C" => "Cachée"];
$dos = ["" => "Sans plis", "P" => "Pli central", "2P" => "Chevrons"];
$pinces = ["P" => "Avec", "" => "Sans"];
$boutonnieres = ["1938" => "Beige", "1801" => "Blanc mat", "1830" => "Bleu clair", "1966" => "Bleu marine", "1676" => "Bleu roi", "1835" => "Bordeaux", "1874" => "Gris", "1666" => "Jaune pale", "1455" => "Jaune vif", "1911" => "Mauve", "1800" => "Noir", "1965" => "Orange", "1818" => "Rose pale", "1113" => "Rose vif", "1747" => "Rouge", "1801" => "Ton sur ton", "1832" => "Vert fonce", "1647" => "Vert pomme", "1751" => "Vert vif", "1833" => "Violet"];


$to = 'hbenfredj@gmail.com';
$subject = "TailorGeorge.com - Code Commande ";
$message = '
	<html>
	<head>
	<title>TailorGeorge.com - Code Commande </title>
	<link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
	</head>
	<body>

	<div class="container">
        	<div class="row">
           	 	<div class="col-xs-12 col-sm-offset-3 col-sm-6 col-sm-offset-3">
           	 	<div class="methode-mesure methode-medium">
                    <div class="row">
					        <a class="logo" href="home"><img src="img/logo.svg" alt="Tailor George logo"></a>
					        <img src="img/flag-fr.png" alt="">
                    </div>
                    <div class="row">
					        <h2 style="font-size: 3em; margin-top: 150px;margin-bottom: 50px; text-align: center;"><b>Bienvenue ' . $client["prenom"] . ',</b></h2>
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em; margin-top: 50px;margin-bottom: 50px; text-align: center;">Félicitation, vous êtes bien inscrit sur TailorGeorge!</h2>
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em; text-align: center;">Votre adresse e-mail de connexion est la suivante : </h2>
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em;margin-bottom: 100px; text-align: center;">' . $client["courriel"] . '</h2>
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em; margin-top: 100px;margin-bottom: 5px; text-align: center;">Besoin d\'aide?<br>George@tailorgeorge.com</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> 
	<br/>
	<div class="container">
        	<div class="row">
           	 	<div class="col-xs-12 col-sm-offset-1 col-sm-10 col-sm-offset-1">
           	 	<div class="methode-mesure methode-medium">
                    <div class="row">
					        <a class="logo" href="home"><img src="img/logo.svg" alt="Tailor George logo"></a>
					        <img src="img/flag-fr.png" alt="">
                    </div>
                    <div class="row">
					        <h2 style="font-size: 3em; margin-top: 150px;margin-bottom: 50px; text-align: center;"><b>Bienvenue ' . $client["prenom"] . ',</b></h2>
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em; margin-top: 50px;margin-bottom: 50px; text-align: center;">Merci pour votre commande!</h2>
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em; margin-top: 50px; text-align: center;">Commande '. $_SESSION['code_commande'] .'</h2><br>
					        <h2 style="font-size: 2em;margin-bottom: 100px; text-align: center;">'. $dateFormat .'</h2><br>
                    </div>
                    ';
                    $total = 0;
                    while ($panier = $qq->fetch()) {
					    $mod = 'select * from tailorgeorge_modele where id_auto="' . $panier['product_id'] . '"';
					    $modQuery = $bdd->query($mod);
					    $modResult = $modQuery->fetch();
					    $img = end(explode("/", $modResult["jpg_face"]));
                        $imgResult = "../../img/" . $img;
                        $total += $modResult["prix"] * $panier["quantite"];
                        $message .= '
                        <div class="row" style="text-align: left;margin-top: 20px">
	                        <div class="article-panier">
	                                <div class="photo-article-panier" style="width: 410px;">
	                                    <img src="'.$imgResult.'" alt="">
	                                </div>
	                                <div class="description-article-panier">
	                                    <div class="description-top">
	                                        <p class="nom-article-panier">'.$modResult["h1"].'</p>
	                                        <p class="prix-article-panier oswald-bold">'.$modResult["prix"].'€</p>
	                                    </div>
	                                    <div style="margin-top: 40px; font-size: 13px" >
	                                        <div style="float: left; width: 170px">
	                                            <ul><p class="oswald-regular">TISSUS :</p>
	                                                <li class="puce"><p>Référence : ' . $modResult["tissu_ref"] . ' - ' . $modResult["libelle"]. '</p></li>
	                                            </ul>
	                                            <ul style="margin-top: 5px;">
	                                                <p class="oswald-regular"><strong>COL :</strong></p>
	                                                <li class="puce"><p>Type col : ' . $cols[$modResult["col"]].'</p></li>
	                                                <li class="puce"><p>Tenue col : ' . $tenue_col[$modResult["tenue_col"]].'</p></li>
	                                                <li class="puce"><p>Baleine : ' . $baleine[$modResult["baleine"]].'</p></li>
	                                            </ul>
	                                            <ul style="margin-top: 5px;"><p class="oswald-regular"><strong>POIGNETS : </strong></p>';

	                                            if ($modResult["poignets"])
	                                                $message .= '<li class="puce">'.$poignets[$modResult["poignets"]].'</p></li>';

	                                            $message .= '</ul>
	                                            <ul style="margin-top: 5px;"><p class="oswald-regular"><strong>POCHES :</strong></p>
	                                                <li class="puce">'.$poches[$modResult["poches"]].'</li>
	                                            </ul>
	                                        </div>
	                                        <div style="float: left; width: 170px">
	                                            <ul><p class="oswald-regular"><strong>DOS :</strong></p>';

	                                            if ($modResult["dos"])
	                                                $message .= '<li class="puce">Dos : ' . $dos[$modResult["dos"]].'</li>';
	                                            if ($modResult["pinces"])
	                                                $message .= '<li class="puce">Pinces : ' . $pinces[$modResult["pinces"]].'</li>';
	                                            $message .= '</ul>
	                                            <ul style="margin-top: 5px;"><p class="oswald-regular"><strong>FINITION :</strong></p>';
	                                            if ($modResult["gorge"])
	                                                $message .= '<li class="puce"><p>Gorge : ' . $gorge[$modResult["gorge"]] .'</p></li>';
	                                            if ($modResult["bas_chemise"])
	                                                $message .= '<li class="puce"><p>Bas de chemise : ' . $bas[$modResult["bas_chemise"]].'</p></li>';
	                                            if ($modResult["epaulettes"])
	                                                $message .= '<li class="puce"><p>Epaulettes : ' . $modResult["epaulettes"].'</p></li>';
	                                            $message .= '</ul>
	                                            <ul style="margin-top: 5px;"><p class="oswald-regular"><strong>BOUTONS :</strong></p>
	                                                <li class="puce"><p>Boutons : ' . $modResult["boutons"].'</p></li>
	                                                <li class="puce"><p>Boutonnière : ' . $boutonnieres[$modResult["couture"]].'</p></li>
	                                            </ul>
	                                        </div>
	                                    </div>
	                                </div>
                          	</div>
                        </div>';
                        }

                	$message .= '
                	<div class="row">
					        <h2 style="font-size: 2em; margin-top: 50px; text-align: center;">Total :  '. $total .'€</h2><br>
					        <h2 style="font-size: 2em; text-align: center;">Frais de livraison (France) : Offerte</h2><br>
					        <h2 style="font-size: 2em;margin-bottom: 100px; text-align: center;">Total payé : '. $total .'€</h2><br>
                    </div>
                    <div class="row" style="background-color: #d6d3d3;margin-left:-30px;margin-right: -30px;">
                    	<h2 style="font-size: 2em; margin-top: 50px; text-align: center;">Date d\'envoi estimée le : </h2><br>
                    	<h2 style="font-size: 2em;margin-bottom: 100px; text-align: center;">'.$dateFormat.'</h2><br>
                    	<h2 style="font-size: 2em;margin-bottom: 10px; text-align: center;">Votre commande sera expédiée à l\'adresse suivante :</h2><br>
                    	<h2 style="font-size: 2em;margin-bottom: 100px; text-align: center;">
                                <ul class="oswald-regular;style="font-size: 2em;">
                                    <li>'.$client["prenom_livraison"] . ' ' . $client["nom_livraison"].'</li>
                                    <li>Tel.:' . $client["telephone"].'</li>
                                    <li>'.$client["adresse_livraison"] . ' ' . $client["renseignement_livraison"].'</li>
                                    <li>'.$client["societe_livraison"].'</li>
                                    <li>'.$client["postal_livraison"].'</li>
                                    <li>'.$client["ville_livraison"].'</li>
                                    <li>';
                                        $s = 'select * from tg_pays where code="' . $client["pays_livraison"] . '"';
                                        $q = $bdd->query($s);
                                        $pays = $q->fetch();
                                        $message .= $pays['nom'].'
                                    </li>
                                </ul>
                        </h2>
                        <h2 style="font-size: 2em;margin-bottom: 10px; text-align: center;">Livraison assurée par : </h2><br>
                        <h2 style="font-size: 2em;margin-bottom: 0px; text-align: center;">Coliposte - Colissimo suivi</h2><br>
                        <h2 style="font-size: 1.5em;margin-bottom: 30px; text-align: center;">(Vous recevrez par mail le numéro de suivi<br> dès l\'envoi effectif de votre commande)</h2><br>
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em; margin-top: 150px; text-align: center;"></h2><br>
					
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em; margin-top: 50px;margin-bottom: 5px; text-align: center;">Besoin d\'aide?<br>George@tailorgeorge.com</h2>
                    </div>
            </div>
        </div>
    </div> 
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
	die($message);
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: "TailorGeorge.com" <tg@achrafothman.net>' . "\r\n";
mail($to, $subject, $message, $headers);
?>