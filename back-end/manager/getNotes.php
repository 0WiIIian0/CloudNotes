<?php

    session_start();
    include_once("../user/connectDB.php");

    $meu_BD = new BD();	
	
	$pdo = $meu_BD->pdo;

	$sql = "select user, title, text from notes where user = :user";

	$cmd = $pdo->prepare($sql);
	$cmd->bindValue(":user" , $_SESSION['id']);  
	
	$cmd->execute();

	echo json_encode($cmd->fetchAll(PDO::FETCH_CLASS));

?>