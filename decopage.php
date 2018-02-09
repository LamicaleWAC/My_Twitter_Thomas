<?php
session_start();

setcookie($_SESSION["id"],false , time() + 365*24*3600, null, null, false, true);
session_destroy();
echo "Vous avez bien été deconnecté";
echo "<meta http-equiv='Refresh' content='2;URL=http://localhost/twitter/Accueil.php'>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Deconnexion</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>

</body>
</html>