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

	if($dados = $cmd->fetch(PDO::FETCH_ASSOC))
	{
		echo 'A nota foi pego com sucesso';
	}
	else
	{
		echo 'Nao foi possivel pegar as notas';
	}


?>