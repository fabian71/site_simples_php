<?php
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
				'busca' => 'busca.php'
				];
	
	//carrega o home
	if(!$pathArray[0]){
		require_once('home.php');
	}elseif($pathArray[0]){
		

		if (array_key_exists($pathArray[0], $paginas)) {
			array_walk($paginas, function ($item, $key) use($pathArray){
				if($pathArray[0] == $key){		
					require_once($item);
					//break;
				}
			});		
		}else{
			header('HTTP/1.0 404 Not Found');
			require_once('404.php');
		}

	
		
	}else{
			header('HTTP/1.0 404 Not Found');
			require_once('404.php');
	}


	
		


}
exit;



if((isset($_GET))){
	header('Location: home.php');
}

if(($_GET['pag'] == 'home') OR ($_GET['pag'] == '')){
	
	header('Location: home.php');

}elseif($_GET['pag'] == 'empresa'){
	
	header('Location: empresa.php');
	
}elseif($_GET['pag'] == 'produtos'){
	
	header('Location: produtos.php');
	
}elseif($_GET['pag'] == 'servicos'){
	
	header('Location: servicos.php');
	
}
elseif($_GET['pag'] == 'contato'){
	
	header('Location: contato.php');
	
}else{
	//header("HTTP/1.0 404 Not Found");
	
	header('HTTP/1.0 404 Not Found');
    echo "<h1>OPS! 404 </h1>";
    echo "Desculpe, mas n&atilde;o foi poss&iacute;vel encontrar a p&aacute;gina que voc&ecirc; solicitou.";
    exit();	
	//header('Location: 404.php');
}
?>