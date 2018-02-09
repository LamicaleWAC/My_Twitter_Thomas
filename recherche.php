
<?php 
session_start();

if (!isset($_SESSION["id"]) || !isset($_COOKIE[$_SESSION["id"]]))

{
  header('Location:http://localhost/twitter/Accueil.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Rechercher un membre</title>
  	<link rel="stylesheet" type="text/css" href="overload.css">
  <div class="purple">
  <div>
  		<h1 class="dropdown-header">Twit-Twit</h1>
  <a class="link1" href="pageprofil.php">Mon profil</a>
  <form method="post" action="resultat.php">
  <input type="text" name="username" id="username" placeholder="Rechercher un membre">
</form>
  <a class="link3" href="decopage.php">Deconnection</a>
</div>
</div>
</head>
<body>
<p>Je cherche :</p>
  
<p><a href="pageprofil.php">Aller a votre profil</a></p>

<form method="post" action="decopage.php">
<input type="submit" id="deco" value="Se deconnecter">
</form>

</body>
</html>