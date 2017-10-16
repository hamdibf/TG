<?php
	session_start();
	require_once('../../config/config.php');
	$id = session_id();
	$client_id = $_SESSION["client_id"];
	
	$s = 'update tg_mesure set type="mesure-chemise",cou_chem="'.$_REQUEST['cou_chem'].'",poitrine_chem="'.$_REQUEST['poitrine_chem'].'",ceinture_chem="'.$_REQUEST['ceinture_chem'].'",epaule_chem="'.$_REQUEST['epaule_chem'].'",bras_chem="'.$_REQUEST['bras_chem'].'",dos_chem="'.$_REQUEST['dos_chem'].'" where id_client="'.$client_id.'"';
	echo $s;
	$bdd->exec($s);
	
	echo '1';
?>