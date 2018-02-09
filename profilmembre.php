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
    <link rel="stylesheet" type="text/css" href="essau.css">
  </head>
<body>
  <div class = "conteneur">
    <div class="titre">
      <h1>Twit-Twit</h1>
    </div>
    <div class="content_titre">
      <a href="pageprofil.php" id="lienprofil">Mon profil</a>
      <?php $u = new profil($_SESSION["id"]);
       echo "Connecté en tant que: ".$u->getUsername($_SESSION["id"]);?>
      <form method="post" action="resultat.php" id="form">
        <input type="text" name="username" id="username" placeholder="Rechercher un membre">
      </form>
     <a  href="decopage.php" id="deco">Deconnection</a>
     </div>
  </div>
<?php
$id = $_GET["ID"];
$user = new profil($_GET["ID"]);
$user->profilmembre();
$username = $user->getUsername($_GET["ID"]);
?>
<p><?php echo "<a href='abomembres.php?ID=".$_GET['ID']."'>Abonnements: ". $user->abonnements($_GET["ID"])."</a>"; ?> </p>
<p><?php echo "<a href='abonnesmembre.php?ID=".$_GET['ID']."'>Abonnés: ". $user->abonnés($_GET["ID"])."</a>"; ?> </p>
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