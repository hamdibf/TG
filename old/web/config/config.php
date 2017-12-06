<?php
//if (!defined('CONFIG_DB_HOSTNAME')) { define("CONFIG_DB_HOSTNAME", '91.216.107.184'); } 
//if (!defined('CONFIG_DB_NAME')) { define("CONFIG_DB_NAME", "achra120785"); } 
//if (!defined('CONFIG_DB_USER')) { define("CONFIG_DB_USER", "achra120785"); } 
//if (!defined('CONFIG_DB_PW')) { define("CONFIG_DB_PW", "achraf85"); } 

if (!defined('CONFIG_DB_HOSTNAME')) { define("CONFIG_DB_HOSTNAME", 'localhost'); } 
if (!defined('CONFIG_DB_NAME')) { define("CONFIG_DB_NAME", "achra120785"); } 
if (!defined('CONFIG_DB_USER')) { define("CONFIG_DB_USER", "root"); } 
if (!defined('CONFIG_DB_PW')) { define("CONFIG_DB_PW", ""); } 

try
{
	$bdd = new PDO('mysql:host='.CONFIG_DB_HOSTNAME.';dbname='.CONFIG_DB_NAME.';charset=utf8;port=3306', CONFIG_DB_USER, CONFIG_DB_PW);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
	echo 'EXCEPTION MYSQL CONNECT'.'<br/>';
    die('Erreur : ' . $e->getMessage());
}
?>