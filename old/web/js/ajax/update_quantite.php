<?php
	session_start();
	require_once('../../config/config.php');
	$id = session_id();
	$panier_id = $_REQUEST["idPanier"];
	$signe = $_REQUEST["action"];
	$action = "+";
	if ($signe == "up") 
		$action = "+";
	elseif ($signe == "down") 
		$action = "-";
	$s = 'update tg_paniers_items set 
	quantite = quantite ' . $action . ' 1 
	where tg_paniers_items.id_auto =  ' . $panier_id ;
	$bdd->exec($s);	
	echo '1';
?>