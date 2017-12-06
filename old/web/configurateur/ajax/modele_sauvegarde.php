<?php

session_start();
$sessionid = session_id();

require_once('../../config/config.php');
//inserer une ligne vide pour recuperer un id_auto
$sql = 'INSERT INTO `tailorgeorge_modele` (`id_auto`, `date_ajout`, `secure_key`, `code`,`dispo`,`url`, `title`, `h1`, `texte`, `chapo`, `utilisateur`) VALUES (NULL, "' . date("Y-m-d H:i:s") . '","' . time() . '","M1000","","","","","","",1)';
$output = $bdd->exec($sql);
$last_id = $bdd->lastInsertId();
//mettre a jour tous les champs
foreach ($_REQUEST as $k => $r) {
    if ($k != 'id') {
        $sql = "SHOW COLUMNS FROM `tailorgeorge_modele` LIKE '" . $k . "'";
        $query = $bdd->query($sql);
        $data = $query->fetch();
        if ($data != "") {
            $sql = 'update tailorgeorge_modele set ' . $k . '="' . $r . '" where id_auto="' . $last_id . '"';
            //echo $sql."<br/>";
            $output = $bdd->exec($sql);
        }
    }
}
//generer un code et mettre a jour la ligne
$code = 'M' . str_pad($last_id, 4, '0', STR_PAD_LEFT);
$sql = 'update tailorgeorge_modele set code="' . $code . '" where id_auto="' . $last_id . '"';
$output = $bdd->exec($sql);

//copie jpgs images
$sql = 'select * from `tailorgeorge_modele` where id_auto="' . $last_id . '"';
$query = $bdd->query($sql);
$data = $query->fetch();
$jpg_face = '../../../../img/' . $code . '_face.jpg';
$output = copy('../' . $data['img_file_face'], $jpg_face);
$jpg_dos = '../../../../img/' . $code . '_dos.jpg';
$output = copy('../' . $data['img_file_dos'], $jpg_dos);
$jpg_zoom = '../../../../img/' . $code . '_zoom.jpg';
$output = copy('../' . $data['img_file_zoom'], $jpg_zoom);
$sql = 'update tailorgeorge_modele set jpg_face="' . $jpg_face . '",jpg_dos="' . $jpg_dos . '",jpg_zoom="' . $jpg_zoom . '" where id_auto="' . $last_id . '"';
$output = $bdd->exec($sql);
//unlink('../' . $data['img_file_face']);
//unlink('../' . $data['img_file_dos']);
//unlink('../' . $data['img_file_zoom']);
//create url / title / h1 / description / libelle / texte / categorie / alt images
$url = 'chemise-' . $data['categorie'] . '-' . $data['api_tissage'] . '-' . $data['api_couleur'] . '-' . $data['api_dessin'] . '-' . $data['code'] . '.html';
$sql = 'update tailorgeorge_modele set url="' . $url . '" where id_auto="' . $last_id . '"';
$output = $bdd->exec($sql);

$title = 'Chemise ' . $data['categorie'] . ' - ' . $data['api_tissage'] . ' ' . $data['api_couleur'] . ' ' . $data['api_dessin'] . ' - ' . $data['code'] . ' - TailorGeorge.fr';
$sql = 'update tailorgeorge_modele set title="' . $title . '" where id_auto="' . $last_id . '"';
$output = $bdd->exec($sql);

$h1 = 'Chemise ' . $data['categorie'] . ' - ' . $data['api_tissage'] . ' ' . $data['api_couleur'] . ' ' . $data['api_dessin'];
$sql = 'update tailorgeorge_modele set h1="' . $h1 . '" where id_auto="' . $last_id . '"';
$output = $bdd->exec($sql);

//DESCRIPTION
$s_poignet = 'select * from `tailorgeorge_poignets` where code="' . $data['poignets'] . '"';
$q_poignet = $bdd->query($s_poignet);
$d_poignet = $q_poignet->fetch();
$s_col = 'select * from `tailorgeorge_cols` where code="' . $data['col'] . '"';
$q_col = $bdd->query($s_col);
$d_col = $q_col->fetch();
$description = 'Chemise ' . $data['categorie'] . ' en ' . $data['api_tissage'] . ' ' . $data['api_couleur'] . ' ' . $data['api_dessin'] . ', col ' . $d_col['col'] . ' et poignets ' . $d_poignet['poignet'] . '. Fabriqu&eacute;e selon vos mesures, livraison 8 jours.';
$sql = 'update tailorgeorge_modele set description="' . $description . '" where id_auto="' . $last_id . '"';
$output = $bdd->exec($sql);

//LIBELLE
$libelle = $data['api_tissage'] . ' ' . $data['api_couleur'] . ' ' . $data['api_dessin'];
$sql = 'update tailorgeorge_modele set libelle="' . $libelle . '" where id_auto="' . $last_id . '"';
$output = $bdd->exec($sql);

$jpg_face_alt = 'Chemise sur mesure ' . $data['categorie'] . ' - ' . $data['api_tissage'] . ' ' . $data['api_couleur'] . ' ' . $data['api_dessin'];
$sql = 'update tailorgeorge_modele set jpg_face_alt="' . $jpg_face_alt . '" where id_auto="' . $last_id . '"';
$output = $bdd->exec($sql);

$jpg_dos_alt = 'Chemise sur mesure ' . $data['categorie'] . ' - ' . $data['api_tissage'] . ' ' . $data['api_couleur'] . ' ' . $data['api_dessin'];
$sql = 'update tailorgeorge_modele set jpg_dos_alt="' . $jpg_dos_alt . '" where id_auto="' . $last_id . '"';
$output = $bdd->exec($sql);

$jpg_zoom_alt = 'Chemise sur mesure ' . $data['categorie'] . ' - ' . $data['api_tissage'] . ' ' . $data['api_couleur'] . ' ' . $data['api_dessin'];
$sql = 'update tailorgeorge_modele set jpg_zoom_alt="' . $jpg_zoom_alt . '" where id_auto="' . $last_id . '"';
$output = $bdd->exec($sql);

$texte = '';

//ajout au panier
$s = 'select * from tg_sessions where session_id="' . $sessionid . '"';
$q = $bdd->query($s);
$ds = $q->fetch();

//if($ds['client_id']!=0)
//{
if (empty($_REQUEST["edit"]) || $_REQUEST["edit"] == 0) {
    $ss = 'insert into tg_paniers_items(panier_id,product_id,product_price) values ("' . $sessionid . '","' . $last_id . '","' . $data['prix'] . '")';
    $bdd->exec($ss);
} elseif (!empty($_REQUEST["edit"]) && $_REQUEST["edit"] > 0) {
    $ss = 'update tg_paniers_items set product_id = ' . $last_id . ', product_price = ' . $data['prix'] . ' where id_auto = ' . $_REQUEST["edit"];
    $bdd->exec($ss);
}
//redirection vers la page deja client
//}
//redirection vers la page panier
//header('Location: ../../panier-step-1.php');
//rendu final
//echo 'Le modèle a été enregistré sous le code : ' . $code . '<input type="hidden" id="code_modele" name="code_modele" value="' . $code . '" /><input type="hidden" id="id_modele" name="id_modele" value="' . $last_id . '" /><br /><div id="etape_content_sub"></div><br /><br />Pour editer le modele cliquer sur ce lien: <a href="./temp/' . $code . '">./temp/' . $code . '</a>';
?>