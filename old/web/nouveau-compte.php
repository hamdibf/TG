<?php 
	session_start();
	require_once('./config/config.php');
	require_once('./config/session.php');
	TgSession::add($bdd);
	
	$type_mesure = $_SESSION['type_mesure'];
	$client_id = $_SESSION['client_id'];
	
	if($type_mesure=="mesure-rapide")
	{
		$_SESSION['age'] = $_REQUEST['age'];
		$_SESSION['taille'] = $_REQUEST['taille'];
		$_SESSION['poids'] = $_REQUEST['poids'];
		$_SESSION['mesure-rapide-taille'] = $_REQUEST['mesure-rapide-taille'];
		$_SESSION['mesure-rapide-col'] = $_REQUEST['mesure-rapide-col'];
		$_SESSION['mesure-rapide-bras'] = $_REQUEST['mesure-rapide-bras'];
		$_SESSION['aisance-coupe_rapide'] = $_REQUEST['aisance-coupe_rapide'];
		
		if(TgSession::getEmailConnected($bdd)!='')
		{
			$update = 'update tg_mesure set type="'.$_SESSION['type_mesure'].'",age="'.$_SESSION['age'].'",taille="'.$_SESSION['taille'].'",poids="'.$_SESSION['poids'].'",mesure_rapide_taille="'.$_SESSION['mesure-rapide-taille'].'",mesure_rapide_col="'.$_SESSION['mesure-rapide-col'].'",mesure_rapide_bras="'.$_SESSION['mesure-rapide-bras'].'",coupe_vous="'.$_SESSION['aisance-coupe_rapide'].'" where id_client="'.TgSession::getIdConnected($bdd).'"';
			$bdd->exec($update);
			header('Location: panier-3.html');
		}
	}
	
	
	if($type_mesure=="mesure-chemise")
	{
		$_SESSION['age'] = $_REQUEST['age'];
		$_SESSION['taille'] = $_REQUEST['taille'];
		$_SESSION['poids'] = $_REQUEST['poids'];
		
		$_SESSION['col_chemise'] = $_REQUEST['col_chemise'];
		$_SESSION['poignet_chemise'] = $_REQUEST['poignet_chemise'];
		$_SESSION['manche_chemise'] = $_REQUEST['manche_chemise'];
		$_SESSION['demi-poitrine_chemise'] = $_REQUEST['demi-poitrine_chemise'];
		$_SESSION['demi-taille_chemise'] = $_REQUEST['demi-taille_chemise'];
		$_SESSION['dos_chemise'] = $_REQUEST['dos_chemise'];
		$_SESSION['carrure_chemise'] = $_REQUEST['carrure_chemise'];
		$_SESSION['epaule_chemise'] = $_REQUEST['epaule_chemise'];
		
		if(TgSession::getEmailConnected($bdd)!='')
		{
			$update = 'update tg_mesure set type="'.$_SESSION['type_mesure'].'",age="'.$_SESSION['age'].'",taille="'.$_SESSION['taille'].'",poids="'.$_SESSION['poids'].'",cou_chem="'.$_SESSION['col_chemise'].'",poignet_chem="'.$_SESSION['poignet_chemise'].'",poitrine_chem="'.$_SESSION['demi-poitrine_chemise'].'",dos_chem="'.$_SESSION['dos_chemise'].'",carrure_chem="'.$_SESSION['carrure_chemise'].'",epaule_chem="'.$_SESSION['epaule_chemise'].'" where id_client="'.TgSession::getIdConnected($bdd).'"';
			$bdd->exec($update);
			header('Location: panier-3.html');
		}
	}
	
	
	
	if($type_mesure=="mesurez-vous")
	{
		$_SESSION['age'] = $_REQUEST['age'];
		$_SESSION['taille'] = $_REQUEST['taille'];
		$_SESSION['poids'] = $_REQUEST['poids'];
		$_SESSION['cou_vous'] = $_REQUEST['cou_vous'];
		$_SESSION['poitrine_vous'] = $_REQUEST['poitrine_vous'];
		$_SESSION['ceinture_vous'] = $_REQUEST['ceinture_vous'];
		$_SESSION['carrure_vous'] = $_REQUEST['carrure_vous'];
		$_SESSION['bras-droit_vous'] = $_REQUEST['bras-droit_vous'];
		$_SESSION['bras-gauche_vous'] = $_REQUEST['bras-gauche_vous'];
		$_SESSION['coupe_vous'] = $_REQUEST['coupe_vous'];
		$_SESSION['aisance_vous'] = $_REQUEST['aisance_vous'];
		$_SESSION['dos_vous'] = $_REQUEST['dos_vous'];
		$_SESSION['poignet_vous'] = $_REQUEST['poignet_vous'];
		
		if(TgSession::getEmailConnected($bdd)!='')
		{
			$update = 'update tg_mesure set type="'.$_SESSION['type_mesure'].'",age="'.$_SESSION['age'].'",taille="'.$_SESSION['taille'].'",poids="'.$_SESSION['poids'].'",cou="'.$_SESSION['cou_vous'].'",poitrine="'.$_SESSION['poitrine_vous'].'",ceinture="'.$_SESSION['ceinture_vous'].'",carrure="'.$_SESSION['carrure_vous'].'",dos="'.$_SESSION['dos_vous'].'",poignet="'.$_SESSION['poignet_vous'].'",brasdroit="'.$_SESSION['bras-droit_vous'].'",brasgauche="'.$_SESSION['bras-gauche_vous'].'",aisance1="'.$_SESSION['coupe_vous'].'",aisance2="'.$_SESSION['aisance_vous'].'" where id_client="'.TgSession::getIdConnected($bdd).'"';
			$bdd->exec($update);
			header('Location: panier-3.html');
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
    <title>Nouveau Compte - TailorGeorge</title>
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
                    <h1 class="fil-arianne-activ oswald-regular">Cr&eacute;er un nouveau compte</h1>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ESPACE CLIENT -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <!-- COORDONNEES CONTAINER -->
                <!-- COORDONEES -->
				<div class="row">
					<div class="col-xs-12">
						<!--  COORDONNEE  -->
						<form action="notification.html" method="POST">
							<input type="hidden" name="action" value="nouveau-compte">
							<!-- NOM / PRENOM / NUM -->
							<div class="row">
								<div class="col-xs-12">
									<div class="methode-mesure methode-small">
										<h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Vous</h2>
										<div class="row">
											
											<div class="col-xs-12 col-sm-4">
												<!-- PRENOM -->
													<div class="input-group">
													<select class="select-mesure input" name="salutation" style="width: 100%;" required>
														<option value="Mr.">Mr.</option>
														<option value="Mme.">Mme.</option>
														<option value="Mlle.">Mlle.</option>
														<option value="Dr.">Dr.</option>
														<option value="Prof.">Prof.</option>
													</select>
												</div>
											</div>
											
											
											<div class="col-xs-12 col-sm-4">
												<!-- PRENOM -->
												<div class="input-group">
													<label class="label" for="prenom">Prénom</label>
													<input class="input" type="text" name="prenom" onfocus="activLabel(this)" onblur="activLabel(this)" required> 
												</div>
											</div>
											<div class="col-xs-12 col-sm-4">
												<!-- NOM -->
												<div class="input-group">
													<label class="label" for="taille">Nom</label>
													<input class="input" type="text" name="nom" onfocus="activLabel(this)" onblur="activLabel(this)" required> 
												</div>
											</div>
											<div class="col-xs-12 col-sm-4">
												<!-- POIDS -->
												<div class="input-group">
													<label class="label" for="telephone">Numéro de Tél.</label>
													<input class="input" type="number" name="telephone" onfocus="activLabel(this)" onblur="activLabel(this)" required> 
												</div>
											</div>
											
											<div class="col-xs-12 col-sm-4">
												<!-- POIDS -->
												<div class="input-group">
													<label class="label" for="telephone2">Numéro de Tél. (secours)</label>
													<input class="input" type="number" name="telephone2" onfocus="activLabel(this)" onblur="activLabel(this)"> 
												</div>
											</div>
											
											
											<div class="col-xs-12 col-sm-4">
												<!-- NOM -->
												<div class="input-group">
													<label class="label" for="email">Email</label>
													<input class="input" type="email" name="email" id="email_nouveau_compte"  onfocus="activLabel(this)" onblur="activLabel(this)" required> 
													<div id="email_msg" style="margin-top: 15px;color: crimson;font-weight: bold;"></div>
												</div>
											</div>
											
											
											
										</div>
									</div>
								</div>
							</div>
							<!-- ADRESSE DE FACTURATION -->
							<div class="row">
								<div class="col-xs-12">
									<div class="methode-mesure methode-small">
										<h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Adresse de facturation</h2>
										<div class="row">
											<div class="col-xs-12 col-sm-4">
												<!-- ADRESSE -->
												<div class="input-group">
													<label class="label" for="adresse">Adresse</label>
													<input class="input" type="text" name="adresse_facturation" onfocus="activLabel(this)" onblur="activLabel(this)" required>
												</div>
											</div>
											<div class="col-xs-12 col-sm-4">
												<!-- ADRESSE SUITE -->
												<div class="input-group">
													<label class="label" for="societe">Societé</label>
													<input class="input" type="text" name="societe_facturation" onfocus="activLabel(this)" onblur="activLabel(this)">
												</div>
											</div>
											<div class="col-xs-12 col-sm-4">
												<!-- RENSEIGNEMENT -->
												<div class="input-group">
													<label class="label" for="renseignement">Infos (code, étage...)</label>
													<input class="input" type="text" name="renseignement_facturation" onfocus="activLabel(this)" onblur="activLabel(this)">
												</div>
											</div>
											<div class="col-xs-12 col-sm-4">
												<!-- CODE POSTAL -->
												<div class="input-group">
													<label class="label" for="code-postal">Code postal</label>
													<input class="input" type="text" name="code-postal_facturation" onfocus="activLabel(this)" onblur="activLabel(this)" required>
												</div>
											</div>
											<div class="col-xs-12 col-sm-4">
												<!-- VILLE -->
												<div class="input-group">
													<label class="label" for="ville">Ville</label>
													<input class="input" type="text" name="ville_facturation" onfocus="activLabel(this)" onblur="activLabel(this)" required>
												</div>
											</div>
											<div class="col-xs-12 col-sm-4">
												<!-- PAYS -->
												<div class="input-group">
													<select class="select-mesure input" name="pays_facturation" style="width: 100%;" required>
														<option value="1">Koweït</option>
														<option value="2">Açores</option>
														<option value="3">Afghanistan</option>
														<option value="4">Albanie</option>
														<option value="5">Algérie</option>
														<option value="6">Andorre</option>
														<option value="7">Angola</option>
														<option value="8">Anguilla</option>
														<option value="9">Antigua et Barbuda</option>
														<option value="10">Antilles Néerlandaises</option>
														<option value="11">Arabie Saoudite</option>
														<option value="12">Argentine</option>
														<option value="13">Arménie</option>
														<option value="14">Aruba</option>
														<option value="15">Australie</option>
														<option value="16">Autriche</option>
														<option value="17">Azerbaïdjan</option>
														<option value="18">Bahamas</option>
														<option value="19">Bahreïn</option>
														<option value="20">Bangladesh</option>
														<option value="21">Barbade</option>
														<option value="22">Belgique</option>
														<option value="23">Belize</option>
														<option value="24">Bénin</option>
														<option value="25">Bermudes</option>
														<option value="26">Bhoutan</option>
														<option value="27">Bolivie</option>
														<option value="28">Bosnie-Herzégovine</option>
														<option value="29">Botswana</option>
														<option value="30">Brésil</option>
														<option value="31">Brunei</option>
														<option value="32">Bulgarie</option>
														<option value="33">Burkina Faso</option>
														<option value="34">Burundi</option>
														<option value="35">Cambodge</option>
														<option value="36">Cameroun</option>
														<option value="37">Canada</option>
														<option value="38">Cap Vert</option>
														<option value="39">Chili</option>
														<option value="40">Chine</option>
														<option value="41">Chypre Nord</option>
														<option value="42">Chypre Sud</option>
														<option value="43">Colombie</option>
														<option value="44">Comores</option>
														<option value="45">Congo</option>
														<option value="46">Corée du Sud</option>
														<option value="47">Costa Rica</option>
														<option value="48">Croatie</option>
														<option value="49">Danemark</option>
														<option value="50">Djibouti</option>
														<option value="51">Dominique</option>
														<option value="52">Egypte</option>
														<option value="53">El Salvador</option>
														<option value="54">Emirats Arabes Unis</option>
														<option value="55">Equateur</option>
														<option value="56">Erythrée</option>
														<option value="57">Espagne</option>
														<option value="58">Estonie</option>
														<option value="59">Etats-Unis</option>
														<option value="60">Ethiopie</option>
														<option value="61">Fidji</option>
														<option value="62">Finlande</option>
														<option value="63" selected="selected">France métropole</option>
														<option value="64">Gabon</option>
														<option value="65">Gambie</option>
														<option value="66">Géorgie</option>
														<option value="67">Ghana</option>
														<option value="68">Gibraltar</option>
														<option value="69">Grèce</option>
														<option value="70">Grenade</option>
														<option value="71">Guadeloupe</option>
														<option value="72">Guam</option>
														<option value="73">Guatemala</option>
														<option value="74">Guinée</option>
														<option value="75">Guinée Equatoriale</option>
														<option value="76">Guyana</option>
														<option value="77">Guyane Française</option>
														<option value="78">Haïti</option>
														<option value="79">Hawaï</option>
														<option value="80">Honduras</option>
														<option value="81">Hong Kong</option>
														<option value="82">Hongrie</option>
														<option value="83">Iles Caïmans</option>
														<option value="84">Iles Canaries</option>
														<option value="85">Iles Chatham</option>
														<option value="86">Iles Christmas</option>
														<option value="87">Iles Cocos</option>
														<option value="88">Iles Faroes</option>
														<option value="89">Iles Marshall</option>
														<option value="90">Iles Samoa Américaines</option>
														<option value="91">Iles Turques-et-Caïques</option>
														<option value="92">Iles Vierges américaines</option>
														<option value="93">Iles Vierges Britanniques</option>
														<option value="94">Inde</option>
														<option value="95">Indonésie</option>
														<option value="96">Irak</option>
														<option value="97">Iran</option>
														<option value="98">Irlande</option>
														<option value="99">Islande</option>
														<option value="100">Israël</option>
														<option value="101">Italie</option>
														<option value="102">Jamaïque</option>
														<option value="103">Japon</option>
														<option value="104">Jordanie</option>
														<option value="105">Kazakhstan</option>
														<option value="106">Kenya</option>
														<option value="107">Kirghizistan</option>
														<option value="108">Kosovo</option>
														<option value="109">Laos</option>
														<option value="110">Lesotho</option>
														<option value="111">Lettonie</option>
														<option value="112">Liban</option>
														<option value="113">Liberia</option>
														<option value="114">Libye</option>
														<option value="115">Liechtenstein</option>
														<option value="116">Lituanie</option>
														<option value="117">Luxembourg</option>
														<option value="118">Macao</option>
														<option value="119">Macédoine</option>
														<option value="120">Madagascar</option>
														<option value="121">Malaisie</option>
														<option value="122">Malawi</option>
														<option value="123">Maldives</option>
														<option value="124">Mali</option>
														<option value="125">Malte</option>
														<option value="126">Marianne du Nord</option>
														<option value="127">Maroc</option>
														<option value="128">Martinique</option>
														<option value="129">Maurice</option>
														<option value="130">Mauritanie</option>
														<option value="131">Mayotte</option>
														<option value="132">Mexique</option>
														<option value="133">Micronésie</option>
														<option value="134">Moldavie</option>
														<option value="135">Monaco</option>
														<option value="136">Mongolie</option>
														<option value="137">Montserrat</option>
														<option value="138">Mozambique</option>
														<option value="139">Myanmar</option>
														<option value="140">Namibie</option>
														<option value="141">Népal</option>
														<option value="142">Nicaragua</option>
														<option value="143">Niger</option>
														<option value="144">Nigeria</option>
														<option value="145">Norvège</option>
														<option value="146">Nouvelle-Calédonie</option>
														<option value="147">Nouvelle-Zélande</option>
														<option value="148">Oman</option>
														<option value="149">Ouganda</option>
														<option value="150">Ouzbékistan</option>
														<option value="151">Pakistan</option>
														<option value="152">Palau</option>
														<option value="153">Palestine</option>
														<option value="154">Panama</option>
														<option value="155">Paraguay</option>
														<option value="156">Pays-Bas</option>
														<option value="157">Pérou</option>
														<option value="158">Philippines</option>
														<option value="159">Pologne</option>
														<option value="160">Polynésie Française</option>
														<option value="161">Porto Rico</option>
														<option value="162">Portugal</option>
														<option value="163">Qatar</option>
														<option value="164">République Centrafricaine</option>
														<option value="165">Rép. Dém. du Congo</option>
														<option value="166">République Dominicaine</option>
														<option value="167">République Sud-Africaine</option>
														<option value="168">République Tchèque</option>
														<option value="169">Réunion</option>
														<option value="170">Roumanie</option>
														<option value="171">Royaume-Uni</option>
														<option value="172">Russie</option>
														<option value="173">Rwanda</option>
														<option value="174">Saint Barthélemy</option>
														<option value="175">Saint Martin</option>
														<option value="176">Saint-Christophe-et-Niévès</option>
														<option value="177">Saint-Pierre-et-Miquelon</option>
														<option value="178">Saint-Vincent-et-les Grenadines</option>
														<option value="179">Sainte Lucie</option>
														<option value="180">Samoa</option>
														<option value="181">San Marin</option>
														<option value="182">Sénégal</option>
														<option value="183">Serbie</option>
														<option value="184">Seychelles</option>
														<option value="185">Sierra-Leone</option>
														<option value="186">Singapour</option>
														<option value="187">Slovaquie</option>
														<option value="188">Slovénie</option>
														<option value="189">Soudan</option>
														<option value="190">Sri Lanka</option>
														<option value="191">Suède</option>
														<option value="192">Suisse</option>
														<option value="193">Suriname</option>
														<option value="194">Swaziland</option>
														<option value="195">Syrie</option>
														<option value="196">Tadjikistan</option>
														<option value="197">Taïwan</option>
														<option value="198">Tanzanie</option>
														<option value="199">Tchad</option>
														<option value="200">Thaïlande</option>
														<option value="201">Togo</option>
														<option value="202">Tonga</option>
														<option value="203">Trinité-et-Tobago</option>
														<option value="204">Tunisie</option>
														<option value="205">Turkménistan</option>
														<option value="206">Turquie</option>
														<option value="207">Allemagne</option>
														<option value="208">Ukraine</option>
														<option value="209">Uruguay</option>
														<option value="210">Vanuatu</option>
														<option value="211">Vatican</option>
														<option value="212">Venezuela</option>
														<option value="213">Vietnam</option>
														<option value="214">Wallis-et-Futuna</option>
														<option value="215">Yémen</option>
														<option value="216">Zambie</option>
														<option value="217">Zimbabwe</option>
														<option value="218">Biélorussie</option>
														<option value="219">Monténégro</option>
														<option value="220">Iles salomon</option>
														<option value="221">iles cook</option>
														<option value="222">cuba</option>
														<option value="223">Iles falkland</option>
														<option value="224">iles sandwich</option>
														<option value="225">Corée du Nord</option>
														<option value="226">nauru</option>
														<option value="227">Somalie</option>
														<option value="228">Sahara</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- ADRESSE DE LIVRAISON -->
							<div class="row">
								<div class="col-xs-12">
									<div class="methode-mesure methode-small">
										<h2 class="methode-titre oswald-regular" style="margin-bottom: 20px;">Adresse de livraison</h2>
										<p class="livraison-info">Les livraisons ont lieu du lundi au vendredi de 9h à 18h. Vous pouvez nous indiquer une adresse différente (bureau, amis...)</p>
										<div class="row">
											<div class="col-xs-12 col-sm-4">
												<!-- ADRESSE -->
												<div class="input-group">
													<label class="label" for="adresse">Adresse</label>
													<input class="input" type="text" name="adresse_livraison" onfocus="activLabel(this)" onblur="activLabel(this)" required>
												</div>
											</div>
											<div class="col-xs-12 col-sm-4">
												<!-- SOCIETE -->
												<div class="input-group">
													<label class="label" for="societe">Societé</label>
													<input class="input" type="text" name="societe_livraison" onfocus="activLabel(this)" onblur="activLabel(this)">
												</div>
											</div>
											<div class="col-xs-12 col-sm-4">
												<!-- RENSEIGNEMENT -->
												<div class="input-group">
													<label class="label" for="renseignement">Infos (code, étage...)</label>
													<input class="input" type="text" name="renseignement_livraison" onfocus="activLabel(this)" onblur="activLabel(this)">
												</div>
											</div>
											<div class="col-xs-12 col-sm-4">
												<!-- CODE POSTAL -->
												<div class="input-group">
													<label class="label" for="code-postal">Code postal</label>
													<input class="input" type="text" name="code-postal_livraison" onfocus="activLabel(this)" onblur="activLabel(this)" required>
												</div>
											</div>
											<div class="col-xs-12 col-sm-4">
												<!-- VILLE -->
												<div class="input-group">
													<label class="label" for="ville">Ville</label>
													<input class="input" type="text" name="ville_livraison" onfocus="activLabel(this)" onblur="activLabel(this)" required>
												</div>
											</div>
											<div class="col-xs-12 col-sm-4">
												<!-- PAYS -->
												<div class="input-group">
													<select class="select-mesure input" name="pays_livraison" style="width: 100%;" required>
														<option value="1">Koweït</option>
														<option value="2">Açores</option>
														<option value="3">Afghanistan</option>
														<option value="4">Albanie</option>
														<option value="5">Algérie</option>
														<option value="6">Andorre</option>
														<option value="7">Angola</option>
														<option value="8">Anguilla</option>
														<option value="9">Antigua et Barbuda</option>
														<option value="10">Antilles Néerlandaises</option>
														<option value="11">Arabie Saoudite</option>
														<option value="12">Argentine</option>
														<option value="13">Arménie</option>
														<option value="14">Aruba</option>
														<option value="15">Australie</option>
														<option value="16">Autriche</option>
														<option value="17">Azerbaïdjan</option>
														<option value="18">Bahamas</option>
														<option value="19">Bahreïn</option>
														<option value="20">Bangladesh</option>
														<option value="21">Barbade</option>
														<option value="22">Belgique</option>
														<option value="23">Belize</option>
														<option value="24">Bénin</option>
														<option value="25">Bermudes</option>
														<option value="26">Bhoutan</option>
														<option value="27">Bolivie</option>
														<option value="28">Bosnie-Herzégovine</option>
														<option value="29">Botswana</option>
														<option value="30">Brésil</option>
														<option value="31">Brunei</option>
														<option value="32">Bulgarie</option>
														<option value="33">Burkina Faso</option>
														<option value="34">Burundi</option>
														<option value="35">Cambodge</option>
														<option value="36">Cameroun</option>
														<option value="37">Canada</option>
														<option value="38">Cap Vert</option>
														<option value="39">Chili</option>
														<option value="40">Chine</option>
														<option value="41">Chypre Nord</option>
														<option value="42">Chypre Sud</option>
														<option value="43">Colombie</option>
														<option value="44">Comores</option>
														<option value="45">Congo</option>
														<option value="46">Corée du Sud</option>
														<option value="47">Costa Rica</option>
														<option value="48">Croatie</option>
														<option value="49">Danemark</option>
														<option value="50">Djibouti</option>
														<option value="51">Dominique</option>
														<option value="52">Egypte</option>
														<option value="53">El Salvador</option>
														<option value="54">Emirats Arabes Unis</option>
														<option value="55">Equateur</option>
														<option value="56">Erythrée</option>
														<option value="57">Espagne</option>
														<option value="58">Estonie</option>
														<option value="59">Etats-Unis</option>
														<option value="60">Ethiopie</option>
														<option value="61">Fidji</option>
														<option value="62">Finlande</option>
														<option value="63" selected="selected">France métropole</option>
														<option value="64">Gabon</option>
														<option value="65">Gambie</option>
														<option value="66">Géorgie</option>
														<option value="67">Ghana</option>
														<option value="68">Gibraltar</option>
														<option value="69">Grèce</option>
														<option value="70">Grenade</option>
														<option value="71">Guadeloupe</option>
														<option value="72">Guam</option>
														<option value="73">Guatemala</option>
														<option value="74">Guinée</option>
														<option value="75">Guinée Equatoriale</option>
														<option value="76">Guyana</option>
														<option value="77">Guyane Française</option>
														<option value="78">Haïti</option>
														<option value="79">Hawaï</option>
														<option value="80">Honduras</option>
														<option value="81">Hong Kong</option>
														<option value="82">Hongrie</option>
														<option value="83">Iles Caïmans</option>
														<option value="84">Iles Canaries</option>
														<option value="85">Iles Chatham</option>
														<option value="86">Iles Christmas</option>
														<option value="87">Iles Cocos</option>
														<option value="88">Iles Faroes</option>
														<option value="89">Iles Marshall</option>
														<option value="90">Iles Samoa Américaines</option>
														<option value="91">Iles Turques-et-Caïques</option>
														<option value="92">Iles Vierges américaines</option>
														<option value="93">Iles Vierges Britanniques</option>
														<option value="94">Inde</option>
														<option value="95">Indonésie</option>
														<option value="96">Irak</option>
														<option value="97">Iran</option>
														<option value="98">Irlande</option>
														<option value="99">Islande</option>
														<option value="100">Israël</option>
														<option value="101">Italie</option>
														<option value="102">Jamaïque</option>
														<option value="103">Japon</option>
														<option value="104">Jordanie</option>
														<option value="105">Kazakhstan</option>
														<option value="106">Kenya</option>
														<option value="107">Kirghizistan</option>
														<option value="108">Kosovo</option>
														<option value="109">Laos</option>
														<option value="110">Lesotho</option>
														<option value="111">Lettonie</option>
														<option value="112">Liban</option>
														<option value="113">Liberia</option>
														<option value="114">Libye</option>
														<option value="115">Liechtenstein</option>
														<option value="116">Lituanie</option>
														<option value="117">Luxembourg</option>
														<option value="118">Macao</option>
														<option value="119">Macédoine</option>
														<option value="120">Madagascar</option>
														<option value="121">Malaisie</option>
														<option value="122">Malawi</option>
														<option value="123">Maldives</option>
														<option value="124">Mali</option>
														<option value="125">Malte</option>
														<option value="126">Marianne du Nord</option>
														<option value="127">Maroc</option>
														<option value="128">Martinique</option>
														<option value="129">Maurice</option>
														<option value="130">Mauritanie</option>
														<option value="131">Mayotte</option>
														<option value="132">Mexique</option>
														<option value="133">Micronésie</option>
														<option value="134">Moldavie</option>
														<option value="135">Monaco</option>
														<option value="136">Mongolie</option>
														<option value="137">Montserrat</option>
														<option value="138">Mozambique</option>
														<option value="139">Myanmar</option>
														<option value="140">Namibie</option>
														<option value="141">Népal</option>
														<option value="142">Nicaragua</option>
														<option value="143">Niger</option>
														<option value="144">Nigeria</option>
														<option value="145">Norvège</option>
														<option value="146">Nouvelle-Calédonie</option>
														<option value="147">Nouvelle-Zélande</option>
														<option value="148">Oman</option>
														<option value="149">Ouganda</option>
														<option value="150">Ouzbékistan</option>
														<option value="151">Pakistan</option>
														<option value="152">Palau</option>
														<option value="153">Palestine</option>
														<option value="154">Panama</option>
														<option value="155">Paraguay</option>
														<option value="156">Pays-Bas</option>
														<option value="157">Pérou</option>
														<option value="158">Philippines</option>
														<option value="159">Pologne</option>
														<option value="160">Polynésie Française</option>
														<option value="161">Porto Rico</option>
														<option value="162">Portugal</option>
														<option value="163">Qatar</option>
														<option value="164">République Centrafricaine</option>
														<option value="165">Rép. Dém. du Congo</option>
														<option value="166">République Dominicaine</option>
														<option value="167">République Sud-Africaine</option>
														<option value="168">République Tchèque</option>
														<option value="169">Réunion</option>
														<option value="170">Roumanie</option>
														<option value="171">Royaume-Uni</option>
														<option value="172">Russie</option>
														<option value="173">Rwanda</option>
														<option value="174">Saint Barthélemy</option>
														<option value="175">Saint Martin</option>
														<option value="176">Saint-Christophe-et-Niévès</option>
														<option value="177">Saint-Pierre-et-Miquelon</option>
														<option value="178">Saint-Vincent-et-les Grenadines</option>
														<option value="179">Sainte Lucie</option>
														<option value="180">Samoa</option>
														<option value="181">San Marin</option>
														<option value="182">Sénégal</option>
														<option value="183">Serbie</option>
														<option value="184">Seychelles</option>
														<option value="185">Sierra-Leone</option>
														<option value="186">Singapour</option>
														<option value="187">Slovaquie</option>
														<option value="188">Slovénie</option>
														<option value="189">Soudan</option>
														<option value="190">Sri Lanka</option>
														<option value="191">Suède</option>
														<option value="192">Suisse</option>
														<option value="193">Suriname</option>
														<option value="194">Swaziland</option>
														<option value="195">Syrie</option>
														<option value="196">Tadjikistan</option>
														<option value="197">Taïwan</option>
														<option value="198">Tanzanie</option>
														<option value="199">Tchad</option>
														<option value="200">Thaïlande</option>
														<option value="201">Togo</option>
														<option value="202">Tonga</option>
														<option value="203">Trinité-et-Tobago</option>
														<option value="204">Tunisie</option>
														<option value="205">Turkménistan</option>
														<option value="206">Turquie</option>
														<option value="207">Allemagne</option>
														<option value="208">Ukraine</option>
														<option value="209">Uruguay</option>
														<option value="210">Vanuatu</option>
														<option value="211">Vatican</option>
														<option value="212">Venezuela</option>
														<option value="213">Vietnam</option>
														<option value="214">Wallis-et-Futuna</option>
														<option value="215">Yémen</option>
														<option value="216">Zambie</option>
														<option value="217">Zimbabwe</option>
														<option value="218">Biélorussie</option>
														<option value="219">Monténégro</option>
														<option value="220">Iles salomon</option>
														<option value="221">iles cook</option>
														<option value="222">cuba</option>
														<option value="223">Iles falkland</option>
														<option value="224">iles sandwich</option>
														<option value="225">Corée du Nord</option>
														<option value="226">nauru</option>
														<option value="227">Somalie</option>
														<option value="228">Sahara</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-12">
									<div class="submit-container" id="submit_area">
										<input class="btn-rose"  type="submit" value="Cr&eacute;er mon compte ...">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>	
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript">var t=<?php echo time(); ?></script>
	<script type="text/javascript" src="js/index.js?t=<?php echo time(); ?>"></script>
	
</body>

</html>