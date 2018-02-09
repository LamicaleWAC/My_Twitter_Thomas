<?php
session_start();
require_once("profil.php");
?>
<!DOCTYPE html>
<html>
<head>
	    <link rel="stylesheet" type="text/css" href="overload.css">
  <div class="purple">
                    <h1>Twit-Twit</h1>
<div>
  <a href="pageprofil.php">Mon profil</a>
</div>
<div>
  <form method="post" action="resultat.php"><input type="text" name="username" id="username" placeholder="Rechercher un membre"></form>
  </div>
  <div>
  <a  href="decopage.php">Deconnection</a>
  </div>
</div>
	<title></title>
</head>
<body>
<?php
$user = new profil($_SESSION["id"]);
$user->listabonnements($_SESSION["id"]); ?>
</body>
</html>