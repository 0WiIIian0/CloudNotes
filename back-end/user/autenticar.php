<?php
    session_start();

	include_once("connectDB.php");

	// Fazendo a conexão com o Banco de Dados	
	$meu_BD = new BD();	
	
	$pdo = $meu_BD->pdo;


	$email = @$_POST['email'];
	$password = @$_POST['password'];
    
	$sql = " select * 
			 from users 
			 where email = :email 
		   ";

	$cmd = $pdo->prepare($sql);

	$cmd->bindValue(":email", md5($email));
	
	$cmd->execute();



	if( $dados = $cmd->fetch(PDO::FETCH_ASSOC) )
	{
        if(password_verify($password,$dados['pass']))
        {
		$_SESSION['id']   = $dados['id'];
		$_SESSION['user'] = $dados['user'];

		header("Location: ../../web/index.php");
        }
        else
        {
        	header("Location: /CloudNotes/signup.php?erro=Usuário e/ou senha inválidos!!!");
        }
	} 
	else 
	{
		header("Location: /CloudNotes/signup.php?erro=Usuário e/ou senha inválidos!!!");	
	}

?>