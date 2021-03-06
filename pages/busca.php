<?php 
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

require_once('conexao.php');

if(!$_GET['q']){
  echo "<script>window.location.href = '/';</script>";
}

$q = $_GET['q'];

$sql = "select * from $tabela WHERE texto LIKE :q";
$stmt = $con->prepare($sql);
$stmt->bindValue(":q", "%$q%", PDO::PARAM_STR);
$stmt->execute();

$conteudo = $stmt->fetchAll(PDO::FETCH_ASSOC);
$num_rows = count($conteudo);

$retorno = '';

if($num_rows > 0){

  $retorno .= '<div class="well well-sm">Total de registro(s) encontrado(s) <span class="badge">'.$num_rows.'</span></div>';

   $retorno .= '<div class="list-group">';


  foreach ($conteudo as $cada_conteudo) {

    $texto = strip_tags($cada_conteudo['texto']);
    $texto =  substr($texto, 0, 250);



    $retorno .= '<a href="/'.$cada_conteudo['uri'].'" class="list-group-item">
          <h4 class="list-group-item-heading">'.$cada_conteudo['secao'].'</h4>
          <p class="list-group-item-text"><span class="">'.$texto.'</span>.</p>
        </a> ';
  }

  $retorno .= '</div>';
}else{
  $retorno = "<div class=\"alert alert-danger\" role=\"alert\">
  Nenhum registro encontrado.
</div>";
}



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="/">
    <link rel="icon" href="favicon.ico">

    <title>Empresa</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
		  <?php require_once('header.php');?>
      </div>



      <div class="row">

      <!-- busca -->

      <?php echo $retorno; ?>

      <!-- and busca -->

      
      </div>

      <div class="footer">
       <?php require_once('footer.php'); ?>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
