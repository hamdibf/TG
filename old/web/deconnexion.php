<?php
	session_start();
	require_once('./config/config.php');
	require_once('./config/session.php');
	$id = session_id();
	$sss = 'update tg_sessions set session_cloture="1",date_deconnexion="'.date("Y-m-d H:i:s").'" where session_id="'.$id.'"';
	$bdd->exec($sss);
	$_SESSION = array();
	if (ini_get("session.use_cookies")) 
	{
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
		$params["path"], $params["domain"],
		$params["secure"], $params["httponly"]
	);
	}
	session_destroy();
	header('Location: index.php');
?>