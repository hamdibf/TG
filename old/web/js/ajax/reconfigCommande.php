<?php
	session_start();
	require_once('../../config/config.php');
	$id = session_id();
	$sql = 'select * from tailorgeorge_modele where id_auto=' . $_REQUEST["idModele"];
	$query = $bdd->query($sql);
	$d = $query->fetch();

?>

<form name="toConfig" id="toConfig" method="post" action="configurateur/index.php">
<?php
	if(!empty($_REQUEST["idPanier"])) {
		echo '<input type="hidden" id="editer" name="editer" value="' . $_REQUEST["idPanier"] . '" />';
	}
	foreach ($d as $key => $value) {
	    if (!is_int($key))
	        echo '<input type="hidden" id="' . $key . '" name="' . $key . '" value="' . addslashes($value) . '" />';
	}
?>
</form>