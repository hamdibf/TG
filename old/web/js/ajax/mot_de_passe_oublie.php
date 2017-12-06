<?php

session_start();
require_once('../../config/config.php');
$id = session_id();
$sql = 'select * from tg_client where courriel="' . $_REQUEST['email'] . '"';
$query = $bdd->query($sql);
$data = $query->fetch();

function createPassword($nbCaractere) {
    $password = "";
    for ($i = 0; $i < $nbCaractere; $i++) {
        $random = rand(64, 90);
        $password .= chr($random);
    }
    return $password;
}

if (!empty($data)) {
    $pwd = createPassword(8);
    $pass_salt = $data["salt"];
    $options = [
        'salt' => $pass_salt,
        'cost' => 10
    ];
    $hash = password_hash($pwd, PASSWORD_DEFAULT, $options);
    //$auth = password_verify($_REQUEST['mdp'], $data['password']);

    $sss = 'update tg_client set password="' . $hash . '" where courriel="' . $_REQUEST["email"] . '"';
    $bdd->exec($sss);

    //send an email with all details to the customer
    $to = $_REQUEST["email"];
    $subject = "TailorGeorge - Changement du mot de passe";
    $message = '
	<html>
	<head>
            <title>TailorGeorge.com</title>
            <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="css/main.css">
	</head>
	<body>
	<div class="container">
        	<div class="row">
                    <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-sm-offset-3">
                    <div class="methode-mesure methode-medium">
                    <div class="row">
					        <a class="logo" href="home"><img src="img/logo.svg" alt="Tailor George logo"></a>
					        <img src="img/flag-fr.png" alt="">
                    </div>
                    <div class="row">
					        <h2 style="font-size: 3em; margin-top: 150px;margin-bottom: 50px; text-align: center;"><b>Bienvenue ' . ucfirst($data["prenom"]) . ',</b></h2>
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em; margin-top: 50px;margin-bottom: 50px; text-align: center;">Votre mot de passe a été changé</h2>
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em; text-align: center;">Votre adresse e-mail de connexion est la suivante : </h2>
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em;margin-bottom: 100px; text-align: center;">' . $_REQUEST["email"] . '</h2>
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em; text-align: center;">Votre nouveau mot de passe est le suivant : </h2>
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em;margin-bottom: 100px; text-align: center;">' . $pwd . '</h2>
                    </div>
                    <div class="row">
					        <h2 style="font-size: 2em; margin-top: 100px;margin-bottom: 5px; text-align: center;">Besoin d\'aide?<br>George@tailorgeorge.com</h2>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: TailorGeorge.com <tg@achrafothman.net>' . "\r\n";
    mail($to, $subject, $message, $headers);
    echo '1';
} else {
    echo 'E-mail incorrect !';
}
?>