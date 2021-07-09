<?php
/*
$db = new mysqli(
    'localhost',
    'root',
    'vertrigo',
    'cloudnotes'
);*/
class BD {
	public $pdo;

	function __construct() {

		try {	
			$this->pdo = new PDO("mysql:host=localhost;dbname=cloudnotes","root",""); 
		} catch(PDOException $e) {
			die('Não foi possível realizar a conexão com o Banco de Dados!!!');
		}

	} // construct

}

?>