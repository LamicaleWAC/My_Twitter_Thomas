<?php
require_once("bdd.php");
class profil
{
	private $id;
	public function __construct($id)
{	
	
$this->id = $id;


}

public function getId()

  {

    return $this->id;

  }
  public function setPassword($password, $salt = "si tu aimes la wac tape dans tes mains")
{

        $hash = hash_hmac('ripemd160', $password, $salt);
   
        $this->password = $hash;

 }

function myprofil()

  { 
        $db = new bdd();
        $rq = $db->getBdd()->query('SELECT * FROM user  WHERE id ="'.$this->id.'"');
        $info = $rq->fetchAll();
        foreach ($info as $key => $value) {
        	?><strong><?php echo $value["username"];?></strong><br><?php
        	echo "Nom : ".$value["last_name"]."<br>";
        	echo "Prenom : ".$value["first_name"]."<br>";
        	echo "Description : ".$value["description"]."<br>";
        	echo "Adresse e-mail : ".$value["email"]."<br>";
        	
        	}
        	

    }

    function profilmembre()

  { 
        $db = new bdd();
        $rq = $db->getBdd()->query('SELECT * FROM user  WHERE id ="'.$this->id.'"');
        $info = $rq->fetchAll();
        foreach ($info as $key => $value) {
        	?><strong><?php echo $value["username"];?></strong><br><?php
        	echo "Nom : ".$value["first_name"]."<br>";
        	echo "Prenom : ".$value["last_name"]."<br>";
        	echo "Description : ".$value["description"]."<br>";
        	
        	
        	}
        	

    }

    function modifabo($id)
{
	$bdd = new bdd();

	if (($_POST["password"] != ""))
	{
		
		$bdd->getBdd()->exec('UPDATE user SET password  = "'.setPassword($_POST["password"]).'" WHERE id= "'.$id.'"');
	}
	
	
	if (($_POST["lastname"] != ""))
	{
		$bdd->getBdd()->exec('UPDATE user SET last_name  = "'.$_POST["lastname"].'" WHERE id= "'.$id.'"');
	}

	
	if (($_POST["firstname"] != "")) 
	{
		
		$bdd->getBdd()->exec('UPDATE user SET first_name  = "'.$_POST["firstname"].'" WHERE id= "'.$id.'"');
	}
	
	if (($_POST["description"]) != "") 
	{
		
		$bdd->getBdd()->exec('UPDATE user SET description  = "'.$_POST["description"].'" WHERE id= "'.$id.'"');
	}
	
	if (($_POST["email"]) != "") 
	{
		
		$bdd->getBdd()->exec('UPDATE user SET email = "'.$_POST["email"].'"WHERE id= "'.$id.'"');
	}
	
	
		echo "Profil modifié avec succès\n";
	
}

	function supabo($id)
	{
		
		$bdd = new bdd();
		$bdd->getBdd()->exec('DELETE FROM user WHERE id= "'.$id.'"');
		
	}

	function getUsername($id)
	{
		$bdd = new bdd();
		$user = $bdd->getBdd()->query('SELECT username FROM user  WHERE id ="'.$this->id.'"');
		$info = $user->fetchAll();
        foreach ($info as $key => $value)
        {
        	$username = $value["username"];
        }
        	return $username;

	}
	function follow($id_user, $id_user_follow)
	{
		
		/*$bdd = new bdd();
        $rq = $db1->getBdd()->query('SELECT id FROM follow  WHERE id_user ="'.$id_user.'" AND id_user_follow = "'.$id_user_follow.'"');
        $check = $rq->fetchAll();
        $test = count($check);
        if ($test == 0) 
        {
            return "error";

        }
        else
        {*/
        	$bdd = new bdd();
		 $q = $bdd->getBdd()->prepare('INSERT INTO follow(id_user, id_user_follow) VALUES(:id, :id_user_follow)');

      $q->bindValue(':id', $id_user );
      $q->bindValue(':id_user_follow', $id_user_follow);
    
      $q->execute();
  		
      //echo "Vous suivez désormais ".$uti->getUsername($_POST["id_follow"]).".";
      //echo "Vous suivez désormais ".;
	}
	function unfollow($id_user, $id_user_follow)
	{
		$bdd = new bdd();
		$bdd->getBdd()->exec('DELETE FROM follow WHERE id_user ="'.$id_user.'" AND id_user_follow = "'.$id_user_follow.'"');
	}

	function verif_follow($id_user, $id_user_follow)
	{
		$bdd = new bdd();
		$user = $bdd->getBdd()->query('SELECT * FROM follow  WHERE id_user ="'.$id_user.'" AND id_user_follow = "'.$id_user_follow.'"');
		$check = $user->fetchAll();
        $test = count($check);
    	if($test == 0)
    	{
    		return "non";
    	}
    	else
    	{
    		return "oui";
    	}
    }

    function abonnements($id_user)
    {
    	$bdd = new bdd();
    	$user = $bdd->getBdd()->query('SELECT id FROM follow  WHERE id_user ="'.$id_user.'"');
		$check = $user->fetchAll();
        $test = count($check);
        return $test;
    }

    function abonnés($id_user)
    {
    	$bdd = new bdd();
    	$user = $bdd->getBdd()->query('SELECT id FROM follow  WHERE id_user_follow ="'.$id_user.'"');
		$check = $user->fetchAll();
        $test = count($check);

        return $test;
    }

    function listabonnements($id_user)
    {
       $bdd = new bdd();
        $user = $bdd->getBdd()->query('SELECT id_user_follow FROM follow  WHERE id_user ="'.$id_user.'"');
        $check = $user->fetchAll();
       foreach ($check as $key => $value)
        {
            $id_follow = $value["id_user_follow"];
        
        $user = $bdd->getBdd()->query('SELECT username, description, id FROM user  WHERE id ="'.$id_follow.'"');
        $check = $user->fetchAll();
       foreach ($check as $key => $value)
        {
            
            echo "<a href=\"profilmembre.php?ID=".$value['id']."\" >";
            echo "<strong>". $value["username"]."</strong></a><br>";
            echo "description: ".$value["description"]."<br>";
            echo "<br>";
        }
    }

    }

        function listabonnés($id_user)
    {
       $bdd = new bdd();
        $user = $bdd->getBdd()->query('SELECT id_user FROM follow  WHERE id_user_follow ="'.$id_user.'"');
        $check = $user->fetchAll();
       foreach ($check as $key => $value)
        {
            $id_uti = $value["id_user"];
        
        $user = $bdd->getBdd()->query('SELECT username, description, id FROM user  WHERE id ="'.$id_uti.'"');
        $check = $user->fetchAll();
       foreach ($check as $key => $value)
        {
            
            echo "<a href=\"profilmembre.php?ID=".$value['id']."\" >";
            echo "<strong>". $value["username"]."</strong></a><br>";
            echo "description: ".$value["description"]."<br>";
            echo "<br>";
        }
    }

    }

	

}