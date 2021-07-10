<?php    
    session_start();
    include_once("../db/connectDB.php");

    $my_DB = new DB();	
	
	$pdo = $my_DB->pdo;

	$sql = "insert into notes (user,title,text) values (:user, :title, :text)";

	$cmd = $pdo->prepare($sql);

	$user  = $_SESSION['id'];                    
	$title = $_POST['title'];     
	$text  = $_POST['text'];

	$cmd->bindValue(":user"    , $user);                    
	$cmd->bindValue(":title"   , $title);         
	$cmd->bindValue(":text"    , $text); 

	$cmd->execute();

	if($dados = $cmd->fetch(PDO::FETCH_ASSOC))
	{
		echo json_encode(array(
			'result' => 201
		));
	}
	else
	{
		echo json_encode(array(
			'result' => 500
		));
	}


?>