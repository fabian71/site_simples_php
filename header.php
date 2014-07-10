
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

<nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Busque aqui">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
          </form>
        </div>
      </div>
    </nav>

