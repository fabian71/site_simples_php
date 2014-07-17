<?php



function rota($url){
	$rota = parse_url($url);
	$path = $rota['path'];
	$pathArray = explode('/',$path);
	
	// Remove o primeiro item vazio da array
	$removeArray = array_shift($pathArray);
	
	//print_r($pathArray);
	$paginas = ['empresa' => 'pages/empresa.php',
				'produtos' => 'pages/produtos.php',
				'servicos' => 'pages/servicos.php',
				'contato' => 'pages/contato.php',
				'busca' => 'pages/busca.php',
				'admin' => 'pages/admin/index.php',
				'autentica' => 'pages/admin/autentica.php',
				'adm_lista' => 'pages/admin/lista.php',
				'adm_sair' => 'pages/admin/sair.php',
				'adm_edita' => 'pages/admin/edita.php'
				];

				//print_r($pathArray);
	
	//carrega o home
	if(!$pathArray[0]){

		require_once('pages/home.php');
	
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
			header('HTTP/1.0 404 Not Found');
			require_once('pages/404.php');
		}


	}else{

			header('HTTP/1.0 404 Not Found');
			require_once('pages/404.php');
	}

}