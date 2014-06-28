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
	header('Location: 404.php');
}


?>