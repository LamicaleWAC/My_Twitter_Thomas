<?php

session_start();
require_once("connexion.php");
require_once("bdd.php");
require_once("profil.php");
include_once('functions.php');
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
$user = new profil($_SESSION["id"]);
$user->myprofil();?> 
<p><?php echo '<a href="abonnements.php" class="test">Abonnements: '. $user->abonnements($_SESSION["id"]).'</a>'; ?> </p>
<p><?php echo '<a href="abonnés.php" class="test">Abonnés: '. $user->abonnés($_SESSION["id"]).'</a>'; ?> </p>

<button type="button" class="but" onclick="showhistorique();">Modifier vos informations</button>
      <div id="infos" style="display:none;">
    <form method="post" action="pagemodif.php">
          <input type="hidden" name="var2" value="<?php echo "".$_SESSION["$id"]."" ?>"></input> 
    <p>Changer votre image de profil:</p>
          <input type="text" name="picture" placeholder="Entrez l'url de votre image">
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
<div class="tweetbox">
          <?php
if (isset($_SESSION['message'])){
    echo "<b>". $_SESSION['message']."</b>";
    unset($_SESSION['message']);
}

?>
<form method='post' action='add.php'>
<p class="txt1">Votre opinion dispensable:</p>
<div class="bou">
<textarea name='content' id="text" class="box" rows='6' cols='60' wrap=VIRTUAL></textarea>
<div class="imagetw"></div>
</div>
<p><input type='submit' class="butbox" value='Envoyer'/></p>
</form>

 <?php
$posts = show_posts($_SESSION['id']);
 
if (count($posts)){
?>
<table border='1' cellspacing='0' cellpadding='5' width='500' class="tweets">
<?php
foreach ($posts as $key => $list){
    echo "<tr valign='top'>\n";
    echo "<td>".$list['id_user'] ."</td>\n";
    echo "<td>".$list['content'] ."<br/>\n";
    echo "<small>".$list['created_date'] ."</small></td>\n";
    echo "</tr>\n";

}
?>
</table>
<?php
}else{
?>
<p><b>Vous n'avez encore rien posté!</b></p>
<?php
}
?>


</body>
</html>
        </div>
     
      <script type="text/javascript" src="modifprofil.js"></script>
      <script type="text/javascript" src="tweet.js"></script>
  </body>
</html>