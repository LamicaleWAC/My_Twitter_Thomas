<?php

function add_post(){
	$id = $_SESSION["id"];
	$content = $_POST["content"];
		$db = new bdd();
        $rq = $db->getBdd()->exec("INSERT INTO tweet (content, id_user)  VALUES  ('$content',$id)");?>
        <script type="text/javascript"> 
            window.close();
        </script>
<?php
}

function show_posts($userid){
    $db = new bdd();
        $rq = $db->getBdd()->query('SELECT * FROM user  WHERE id ="'.$userid.'"');
        $info = $rq->fetchAll();
        foreach ($info as $key => $value)
        {
            $avatar = $value["picture"];
        }
    $posts = array();
    $query = $db->getBdd()->prepare('SELECT content, created_date FROM tweet
     WHERE id_user = ? ORDER BY created_date desc');
    $query->execute([$userid]);
	if (!$query->rowCount() == 0) {
		while ($data = $query->fetchObject()) {
			 $posts[] = array('created_date' => $data->created_date,
                            'picture' => $avatar, 
                            'content' => $data->content
                    );
		}
	}
    return $posts;
 
}
?>