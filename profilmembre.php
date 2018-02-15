<?php
session_start();
require_once("connexion.php");
require_once("bdd.php");
require_once("profil.php");
if (!isset($_SESSION["id"]) || !isset($_COOKIE[$_SESSION["id"]]))

{
  header('Location:http://localhost/twitter/Accueil.php');
}
elseif ($_SESSION["id"] == $_GET["ID"])
{
   header('Location:http://localhost/twitter/pageprofil.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
      <script src="https://code.jquery.com/jquery.js"></script>
	   <title>Mon profil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php $pouf = new profil($_SESSION["id"]);
  $pouf->verifTheme($_SESSION["id"]);?>
  </head>
<body>
 <div class = "conteneur">
      <div class="poi">
    <div> <a href="pageprofil.php"  id="lienprofil">Mon profil</a></div>
      <div><a  href="decopage.php"  id="deco">Deconnection</a></div>
      </div>
    
    <div><?php $u = new profil($_SESSION["id"]);
       echo $u->getUsername($_SESSION["id"]);?></div>
       <div class = money></div>
      <div><form method="post" action="resultat.php" id="form">
        <input type="text" name="username" id="username" placeholder="Rechercher un membre">
      </form></div>
      <div><input type="submit" class="tweetbut" name="bouton" id="tweet" value="Tweeter" onclick="test()"></div>
     </div>
  <div id="profil">

<?php
$id = $_GET["ID"];
$user = new profil($_GET["ID"]);
$user->profilmembre();
$username = $user->getUsername($_GET["ID"]);
?>
<p><?php echo '<a class="test" href="abomembres.php?ID='.$_GET['ID'].'">Abonnements: '. $user->abonnements($_GET["ID"]).'</a>'; ?> </p>
<p><?php echo '<a class="test" href="abonnesmembre.php?ID='.$_GET['ID'].'">Abonnés: '. $user->abonnés($_GET["ID"]).'</a>'; ?> </p>
  <div id="verif" >
    <?php
    $verif_follow = $user->verif_follow($_SESSION["id"], $_GET["ID"]);
    echo "<input type=\"hidden\" id=\"verif_follow\" value=\"".$verif_follow."\" >";
    ?>
  </div>
  <div id="followdiv" >
    <input type='submit' id='follow' class='but' value='Suivre <?php echo $username; ?>' >
    <?php echo "<input type=\"hidden\" id=\"test\" value=\"".$_GET["ID"]."\" >";
    echo "<a href=\"follow.php?ID=".$_GET['ID']."\" >";
    ?>
  </div>
  </div>
  <script type="text/javascript" src="checkfollow.js"></script>
  <script type="text/javascript" src="requete.js"></script>
  </body>
</html>