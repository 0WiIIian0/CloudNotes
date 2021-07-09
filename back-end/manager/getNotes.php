<?php

    session_start();
    include_once("../user/connectDB.php");

    $meu_BD = new BD();	
	
	$pdo = $meu_BD->pdo;

	$sql = " select * from notes
	         where user = :user	
				";

	$cmd = $pdo->prepare($sql);

	$user    = $_SESSION['id'];                    

	$cmd->bindValue(":user" , $user);                    

	$cmd->execute();

	echo json_encode($cmd->fetchAll());

?>