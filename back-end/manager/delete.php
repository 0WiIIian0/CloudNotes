<?php

    session_start();
    include_once("connectDB.php");

    $meu_BD = new BD();	
	
	$pdo = $meu_BD->pdo;

	$sql = " delete from notes where id = :id ";

		$cmd = $pdo->prepare($sql);

		$cmd->bindValue(":id", $_SESSION['id'] );

		$cmd->execute();

?>