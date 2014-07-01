<?php

// Menu geral
$arrayMenu = array("Home" => "/",
				   "Empresa" => "empresa",
				   "Produtos" => "produtos",
				   "Servi&ccedil;os" => "servicos",
				   "Contato" => "contato"
);

$printMenu = '';

foreach ($arrayMenu as $nomeMenu => $linkMenu) {

	$ativo ='';	
	
	if($nomeMenu != 'Home'){
		if($_SERVER['REQUEST_URI'] == '/'.$linkMenu){
			$ativo = "class=\"active\"";
		}
	}

	$printMenu .= "<li $ativo><a href=\"$linkMenu\">$nomeMenu</a></li>";
}

?>

<ul class="nav nav-pills pull-right">
<?php echo $printMenu; ?>
</ul>
<h3 class="text-muted">Site Simples</h3>