<?php

    session_start();
    include_once("../user/connectDB.php");

    $meu_BD = new BD();	
	
	$pdo = $meu_BD->pdo;

	$sql = "select * from notes";

	$cmd = $pdo->prepare($sql);
	
	$cmd->execute();

	echo json_encode($cmd->fetchAll());

?>