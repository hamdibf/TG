<?php

session_start();
require_once('../../config/config.php');
$id = session_id();
$sql = 'select id,salt, password from tg_client where courriel="' . $_REQUEST['email'] . '" limit 1';
$query = $bdd->query($sql);
$data = $query->fetch();
if (!empty($data)) {
    $auth = password_verify($_REQUEST['mdp'], $data['password']);
    if (!empty($auth)) {
        $sql = 'select * from tg_client where courriel="' . $_REQUEST['email'] . '"';
        $query = $bdd->query($sql);
        $data = $query->fetch();
        $sss = 'update tg_sessions set client_email="' . $_REQUEST['email'] . '",client_id="' . $data["id"] . '",date_connexion="' . date("Y-m-d H:i:s") . '" where session_id="' . $id . '"';
        $bdd->exec($sss);
        echo '1';
    } else {
        echo 'Mot de passe incorrect !';
    }
} else {
    echo 'Courriel incorrect !';
}
?>