<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

// Acessar arquivos de imagens, js e css
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|txt)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}
 
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
 
rota($url);
 
function rota($url){
	$rota = parse_url($url);
	$path = $rota['path'];
	$pathArray = explode('/',$path);
	
	// Remove o primeiro item vazio da array
	$removeArray = array_shift($pathArray);
	
	//print_r($pathArray);
	$paginas = ['empresa' => 'empresa.php',
				'produtos' => 'produtos.php',
				'servicos' => 'servicos.php',
				'contato' => 'contato.php',
				'fixtures' => 'fixtures.php',
				'busca' => 'busca.php',
				'admin' => 'admin/index.php',
				'autentica' => 'admin/autentica.php',
				'adm_lista' => 'admin/lista.php',
				'adm_sair' => 'admin/sair.php'
				];

				//print_r($pathArray);
	
	//carrega o home
	if(!$pathArray[0]){

		require_once('home.php');
	
	/*}elseif(($pathArray[0]) AND (!@$pathArray[1])){*/
	}elseif(($pathArray[0])){
		
		if (array_key_exists($pathArray[0], $paginas)) {
			//print_r($paginas);
			array_walk($paginas, function ($item, $key) use($pathArray){
				if($pathArray[0] == $key){		
					require_once($item);
					//break;
				}
			});		

		}else{
			echo 'aqui';	
			header('HTTP/1.0 404 Not Found');
			require_once('404.php');
		}

	
		
/*	}elseif(($pathArray[0] == 'admin')){
		//echo 'carrega '.$pathArray[1];

		//print_r($pathArray[1]);

		if (array_key_exists($pathArray[0], $paginas)) {
			print_r($paginas);
			array_walk($paginas, function ($item, $key) use($pathArray){
				
				if($pathArray[0] == $key){		
					//require_once($item);
					//echo $item;
				}
			});		

		}*/

	}else{

			header('HTTP/1.0 404 Not Found');
			require_once('404.php');
	}

}
