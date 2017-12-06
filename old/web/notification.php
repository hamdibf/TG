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

$date = strtotime("+8 day");
$dateFormat = date('d/m/Y', $date);

if ($_SESSION['notification'] == "1") {
    $_SESSION['notification'] = "0";
} else {
    $_SESSION['message_button'] = "Retour &agrave; la page d'accueil";
    $_SESSION['link_button'] = 'home';

    $_SESSION['message_title'] = 'CENTRE DES NOTIFICATIONS';
    $_SESSION['message_desc'] = 'Vous n\'avez pas de notifications pour le moment !';

    $_SESSION['notification'] = "0";
}

if (isset($_REQUEST["action"])) {
    if ($_REQUEST["action"] == "paiement") {
        if ($_SESSION['paiement'] == 'success') {
            $_SESSION['message_title'] = 'CONFIRMATION COMMANDE';
            $_SESSION['message_desc'] = 'Votre commande a &eacute;t&eacute; confirm&eacute;. Votre facture a &eacute;t&eacute; envoy&eacute; &agrave; votre boite email';
            $mesures = 'select * from tg_mesure where id_client="' . $ds['client_id'] . '"';
            $qMesures = $bdd->query($mesures);
            $r_mesures = $qMesures->fetch();

            $insert = 'INSERT INTO `commande_payee` (
		`mail_client`,
		`id_client`,
                `id_commande`,
                `type_commande`,
                `id_chemise`,
                `date`,
                `montant`,
                `devise`,
                `etat`,
                `date_fabrication`,
                `date_livraison`,
                `date_terminee`,
                `type`,
                `unite`,
                `age`,
                `poids`,
                `taille`,
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
                `manchestandard`,
                `encolure`,
                `aisance1`,
                `aisance2`,
                `aisance3`,
                `mesure_rapide_taille`,
                `mesure_rapide_col`,
                `mesure_rapide_bras`,
                `coupe_vous`
	) VALUES
	(
		"' . $ds['client_email'] . '",
		"' . $ds['client_id'] . '",
		"",
		"",
		"",
		(SELECT NOW()),
		"",
		"",
		"",
                "",
		"' . $dateFormat . '",
		"",
		"' . $r_mesures['type'] . '",
		"",
		"' . $r_mesures['age'] . '",
		"' . $r_mesures['poids'] . '",
		"' . $r_mesures['taille'] . '",
		"' . $r_mesures['cou'] . '",
		"' . $r_mesures['poitrine'] . '",
		"' . $r_mesures['carrure'] . '",
		"' . $r_mesures['dos'] . '",
		"' . $r_mesures['brasdroit'] . '",
		"' . $r_mesures['brasgauche'] . '",
		"' . $r_mesures['poignet'] . '",
		"' . $r_mesures['symetriepoignet'] . '",
		"' . $r_mesures['ceinture'] . '",
		"' . $r_mesures['bassin'] . '",
		"' . $r_mesures['cou_chem'] . '",
		"' . $r_mesures['poitrine_chem'] . '",
		"' . $r_mesures['carrure_chem'] . '",
		"' . $r_mesures['dos_chem'] . '",
        "' . $r_mesures['bras_chem'] . '",
		"' . $r_mesures['poignet_chem'] . '",
		"' . $r_mesures['ceinture_chem'] . '",
		"' . $r_mesures['epaule_chem'] . '",
		"' . $r_mesures['taillestandard'] . '",
		"' . $r_mesures['manchestandard'] . '",
		"' . $r_mesures['encolure'] . '",
		"' . $r_mesures['aisance1'] . '",
		"' . $r_mesures['aisance2'] . '",
		"' . $r_mesures['aisance3'] . '",
		"' . $r_mesures['mesure_rapide_taille'] . '",
		"' . $r_mesures['mesure_rapide_col'] . '",
		"' . $r_mesures['mesure_rapide_bras'] . '",
		"' . $r_mesures['coupe_vous'] . '")';
            $bdd->exec($insert);
            //vider le panier
            $s = 'delete from tg_paniers_items where panier_id="' . $id . '"';
            $bdd->exec($s);

            //update commande
            $update = 'update tg_commande_chemise set paye="oui" where code_commande="' . $_SESSION['code_commande'] . '"';
            $bdd->exec($update);

            //update Mesures (Reset champ mesure_modif utilisé pour savoir si le client a changé ses mesures depuis sa derniere commande)
            $updateMesure = 'update tg_mesure set mesure_modif=0 where id_client="' . $ds['client_id'] . '"';
            $bdd->exec($updateMesure);

            //send an email with all details to the customer
            $_SESSION['client_email'] = $client['courriel'];

            $code_commande = time();
            $_SESSION['code_commande'] = $code_commande;

            $ss = 'select * from tg_paniers_items where panier_id="' . $id . '"';
            $qq = $bdd->query($ss);
            $to = $_SESSION['client_email'];
            $subject = "TailorGeorge.com - Code Commande " . $_SESSION['code_commande'];
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
					        <h2 style="font-size: 2em; margin-top: 50px; text-align: center;">Commande ' . $_SESSION['code_commande'] . '</h2><br>
					        <h2 style="font-size: 2em;margin-bottom: 100px; text-align: center;">' . $dateFormat . '</h2><br>
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
	                                    <img src="' . $imgResult . '" alt="">
	                                </div>
	                                <div class="description-article-panier">
	                                    <div class="description-top">
	                                        <p class="nom-article-panier">' . $modResult["h1"] . '</p>
	                                        <p class="prix-article-panier oswald-bold">' . $modResult["prix"] . '€</p>
	                                    </div>
	                                    <div style="margin-top: 40px; font-size: 13px" >
	                                        <div style="float: left; width: 170px">
	                                            <ul><p class="oswald-regular">TISSUS :</p>
	                                                <li class="puce"><p>Référence : ' . $modResult["tissu_ref"] . ' - ' . $modResult["libelle"] . '</p></li>
	                                            </ul>
	                                            <ul style="margin-top: 5px;">
	                                                <p class="oswald-regular"><strong>COL :</strong></p>
	                                                <li class="puce"><p>Type col : ' . $cols[$modResult["col"]] . '</p></li>
	                                                <li class="puce"><p>Tenue col : ' . $tenue_col[$modResult["tenue_col"]] . '</p></li>
	                                                <li class="puce"><p>Baleine : ' . $baleine[$modResult["baleine"]] . '</p></li>
	                                            </ul>
	                                            <ul style="margin-top: 5px;"><p class="oswald-regular"><strong>POIGNETS : </strong></p>';

                if ($modResult["poignets"])
                    $message .= '<li class="puce">' . $poignets[$modResult["poignets"]] . '</p></li>';

                $message .= '</ul>
	                                            <ul style="margin-top: 5px;"><p class="oswald-regular"><strong>POCHES :</strong></p>
	                                                <li class="puce">' . $poches[$modResult["poches"]] . '</li>
	                                            </ul>
	                                        </div>
	                                        <div style="float: left; width: 170px">
	                                            <ul><p class="oswald-regular"><strong>DOS :</strong></p>';

                if ($modResult["dos"])
                    $message .= '<li class="puce">Dos : ' . $dos[$modResult["dos"]] . '</li>';
                if ($modResult["pinces"])
                    $message .= '<li class="puce">Pinces : ' . $pinces[$modResult["pinces"]] . '</li>';
                $message .= '</ul>
	                                            <ul style="margin-top: 5px;"><p class="oswald-regular"><strong>FINITION :</strong></p>';
                if ($modResult["gorge"])
                    $message .= '<li class="puce"><p>Gorge : ' . $gorge[$modResult["gorge"]] . '</p></li>';
                if ($modResult["bas_chemise"])
                    $message .= '<li class="puce"><p>Bas de chemise : ' . $bas[$modResult["bas_chemise"]] . '</p></li>';
                if ($modResult["epaulettes"])
                    $message .= '<li class="puce"><p>Epaulettes : ' . $modResult["epaulettes"] . '</p></li>';
                $message .= '</ul>
	                                            <ul style="margin-top: 5px;"><p class="oswald-regular"><strong>BOUTONS :</strong></p>
	                                                <li class="puce"><p>Boutons : ' . $modResult["boutons"] . '</p></li>
	                                                <li class="puce"><p>Boutonnière : ' . $boutonnieres[$modResult["couture"]] . '</p></li>
	                                            </ul>
	                                        </div>
	                                    </div>
	                                </div>
                          	</div>
                        </div>';
            }

            $message .= '
                	<div class="row">
					        <h2 style="font-size: 2em; margin-top: 50px; text-align: center;">Total :  ' . $total . '€</h2><br>
					        <h2 style="font-size: 2em; text-align: center;">Frais de livraison (France) : Offerte</h2><br>
					        <h2 style="font-size: 2em;margin-bottom: 100px; text-align: center;">Total payé : ' . $total . '€</h2><br>
                    </div>
                    <div class="row" style="background-color: #d6d3d3;margin-left:-30px;margin-right: -30px;">
                    	<h2 style="font-size: 2em; margin-top: 50px; text-align: center;">Date d\'envoi estimée le : </h2><br>
                    	<h2 style="font-size: 2em;margin-bottom: 100px; text-align: center;">' . $dateFormat . '</h2><br>
                    	<h2 style="font-size: 2em;margin-bottom: 10px; text-align: center;">Votre commande sera expédiée à l\'adresse suivante :</h2><br>
                    	<h2 style="font-size: 2em;margin-bottom: 100px; text-align: center;">
                                <ul class="oswald-regular;style="font-size: 2em;">
                                    <li>' . $client["prenom_livraison"] . ' ' . $client["nom_livraison"] . '</li>
                                    <li>Tel.:' . $client["telephone"] . '</li>
                                    <li>' . $client["adresse_livraison"] . ' ' . $client["renseignement_livraison"] . '</li>
                                    <li>' . $client["societe_livraison"] . '</li>
                                    <li>' . $client["postal_livraison"] . '</li>
                                    <li>' . $client["ville_livraison"] . '</li>
                                    <li>';
            $s = 'select * from tg_pays where code="' . $client["pays_livraison"] . '"';
            $q = $bdd->query($s);
            $pays = $q->fetch();
            $message .= $pays['nom'] . '
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
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: TailorGeorge.com <tg@achrafothman.net>' . "\r\n";
            mail($to, $subject, $message, $headers);
            //redirection
            $_SESSION['notification'] = "1";
            header('Location:notification.html');
        } else {
            $_SESSION['message_title'] = 'ERREUR PAIEMENT';
            $_SESSION['message_desc'] = 'Un erreur est survenu lors du paiement. veuillez re-essayer.';
            $_SESSION['message_button'] = 'Retour au panier';
            $_SESSION['link_button'] = 'panier.html';
            //redirection
            $_SESSION['notification'] = "1";
            header('Location:notification.html');
        }
    }

    if ($_REQUEST["action"] == "nouveau-compte") {
        //Le mot de passe est genere automatiquement, un email sera envoye au client avec tous ce details
        $pass_salt = 'tg' . time() . 'tg' . time();
        $options = [
            'salt' => $pass_salt,
            'cost' => 10
        ];
        $hash = password_hash($_REQUEST["password"], PASSWORD_DEFAULT, $options);
        if ($_REQUEST["adresse_identique"] == "yes") {
            $s = 'INSERT INTO `tg_client` (
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
						`adresse_identique`,
						`newsletter`,
						`salt`,
						`salutation`
					) VALUES (
						"' . $_REQUEST["email"] . '",
						"' . $_REQUEST["nom"] . '",
						"' . $_REQUEST["prenom"] . '",
						"' . $hash . '",
						"' . $_REQUEST["telephone"] . '",
						"' . $_REQUEST["adresse_livraison"] . '",
						"",
						"' . $_REQUEST["renseignement_livraison"] . '",
						"' . $_REQUEST["code-postal_livraison"] . '",
						"' . $_REQUEST["ville_livraison"] . '",
						"' . $_REQUEST["pays_livraison"] . '",
						"' . $_REQUEST["nom_livraison"] . '",
						"' . $_REQUEST["prenom_livraison"] . '",
						"' . $_REQUEST["societe_livraison"] . '",
						"' . $_REQUEST["adresse_livraison"] . '",
						"",
						"' . $_REQUEST["renseignement_livraison"] . '",
						"' . $_REQUEST["code-postal_livraison"] . '",
						"' . $_REQUEST["ville_livraison"] . '",
						"' . $_REQUEST["pays_livraison"] . '",
						"0",
						"",
						1,
						"0",
						"' . $pass_salt . '",
						""
					);';
        } else {
            $s = 'INSERT INTO `tg_client` (
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
						`adresse_identique`,
						`newsletter`,
						`salt`,
						`salutation`
					) VALUES (
						"' . $_REQUEST["email"] . '",
						"' . $_REQUEST["nom"] . '",
						"' . $_REQUEST["prenom"] . '",
						"' . $_REQUEST["password"] . '",
						"' . $_REQUEST["telephone"] . '",
						"' . $_REQUEST["adresse_facturation"] . '",
						"",
						"' . $_REQUEST["renseignement_facturation"] . '",
						"' . $_REQUEST["code-postal_facturation"] . '",
						"' . $_REQUEST["ville_facturation"] . '",
						"' . $_REQUEST["pays_facturation"] . '",
						"' . $_REQUEST["nom_livraison"] . '",
						"' . $_REQUEST["prenom_livraison"] . '",
						"' . $_REQUEST["societe_livraison"] . '",
						"' . $_REQUEST["adresse_livraison"] . '",
						"",
						"' . $_REQUEST["renseignement_livraison"] . '",
						"' . $_REQUEST["code-postal_livraison"] . '",
						"' . $_REQUEST["ville_livraison"] . '",
						"' . $_REQUEST["pays_livraison"] . '",
						"0",
						"",
						0,
						"0",
						"' . $pass_salt . '",
						""
					);';
        }
        $bdd->exec($s);
        //get id new client
        $ss = 'select * from tg_client where salt="' . $pass_salt . '"';
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
						"' . $_REQUEST["email"] . '",
						"' . $client["id"] . '",
						"' . $_SESSION["type_mesure"] . '",
						"' . $_SESSION['cou_vous'] . '",
						"' . $_SESSION['poitrine_vous'] . '",
						"' . $_SESSION['carrure_vous'] . '",
						"' . $_SESSION['dos_vous'] . '",
						"' . $_SESSION['bras-droit_vous'] . '",
						"' . $_SESSION['bras-gauche_vous'] . '",
						"' . $_SESSION['poignet_vous'] . '",
						"' . 'NON-DEFINI' . '",
						"' . $_SESSION['ceinture_vous'] . '",
						"' . 'NON-DEFINI' . '",
						"' . $_SESSION['col_chemise'] . '",
						"' . $_SESSION['demi-poitrine_chemise'] . '",
						"' . $_SESSION['carrure_chemise'] . '",
						"' . $_SESSION['dos_chemise'] . '",
						"' . 'NON-DEFINI' . '",
						"' . $_SESSION['poignet_chemise'] . '",
						"' . 'NON-DEFINI' . '",
						"' . $_SESSION['epaule_chemise'] . '",
						"' . $_SESSION['demi-taille_chemise'] . '",
						"' . 'NON-DEFINI' . '",
						"' . $_SESSION['manche_chemise'] . '",
						"' . $_SESSION["poids"] . '",
						"' . $_SESSION["taille"] . '",
						"' . $_SESSION["age"] . '",
						"' . $_SESSION["aisance-coupe_rapide"] . '",
						"' . $_SESSION["coupe_vous"] . '",
						"' . $_SESSION['aisance_vous'] . '",
						"' . 'NON-DEFINI' . '",
						"' . 'NON-DEFINI' . '",
						"' . $_SESSION['coupe_vous'] . '",
						"' . $_SESSION['mesure-rapide-taille'] . '",
						"' . $_SESSION['mesure-rapide-col'] . '",
						"' . $_SESSION['mesure-rapide-bras'] . '"
					)';
        $bdd->exec($sss);
        //send an email with all details to the customer
        $to = $_REQUEST["email"];
        $subject = "Bienvenue chez TailorGeorge";
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
					        <h2 style="font-size: 3em; margin-top: 150px;margin-bottom: 50px; text-align: center;"><b>Bienvenue ' . ucfirst($client["prenom"]) . ',</b></h2>
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
	</body>
	</html>';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: TailorGeorge.com <tg@achrafothman.net>' . "\r\n";
        mail($to, $subject, $message, $headers);
        //send an email with all details to the webmaster
        $to = 'hbenfredj@gmail.com';
        $subject = "TailorGeorge.com - Nouveau Compte";
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
					        <h2 style="font-size: 3em; margin-top: 150px;margin-bottom: 50px; text-align: center;"><b>Bienvenue ' . ucfirst($client["prenom"]) . ',</b></h2>
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
	</body>
	</html>';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: TailorGeorge.com <tg@achrafothman.net>' . "\r\n";
        mail($to, $subject, $message, $headers);
        //se connecter
        $sss = 'update tg_sessions set client_email="' . $_REQUEST['email'] . '",client_id="' . $client["id"] . '",date_connexion="' . date("Y-m-d H:i:s") . '" where session_id="' . $id . '"';
        $bdd->exec($sss);
        //message notification
        $_SESSION['message_title'] = 'NOUVEAU COMPTE';
        $_SESSION['message_desc'] = 'Votre compte a &eacute;t&eacute; cr&eacute;e. Un email a &eacute;t&eacute; envoy&eacute; contenant les informations de connexion.';

        $p_items = 'select * from tg_paniers_items where panier_id="' . session_id() . '"';
        $query = $bdd->query($p_items);
        //redirection
        $_SESSION['notification'] = "1";
        if ($query->fetch()) {
            header('Location:recapitulatif.html');
        } else {
            header('Location:notification.html');
        }
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
        <?php include("includes/footer.php"); ?>

        <!-- JAVASCRIPT -->
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript">var t =<?php echo time(); ?></script>
        <script type="text/javascript" src="js/index.js"></script>

    </body>

</html>