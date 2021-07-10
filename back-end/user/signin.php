<?php
    session_start();

    include_once("../db/connectDB.php");
	
	$my_DB = new DB();	
	
	$pdo = $my_DB->pdo;

	$email = $_POST['email'];
	$password = $_POST['password'];
    
	$sql = "select * from users where email = :email";

	$cmd = $pdo->prepare($sql);

	$cmd->bindValue(":email", md5($email));
	
	$cmd->execute();


	if( $userInfo = $cmd->fetch(PDO::FETCH_ASSOC) )
	{
        if(password_verify($password,$userInfo['pass']))
        {
			$_SESSION['id']   = $userInfo['id'];
			$_SESSION['user'] = $userInfo['user'];

			header("Location: ../../web/index.php");
        }
        else
        {
        	header("Location: ../../web/user.php");
        }
	} 
	else 
	{        	
		header("Location: ../../web/user.php");	
	}

?>