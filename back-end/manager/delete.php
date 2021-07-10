<?php

    session_start();
    include_once("../db/connectDB.php");

    $my_DB = new DB();	
	
	$pdo = $my_DB->pdo;

	$sql = "delete from notes where id = :id ";

	$cmd = $pdo->prepare($sql);

	$cmd->bindValue(":id", $_SESSION['id'] );

	if($dados = $cmd->fetch(PDO::FETCH_ASSOC))
	{
		echo 'Nota deletado com sucesso';
	}
	else
   {
   	 	echo 'Nao foi possivel deletar a nota';
   }

?>