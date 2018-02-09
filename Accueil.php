<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Accueil</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery.js"></script>
</head>
<body class="co">
<?php
if (isset($_SESSION["id"]) && isset($_COOKIE[$_SESSION["id"]]))
{
  header('Location:http://localhost/twitter/pageprofil.php');
}
?>
  <div class = "conteneur">
    <div class="titre">
      <h1>Twit-Twit</h1>
    </div>
    <div class="content_titre">
     
      
     
     </div>
  </div>
  <div class="form" id="div">
    <p><input type="submit" id="inscri" class="btn btn-info" value="S'inscrire au site"></p>
     <br>
      <p class="pa">Déjà membre?</p>
   <p> <input type="submit" id="connexion" class="btn btn-info" value="Se connecter"></p>
  </div>
       
      
  <script type="text/javascript" src="redi.js"></script>
</body>
</html>