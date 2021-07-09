<?php
    session_start();
    include_once("connectDB.php");

    $meu_BD = new BD();	
	
	$pdo = $meu_BD->pdo;

	$sql = " update notes set	
					user      = :user   , 
					title     = :title  ,
					text      = :text

				 where id = :id
				";

		$cmd = $pdo->prepare($sql);
        
        $cmd->bindValue(":id", $_SESSION['id'] );

        $user    = $_SESSION['id'];                    
		$title   = $_POST['title'];     
		$text    = $_POST['text'];

		//die( $valor_unitario );

		$cmd->bindValue(":user"    , $user);                    
		$cmd->bindValue(":title"   , $title);         
		$cmd->bindValue(":text"    , $text);

		$cmd->execute();

    if($dados = $cmd->fetch(PDO::FETCH_ASSOC))
	{
		echo 'A nota foi editado com sucesso';
	}
	else
	{
		echo 'Nao foi possivel editar a nota';
	}
?>