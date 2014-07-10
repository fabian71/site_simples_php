<?php 

$host = 'localhost';
$dbname = 'site_teste';
$dbuser = 'root';
$dbsenha = 'bru59au';

try{
	$con = new \PDO("mysql:host=$host;dbname=$dbname","$dbuser","$dbsenha");
	$con->query("use $dbname");
}

catch(\PDOException $e){
	die("Erro: ". $e->getCode().": ".$e->getMessage());
}

/*$id = 6;

$sql = "select * from clientes where id = :id";
$stmt = $con->prepare($sql);
$stmt = bindValue("id",$id);
$stmt = execute();

$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($clientes, $cliente){
	echo $cliente['nome'].' - '.$cliente['email']."<br>";
}*/