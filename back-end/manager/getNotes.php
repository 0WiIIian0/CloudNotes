<?php

    session_start();
    include_once("../db/connectDB.php");

    $my_DB = new DB();	
	
	$pdo = $my_DB->pdo;

	$sql = "select id, title, text from notes where user = :user";

	$cmd = $pdo->prepare($sql);
	$cmd->bindValue(":user" , $_SESSION['id']);  

	$cmd->execute();

	echo json_encode($cmd->fetchAll(PDO::FETCH_CLASS));

?>