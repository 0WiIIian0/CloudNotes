<?php

	include_once("connectDB.php");

	$meu_BD = new BD();	

	$pdo = $meu_BD->pdo;


	$sql = " insert into users	
			(user, email, pass) 
			values 
			(:username,:email,:password)";

	$cmd = $pdo->prepare($sql);

	$username           = $_POST['username'];           
	$email              = $_POST['email'];
	$password           = $_POST['password'];


	$cmd->bindValue(":username" , $username);                    
	$cmd->bindValue(":email"    , $email); 
	$cmd->bindValue(":password" , $password);

	$cmd->execute();
	header("Location: login.php");

?>