<?php 

$host = 'localhost';
$dbname = 'site_teste';
$dbuser = 'root';
$dbsenha = 'bru59au';
$tabela = 'conteudo';

try{
	$con = new \PDO("mysql:host=$host;dbname=$dbname","$dbuser","$dbsenha");
	$con->query("use $dbname");
}

catch(\PDOException $e){
	die("Erro: ". $e->getCode().": ".$e->getMessage());
}

// Caso a tabela conteudo nao exista, envia para a pagina /fixtures

if(!strstr($_SERVER['REQUEST_URI'], '/fixtures')){

	// Verificando se tabela existe
	$tableExists = $con->query("SHOW TABLES LIKE '$tabela'")->rowCount() > 0;

	if(!$tableExists){
		echo "<script>window.location.href = '/fixtures';</script>";
	}

}

