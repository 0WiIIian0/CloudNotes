<?php    
    session_start();
    include_once("connectDB.php");

    $meu_BD = new BD();	
	
	$pdo = $meu_BD->pdo;

	$sql = " insert into notes	
					(user,title,text) 
				 values 
					(:user,:title, :text) 
				";

		$cmd = $pdo->prepare($sql);

		$user    = $_SESSION['id'];                    
		$title   = $_POST['title'];     
		$text    = $_POST['text'];


		$cmd->bindValue(":user"    , $user);                    
		$cmd->bindValue(":title"   , $title);         
		$cmd->bindValue(":text"    , $text); 

		$cmd->execute();
?>