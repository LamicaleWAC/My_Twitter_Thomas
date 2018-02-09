<?php
require_once("bdd.php");
class search
{
	private $sexe;
  private $tranche1;	
	private $ville;
  private $tranche2;
  private $age;
	

	public function __construct($data)
{	
	
  foreach ($data as $key => $value)
	{

    	$method = 'set'.ucfirst($key);

    	if (method_exists($this, $method)) 
    	{
    	
    		$this->$method($value);


    	}
    }
}


	public function getSexe()

  {

    return $this->sexe;

  }
  	public function getville()

  {

    return $this->ville;

  }

  public function getDaten()

  {

    return $this->daten;

  }

   public function getTranche1()

  {

    return $this->tranche1;

  }
    public function getTranche2()

  {

    return $this->tranche2;

  } 

     public function getAge()

  {

    return $this->age;

  } 


public function setSexe($sexe)

  {

    if (is_string($sexe))

    {

      $this->sexe = $sexe;

    }

  }
  public function setVille($ville)

  {

    if (is_string($ville))

    {

      $this->ville = $ville;

    }
  }

 public function setAge($age)

  {
      $this->age = $age;

      $t1 = substr($age,0,2);

      $this->tranche1 = $t1;

       $t2 = substr($age,3,5);

      $this->tranche2 = $t2;

  }

function searchlove()
{

  if ($this->age == "nnnnn" ) 
  {
    $db = new bdd();
        $rq = $db->getBdd()->query('SELECT * FROM info_membre  WHERE ville LIKE "%'.$this->ville.'%" AND sexe ="'.$this->sexe.'"');
        ;
        $info = $rq->fetchAll();
        echo "<div class='my-slider'>";
          echo "<ul>";
        foreach ($info as $key => $value) {
          
          echo "<li>".$value["pseudo"]."<br>";
          echo "Age : ".$value["date_naissance"]."<br>";
          echo "Sexe : ".$value["sexe"]."<br>";
          echo "Habite a : ".$value["ville"]."<br>";
          echo "<br>";
          echo "</li>";
         
          
          }
          echo "</ul>";
          echo "<br>";
          echo "</div>";
      
}
  
else
{
$db = new bdd();
        $rq = $db->getBdd()->query('SELECT * FROM info_membre  WHERE ville LIKE "%'.$this->ville.'%" AND sexe ="'.$this->sexe.'" AND date_naissance BETWEEN "'.$this->tranche1.'" AND "'.$this->tranche2.'"');
        ;
        $info = $rq->fetchAll();
         echo "<div class='my-slider'>";
          echo "<ul>";
        foreach ($info as $key => $value) {
          echo "<li>".$value["pseudo"]."</li>"."<br>";
          echo "<li>"."Age : ".$value["date_naissance"]."</li>"."<br>";
          echo "<li>"."Sexe : ".$value["sexe"]."</li>"."<br>";
          echo "<li>"."Habite a : ".$value["ville"]."</li>"."\n"."<br>";
          echo "<br>";
          //echo "</li>";
         
          
          }
          echo "</ul>";
          echo "<br>";
          echo "</div>";
      
  }    
}
}


          