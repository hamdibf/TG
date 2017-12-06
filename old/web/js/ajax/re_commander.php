<?php
	session_start();
	require_once('../../config/config.php');
	$id = session_id();
?>

<form name="toPanier" id="toPanier" method="post" action="commande.html">
<?php
        echo '<input type="hidden" id="modele_id" name="modele_id" value="' . $_REQUEST['idModele'] . '" />';
?>
</form>