<?php
	session_start();
	require_once('../../config/config.php');

		$sql = 'SELECT pi.product_id AS id
		FROM tg_paniers_items pi
		INNER JOIN tailorgeorge_modele modele on modele.id_auto = pi.product_id
		WHERE pi.id_auto='.$_REQUEST['idPanier']. ' and modele.utilisateur=1' ;
		$query = $bdd->query($sql);
		$produit = $query->fetch();
		if (!empty($produit)) {
			$sql = 'DELETE FROM tailorgeorge_modele WHERE id_auto ='.$produit["id"];
			$query = $bdd->query($sql);
		}
		$sql = 'DELETE FROM tg_paniers_items WHERE id_auto ='.$_REQUEST['idPanier'];
		$query = $bdd->query($sql);
	
?>