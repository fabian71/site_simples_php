<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
session_start();

require_once('conexao.php');

if(!isset($_SESSION['usuario'])){

	// sessao invalida
	header("Location: /admin");
	exit;

}

// Edita 
if(isset($_POST['ID'])){

    $sql = "UPDATE conteudo SET texto = :texto where ID = :ID";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':texto', $_POST['texto'], PDO::PARAM_STR); 
    $stmt->bindParam(':ID', $_POST['ID'], PDO::PARAM_STR); 
    $stmt->execute();


}


if(!isset($_GET['ID'])){
  // sessao invalida
  header("Location: /admin");
  exit;

}

// Carrega
$sql = "select * from conteudo where ID = :ID";
$stmt = $con->prepare($sql);
$stmt->bindParam(':ID', $_GET['ID'], PDO::PARAM_STR); 
$stmt->execute();
$conteudo = $stmt->fetch(PDO::FETCH_ASSOC);
$num_rows = count($conteudo);


if($num_rows == 0){
  header("Location: /admin");
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
    <base href="../">
    <link rel="icon" href="favicon.ico">

    <title>Administração</title>
	
    
    <!-- wysihtml5 -->
    <link rel="stylesheet" type="text/css" href="js/wysihtml5/bootstrap-wysihtml5.css"></link>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- wysihtml5 -->
    <link rel="stylesheet" type="text/css" href="js/wysihtml5/prettify.css"></link>

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    


    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
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

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/admin">Administração</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin">Bem vindo <?php echo $_SESSION['usuario']; ?></a></li>
            <!--
            <li><a href="/admin">Settings</a></li>
            <li><a href="/admin">Profile</a></li>
            <li><a href="/admin">Help</a></li>
        	-->
          </ul>
          <!-- <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form> -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="/adm_lista">Conteúdo</a></li>
            <li><a href="/adm_sair">Sair</a></li>
          </ul>
          
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


          <h2 class="sub-header">Editar Conteúdo</h2>

           <!-- form -->
            <form method="post" role="form">
              <input type="hidden" name="ID" value="<?php echo $conteudo['ID']?>">
              <div class="form-group">
                <textarea id="texto" name="texto" class="textarea" placeholder="Entre com o texto ..." style="width: 810px; height: 200px"><?php echo $conteudo['texto']?></textarea>
              </div>
              
              <button type="submit" class="btn btn-default">Editar</button>
            </form>

           <!-- and form -->

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="js/wysihtml5/wysihtml5-0.3.0.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>

    <script src="assets/js/docs.min.js"></script>

    <script src="js/wysihtml5/bootstrap-wysihtml5.js"></script>

    <script>
      $('.textarea').wysihtml5();
    </script>
  </body>
</html>
