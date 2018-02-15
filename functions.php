<?php

function add_post(){
	$id = $_SESSION["id"];
	$content = $_POST["content"];
		$db = new bdd();
        $rq = $db->getBdd()->exec("INSERT INTO tweet (content, id_user)  VALUES  ('$content',$id)");
}

function show_posts($userid){
    $posts = array();
 	$db = new bdd();
    $query = $db->getBdd()->prepare('SELECT content, created_date FROM tweet
     WHERE id_user = ? ORDER BY created_date desc');
    $query->execute([$userid]);
	if (!$query->rowCount() == 0) {
		while ($data = $query->fetchObject()) {
			 $posts[] = array('created_date' => $data->created_date,
                            'id_user' => $userid, 
                            'content' => $data->content
                    );
		}
	}
    return $posts;
 
}
?>