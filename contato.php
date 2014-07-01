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

    <title>Entre em contato</title>

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
      <h2>Contato<small> Fale conosco</small></h2>     
      </div>
      
      <div class="row">
      <div class="col-md-8">
      
      <?php
      	if(isset($_POST)){
			if($_POST){
				echo "<div class=\"alert alert-success\" role=\"alert\"> <span class=\"glyphicon glyphicon-thumbs-up\"></span> Dados enviados com sucesso.</div>";
				
				echo "<div class=\"panel panel-default\">
				  <!-- Default panel contents -->
				  <div class=\"panel-heading\">Abaixo seguem os dados que você enviou:</div>
				  <div class=\"panel-body\">
				  <!-- List group -->
				  <ul class=\"list-group\">
					<li class=\"list-group-item\"><strong>Nome</strong>: $_POST[nome]</li>
					<li class=\"list-group-item\"><strong>Email</strong>: $_POST[email]</li>
					<li class=\"list-group-item\"><strong>Assunto</strong>: $_POST[assunto]</li>
					<li class=\"list-group-item\"><strong>Comentário</strong>: $_POST[comentario]</li>
				  </ul>
				</div>
				  </div>
				
					";
			}
			
		}
	  ?>
      
	<form role="form" method="post">
       <div class="form-group">
        <label for="exampleInputEmail1">Nome</label>
        <input required type="text" class="form-control" name="nome" id="nome" placeholder="Seu nome">
      	</div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input required type="email" class="form-control" name="email" id="email" placeholder="Seu e-mail">
      </div>

       <div class="form-group">
        <label for="exampleInputEmail1">Assunto</label>
        <input required type="text" class="form-control" id="assunto" name="assunto" placeholder="Seu assunto">
      	</div>   

       <div class="form-group">
        <label for="exampleInputEmail1">Comentário</label>
        <textarea required class="form-control" name="comentario" id="comentario" placeholder="Sua mensagem aqui..." style="height:100px;"></textarea>
      	</div>            
      
     
      <button type="submit" class="btn btn-primary btn-lg">Enviar contato</button>
    </form>
          
      </div>
      <div class="col-md-4">      
          <address>
              <strong>Site Simples, Inc.</strong><br>
              795 Folsom Ave, Suite 600<br>
              San Francisco, CA 94107<br>
              <abbr title="Phone">P:</abbr> (123) 456-7890
          </address>
      </div>
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
