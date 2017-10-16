<?php
	session_start();
	if(isset($_REQUEST['t']))
	{
		if($_REQUEST['t']=='success')
		{
			$_SESSION['paiement'] = 'success';
			header('Location:notification-paiement.html');
		}
		if($_REQUEST['t']=='echec')
		{
			$_SESSION['paiement'] = 'echec';
			header('Location:notification-paiement.html');
		}
	}
?>