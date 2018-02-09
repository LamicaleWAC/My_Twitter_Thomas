<?php
session_start();

require_once("connexion.php");
require_once("bdd.php");
require_once("profil.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

$conn = new connect($_POST);
$conn->checkmember();
setcookie($_SESSION["id"],true , time() + 365*24*3600, null, null, false, true);
header('Location:http://localhost/twitter/pageprofil.php');
?>

</body>
</html>