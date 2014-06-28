<?php


if((isset($_GET))){
	header('Location: home.php');
}

if($_GET['pag'] == 'home'){
	
	header('Location: home.php');

}elseif($_GET['pag'] == 'empresa'){
	
	header('Location: empresa.php');
	
}


?>