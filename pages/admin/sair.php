<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
session_start();

require_once('conexao.php');

if(!isset($_SESSION['usuario'])){

	// sessao invalida
	header("Location: /admin");
	exit;

}

// Destruindo a sessao
unset($_SESSION['usuario']);
header("Location: /admin");
