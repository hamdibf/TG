<?php
session_start();
require_once('./config/config.php');
require_once('./config/session.php');
TgSession::add($bdd);

$id = session_id();
$s = 'select * from tg_sessions where session_id="' . $id . '"';
$q = $bdd->query($s);
$ds = $q->fetch();

$ss = 'select * from tg_client where id="' . $ds['client_id'] . '"';
$qq = $bdd->query($ss);
$client = $qq->fetch();

$ss = 'select * from tg_mesure where id_client="' . $client['id'] . '"';
$qq = $bdd->query($ss);
$mesures = $qq->fetch();

$_SESSION['client_email'] = $client['courriel'];

$code_commande = time();
$_SESSION['code_commande'] = $code_commande;

$ss = 'select * from tg_paniers_items where panier_id="' . $id . '"';
$qq = $bdd->query($ss);

while ($panier = $qq->fetch()) {
    $mod = 'select * from tailorgeorge_modele where id_auto="' . $panier['product_id'] . '"';
    $modQuery = $bdd->query($mod);
    $modResult = $modQuery->fetch();

    $insert = 'INSERT INTO `tg_commande_chemise` (`mail_client`,`id_client`,`date`,`tissu`,`col`,`tenuecol`,`baleine`,`doublure_col`,`tissusecond`,`empcol`,`hp`,`poignets`,`doublure_poignet`,`emppoignets`,`dos`,`pinces`,`baschemise`,`gorge`,`nbpoche`,`poches`,`epaulette`,`boutons`,`boutonniere`,`couture`,`txt_init`,`emp_init`,`couleur_init`,`style_init`,`txt_brod`,`couleur_brod`,`style_brod`,`prix`,`quantite`,`commentaire`,`paye`,`offre`,`modele`,`code_modele`,`modele_modifie`,`code_commande`) VALUES("' . $client['courriel'] . '","' . $client['id'] . '",(select NOW()),"' . $modResult['tissu_ref'] . '","' . $modResult['col'] . '","' . $modResult['tenue_col'] . '","' . $modResult['baleine'] . '","' . $modResult['doublure_col'] . '","' . $modResult['tissu_doublure_ref'] . '","' . $modResult['doublure_col'] . '","' . $modResult['hp'] . '","' . $modResult['poignets'] . '","' . $modResult['doublure_poignets'] . '","' . $modResult[''] . '","' . $modResult['dos'] . '","' . $modResult['pinces'] . '","' . $modResult['bas_chemise'] . '","' . $modResult['gorge'] . '","","' . $modResult['poches'] . '","' . $modResult['epaulettes'] . '","' . $modResult['boutons'] . '","' . $modResult['couture'] . '","' . $modResult['couture'] . '","","","","","","","","' . $panier['product_price'] . '",	"' . $panier['quantite'] . '","","en cours","","' . $panier['product_id'] . '","' . $panier['product_id'] . '","0","' . $code_commande . '")';
    $bdd->exec($insert);
}
?>
Lien 1 : <a href="paiement-succes.html">success du paiement</a>
<br/>
Lien 2 : <a href="paiement-echec.html">erreur de paiement</a>

<br/>
<br/>
<br/>

