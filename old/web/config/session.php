<?php
//session_start();
require_once('config.php');

class TgSession
{
	public static function add($bdd)
	{
		$id = session_id();
		$sql = 'select count(*) as n from tg_sessions where session_id="'.$id.'"';
		$query = $bdd->query($sql);
		$data = $query->fetch();
		if($data['n']==1)
		{}
		else
		{
			$sss = 'insert into tg_sessions (session_id,date_ajout,livraison_info,ip) values ("'.$id.'","'.date("Y-m-d H:i:s").'","1","'.$_SERVER['REMOTE_ADDR'].'")';
			$bdd->exec($sss);
		}
	}
	
	public static function getLivraisonInfo($bdd)
	{
		$id = session_id();
		$sql = 'select livraison_info from tg_sessions where session_id="'.$id.'"';
		$query = $bdd->query($sql);
		$data = $query->fetch();
		return $data["livraison_info"];
	}
	
	public static function setLivraisonInfo($bdd)
	{
		$id = session_id();
		$sss = 'update tg_sessions set livraison_info="0" where session_id="'.$id.'"';
		$bdd->exec($sss);
	}
	
	public static function getPaniersProductCount($bdd)
	{
		$id = session_id();
		$sql = 'select count(*) as n from tg_paniers_items where panier_id="'.$id.'"';
		$query = $bdd->query($sql);
		$data = $query->fetch();
		return $data["n"];
	}
	
	public static function getGreeting($bdd)
	{
		$id = session_id();
		$sql = 'select * from tg_sessions where session_id="'.$id.'"';
		$query = $bdd->query($sql);
		$data = $query->fetch();
		if($data['client_id']==0)
		{
			echo 'Bonjour visiteur, accédez à <a class="dinpro-medium" href="connexion.html">votre compte</a>';
		}
		else
		{
			$ss = 'select * from tg_client where id="'.$data['client_id'].'"';
			$qq = $bdd->query($ss);
			$dd = $qq->fetch();
			echo 'Bonjour '.ucfirst($dd['prenom']).' '.ucfirst($dd['nom']).', accédez à <a class="dinpro-medium" href="espace-client.html">votre compte</a><br><br><a class="dinpro-medium" href="deconnexion.html">Se d&eacute;connecter</a>';
		}
	}
	
	public static function getEmailConnected($bdd)
	{
		$id = session_id();
		$sql = 'select * from tg_sessions where session_id="'.$id.'"';
		$query = $bdd->query($sql);
		$data = $query->fetch();
		return $data['client_email'];
	}
	
	public static function getIdConnected($bdd)
	{
		$id = session_id();
		$sql = 'select * from tg_sessions where session_id="'.$id.'"';
		$query = $bdd->query($sql);
		$data = $query->fetch();
		return $data['client_id'];
	}
	
}
?>