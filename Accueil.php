<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Accueil
	</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery.js"></script>
</head>
<body class="co">

<?php
if (isset($_SESSION["id"]) && isset($_COOKIE[$_SESSION["id"]]))
{
  header('Location:http://localhost/twitter/pageprofil.php');
}
else
{
    echo "";
}

?>

  <div class="form" id="div">
  <input type="submit" id="inscri" class="btn btn-primary" value="S'inscrire au site">
     
      <br>
      <p class="pa">Déjà membre?</p>
      <input type="submit" id="connexion" class="btn btn-primary" value="Se connecter">
      
      </div>
       
      
      <script type="text/javascript" src="redi.js"></script>
</body>
</html>