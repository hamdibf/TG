<?php
	session_start();
	require_once('../../config/config.php');
	$id = session_id();
	$sql = 'select count(*) as n from tg_client where courriel="'.$_REQUEST['email'].'" and password="'.$_REQUEST['mdp'].'"';
	$query = $bdd->query($sql);
	$data = $query->fetch();
	if($data["n"]=="0") { echo 'Courriel ou Mot de passe incorrect !'; }
	else { 
		$sql = 'select * from tg_client where courriel="'.$_REQUEST['email'].'" and password="'.$_REQUEST['mdp'].'"';
		$query = $bdd->query($sql);
		$data = $query->fetch();
		$sss = 'update tg_sessions set client_email="'.$_REQUEST['email'].'",client_id="'.$data["id"].'",date_connexion="'.date("Y-m-d H:i:s").'" where session_id="'.$id.'"';
		$bdd->exec($sss);
		echo '1'; 
	}
?>