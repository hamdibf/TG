<?php

$ch = curl_init('http://mtmconcept.com/api/BT104/a89f1f0ddb07be6a6b0af007ebfc4a95/tissus');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "couleur=" . $_POST['couleur'] . "&tissage=" . $_POST['tissage'] . "&motif=" . $_POST['motif']);
$data = curl_exec($ch);
$info = curl_getinfo($ch); // get info about the request
curl_close($ch); // close curl resource to free up system resources
$output = json_decode($data, true);

$prix = $_POST['prix']; 
if ($prix !='all') {
	list($min, $max) = explode("-", $prix);
}

if (is_array($output["value"])) {
	foreach ($output["value"] as $key => $value) {
		if($prix == 'all' || ($value["prix"] >= $min && $value["prix"] <= $max)) {
	    	echo '<div class="col-xs-6 col-sm-4 col-md-3"><div class="tissu-catalogue" onclick="configurer(\'tissu_code_' . $value["reference"] . '\',\'' . $value["reference"] . '\',\'' . $value["code"] . '\',\'' . $value["url"] . '\',\'' . addslashes($value["titre"]) . '\',\'' . $value["prix"] . '\',\'' . addslashes($value["description"]) . '\',\'' . addslashes($value["H1"]) . '\',\'' . addslashes($value["couleur"]) . '\',\'' . addslashes($value["tissage"]) . '\',\'' . addslashes($value["dessin"]) . '\')"><div class="tissu-catalogue-photo"><img src="http://www.ls-chemise.com/tissu/150/' . $value["code"] . '.jpg" alt="' . addslashes($value["H1"]) . '" width="100%" height="100%" /></div><div class="catalogue-details" style="max-height: 155px;height: 155px;"><p class="modele-catalogue">' . $value["reference"] . '<br>' . $value["construction"] . '</p><p class="prix-catalogue oswald-bold">' . $value["prix"] . ' €</p></div></div></div>';
		}
	}
}
?>
