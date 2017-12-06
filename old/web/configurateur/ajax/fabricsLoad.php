<?php

$ch = curl_init('http://mtmconcept.com/api/BT104/a89f1f0ddb07be6a6b0af007ebfc4a95/tissus');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "couleur=" . $_POST['couleur'] . "&tissage=" . $_POST['tissage'] . "&motif=" . $_POST['motif']);
$data = curl_exec($ch);
$info = curl_getinfo($ch); // get info about the request
curl_close($ch); // close curl resource to free up system resources
//encode output
$output = json_decode($data, true);
if (is_array($output["value"])) {
    foreach ($output["value"] as $key => $value) {
        echo '<div class="fabric" data-category="fabric" data-id="' . $value["reference"] . '" data-ref="' . $value["reference"] . '" onclick="tissu_select(\'tissu_code_' . $value["reference"] . '\',\'' . $value["reference"] . '\',\'' . $value["code"] . '\',\'' . $value["url"] . '\',\'' . addslashes($value["titre"]) . '\',\'' . $value["prix"] . '\',\'' . addslashes($value["description"]) . '\',\'' . addslashes($value["H1"]) . '\',\'' . addslashes($value["couleur"]) . '\',\'' . addslashes($value["tissage"]) . '\',\'' . addslashes($value["dessin"]) . '\')"><img src="http://www.ls-chemise.com/tissu/150/' . $value["code"] . '.jpg"/><div class="text"><span class="name">' . $value["reference"] . '</span><span class="price">' . $value["prix"] . ' €</span><span class="desc">' . $value["construction"] . '</span></div></div>';
    }
}
?>






