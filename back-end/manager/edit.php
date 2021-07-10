<?php

    session_start();
    include_once("../db/connectDB.php");

    $my_DB = new DB();	
	
	$pdo = $my_DB->pdo;

	$sql = " update notes set	
					user      = :user   , 
					title     = :title  ,
					text      = :text

				 where id = :id
				";

	$cmd = $pdo->prepare($sql);
	
	$cmd->bindValue(":id", $_POST['id']);

	$user    = $_SESSION['id'];                    
	$title   = $_POST['title'];     
	$text    = $_POST['text'];

	//die( $valor_unitario );

	$cmd->bindValue(":user"    , $user);                    
	$cmd->bindValue(":title"   , $title);         
	$cmd->bindValue(":text"    , $text);

    if($cmd->execute())
	{
		echo 'A nota foi editado com sucesso';
	}
	else
	{
		echo 'Nao foi possivel editar a nota';
	}
?>