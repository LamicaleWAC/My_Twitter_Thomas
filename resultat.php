<?php session_start();
require_once("connexion.php");
if (!isset($_SESSION["id"]) && !isset($_COOKIE[$_SESSION["id"]]))

{
  header('Location:http://localhost/twitter/Accueil.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Votre recherche</title>
  <link rel="stylesheet" type="text/css" href="overload.css">
  <div class="purple">
  <h1 class="dropdown-header">Twit-Twit</h1>
  <div>
  <a  class="link1" href="pageprofil.php">Mon profil</a>
</div>
<div>
  <form method="post" action="resultat.php"><input type="text" name="username" id="username" placeholder="Rechercher un membre"></form>
  </div>
  <div>
  <a class="link3" href="decopage.php">Deconnection</a>
  </div>
</div>
</head>
  <body>
<div class="affich">
<?php
$test = new connect($_POST);
 $test->searchmember();
?>
</div>
<div class="lien">
<a href="recherche.php">retour</a>
</div>
  </body>
</html>