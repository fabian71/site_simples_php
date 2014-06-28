<?php


if((isset($_GET))){
	//header('Location: /home.php');
	require_once('home.php');
}

if($_GET['pag'] == 'empresa'){
	require_once('empresa.php');
}

if($_GET['pag'] == 'produtos'){
	require_once('produtos.php');
}


?>