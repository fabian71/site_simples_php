<?php

// Menu geral
$arrayMenu = array("Home" => "index.php?pag=home",
				   "Empresa" => "index.php?pag=empresa",
				   "Produtos" => "index.php?pag=produtos",
				   "Servi&ccedil;os" => "index.php?pag=servicos",
				   "Contato" => "index.php?pag=contato"

);

$printMenu = '';

foreach ($arrayMenu as $nomeMenu => $linkMenu) {

	$ativo ='';	
	$linkMenuExploe = explode('index.php?pag=',$linkMenu);
	if(strstr($_SERVER['REQUEST_URI'], $linkMenuExploe[1])){
		$ativo = "class=\"active\"";
	}	
	
	$printMenu .= "<li $ativo><a href=\"$linkMenu\">$nomeMenu</a></li>";
}

?>

<ul class="nav nav-pills pull-right">
<?php echo $printMenu; ?>
</ul>
<h3 class="text-muted">Site Simples</h3>