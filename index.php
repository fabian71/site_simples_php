<?php


if((isset($_GET))){
	header('Location: home.php');
}

if($_GET['pag'] == 'home'){
	
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