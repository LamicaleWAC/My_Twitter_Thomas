<?php

session_start();
require_once("connexion.php");
require_once("bdd.php");
require_once("profil.php");
if (!isset($_SESSION["id"]) || !isset($_COOKIE[$_SESSION["id"]]))
{
  header('Location:http://localhost/twitter/Accueil.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
	   <title>Mon profil</title>
  <link rel="stylesheet" type="text/css" href="style.css">
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
  <div id="profil">
<p class="test">
  votre profil:
</p>
<?php
$user = new profil($_SESSION["id"]);
$user->myprofil();?> 
<p><?php echo '<a href="abonnements.php" class="test">Abonnements: '. $user->abonnements($_SESSION["id"]).'</a>'; ?> </p>
<p><?php echo '<a href="abonnés.php" class="test">Abonnés: '. $user->abonnés($_SESSION["id"]).'</a>'; ?> </p>

<button type="button" class="but" onclick="showhistorique();">Modifier vos informations</button>
      <div id="infos" style="display:none;">
    <form method="post" action="pagemodif.php">
          <input type="hidden" name="var2" value="<?php echo "".$_SESSION["$id"]."" ?>"></input> 
  <p>Changer votre mot de passe:</p>
          <input type="text" placeholder="Entrez le nouveau mot de passe" name="password">
  <p>Nom:</p>
         <input type="text" placeholder="Entrez le nouveau nom" name="lastname">
  <p>Prenom:</p>
         <input type="text" placeholder="Entrez le nouveau prenom" name="firstname">
  <p>Adresse E-mail:</p>
         <input type="email" placeholder="Entrez la nouvelle adresse email" name="email">
  <p>Description:</p>
         <br><label for="description">Votre nouvelle présentation :</label><br />
        <textarea name="description" id="description"></textarea><br>
  <p><br><input type="submit" class="but" value="Modifier"></p>
    </form>

  </div>

      <form method="post" action="supabopage.php" >
         <input type="hidden" name="var" value="<?php echo "".$_SESSION["id"]."" ?>"></input>
         <br> <input type="submit" class="but" value="Supprimer votre compte ">
      </form>
<br>
        <form method="post" action="decopage.php">
          <input type="submit" id="deco" class="but" value="Se deconnecter">
        </form>
        </div>
     
      <script type="text/javascript" src="modifprofil.js"></script>
  </body>
</html>