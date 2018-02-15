<?php
session_start();
include_once("bdd.php");
include_once("functions.php");
 
$userid = $_SESSION['id'];
$body = substr($_POST['content'],0,140);
 
add_post();
//$_SESSION['message'] = "Votre post a bien été ajouté!";
 
header("Location:pageprofil.php");
?>