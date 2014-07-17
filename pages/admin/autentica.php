<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
session_start();

require_once('conexao.php');

if (!empty($_POST["email"])) {

	$_POST["email"] = trim($_POST["email"]);
	$_POST["senha"] = trim($_POST["senha"]);
	$senha_crypt = password_hash($_POST["senha"],PASSWORD_DEFAULT);

	$sql = "select * from users where email = :email";
	$stmt = $con->prepare($sql);
	
	$stmt->bindParam(':email',$_POST["email"], PDO::PARAM_STR);	
	
	$stmt->execute();

	// E-mail autenticou
	if($stmt->rowCount() > 0){

		$conteudo = $stmt->fetch(PDO::FETCH_ASSOC);

		$hash = $conteudo['senha'];

		// Verifica se a senha esta correta
		if (password_verify($_POST["senha"], $hash)) {

			$_SESSION['usuario'] = $_POST["email"];
			
			echo 'logado';

			header("Location: /adm_lista");




		} else {
		    // Senha incorreta
			header("Location: /admin");
		}


	}else{

		 // email nao confere
		 header("Location: /admin");

	}



    //echo "Yes, mail is set";    

}else{  
    
    //Email nao setado
    header("Location: /admin");
}