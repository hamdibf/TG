<?php
	session_start();
	require_once('../../config/config.php');

		$sql = 'select count(*) as n from tg_client where courriel="'.$_REQUEST['email'].'"';
		$query = $bdd->query($sql);
		$data = $query->fetch();
		echo $data["n"];
	
?>