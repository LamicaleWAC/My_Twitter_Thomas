<?php
session_start();
require_once("profil.php");
$user = new profil($_POST["var"]);
$user->supabo($_POST["var"]);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
<p>Votre abonnement a bien été supprimé. Vous allez être redirigé vers la page d'accueil dans 5 secondes</p>
<?php

 echo "<meta http-equiv='Refresh' content='5;URL=http://localhost/twitter/Accueil.php'>"; ?>
</body>
</html>
