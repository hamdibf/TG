<?php 
//connexion a la base
if (!defined('CONFIG_DB_HOSTNAME')) { define("CONFIG_DB_HOSTNAME", '91.216.107.184'); } 
if (!defined('CONFIG_DB_NAME')) { define("CONFIG_DB_NAME", "achra120785"); } 
if (!defined('CONFIG_DB_USER')) { define("CONFIG_DB_USER", "achra120785"); } 
if (!defined('CONFIG_DB_PW')) { define("CONFIG_DB_PW", "achraf85"); } 
try{$bdd = new PDO('mysql:host='.CONFIG_DB_HOSTNAME.';dbname='.CONFIG_DB_NAME.';charset=utf8;port=3306', CONFIG_DB_USER, CONFIG_DB_PW);$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}catch (Exception $e){echo 'EXCEPTION MYSQL CONNECT'.'<br/>';die('Erreur : ' . $e->getMessage());}
//mettre a jour tous les champs
foreach($_REQUEST as $k => $r)
{
	if($k!='id_modele')
	{
		$sql = 'update tailorgeorge_modele set '.$k.'="'.$r.'" where id_auto="'.$_REQUEST['id_modele'].'"';
		$output = $bdd->exec($sql);
	}		
}
$sql = 'update tailorgeorge_modele set maj_derniere="'.date("Y-m-d H:i:s").'" where id_auto="'.$_REQUEST['id_modele'].'"';
$output = $bdd->exec($sql);
//generer un code et mettre a jour la ligne
//rendu final
echo 'Le modèle a été mis a jour';
?>