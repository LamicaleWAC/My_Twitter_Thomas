<?php session_start();
require_once("connexion.php");
require_once("profil.php");
if (!isset($_SESSION["id"]) && !isset($_COOKIE[$_SESSION["id"]]))

{
  header('Location:http://localhost/twitter/Accueil.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
  <body>
    <div class = "conteneur">
    <div class="titre">
      <h1>Twit-Twit</h1>
    </div>
    <div class="content_titre">
      <a href="pageprofil.php" id="lienprofil">Mon profil</a>
      <?php $u = new profil($_SESSION["id"]);?>
        <strong> <?php echo $u->getUsername($_SESSION["id"]);?></strong>
      <form method="post" action="resultat.php" id="form">
        <input type="text" name="username" id="username" placeholder="Rechercher un membre">
      </form>
     <a  href="decopage.php" id="deco">Deconnection</a>
     
    </div>
  </div>
<div class="affich">
<?php
$test = new connect($_POST);
 $test->searchmember();
?>
</div>
<div class="lien">
<a href="pageprofil.php">retour</a>
</div>
  </body>
</html>