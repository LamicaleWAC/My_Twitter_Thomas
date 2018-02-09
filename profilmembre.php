<?php
session_start();
require_once("connexion.php");
require_once("bdd.php");
require_once("profil.php");
?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery.js"></script>
	<title>Mon profil</title>
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
<?php
$id = $_GET["ID"];
$user = new profil($_GET["ID"]);
$user->profilmembre();
$username = $user->getUsername($_GET["ID"]);
?>
<div id="verif" >
  <?php
$verif_follow = $user->verif_follow($_SESSION["id"], $_GET["ID"]);
echo "<input type=\"hidden\" id=\"verif_follow\" value=\"".$verif_follow."\" >";
?>
</div>
<div id="followdiv" >
<input type='submit' id='follow' class='btn btn-primary' value='Suivre <?php echo $username; ?>' >
<?php echo "<input type=\"hidden\" id=\"test\" value=\"".$_GET["ID"]."\" >";
 echo "<a href=\"follow.php?ID=".$_GET['ID']."\" >";
?>
</div>


  <script type="text/javascript" src="checkfollow.js"></script>
  <script type="text/javascript" src="requete.js"></script>
  </body>
</html>