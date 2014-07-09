<?php 

$host = 'localhost';
$dbname = 'site_teste';
$dbuser = 'root';
$dbsenha = 'bru59au';

try{
	$conexao = new \PDO("mysql:host=$host;dbname=$dbname","$dbuser","$dbsenha");
}

catch(\PDOException $e){
	die("Erro: ". $e->getCode().": ".$e->getMessage());
}

/*$id = 6;

$sql = "select * from clientes where id = :id";
$stmt = $conexao->prepare($sql);
$stmt = bindValue("id",$id);
$stmt = execute();

$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($clientes, $cliente){
	echo $cliente['nome'].' - '.$cliente['email']."<br>";
}*/