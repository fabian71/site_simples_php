<?php 

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/*
Cria a base de testes
*/
require_once('conexao.php');

//$tabela = 'conteudo';


if(!isset($_GET['instalar'])){

	echo "Voc&ecirc; deve criar a data base <b>site_teste</b> antes de continuar.<br> ATEN&Ccedil;&Atilde;O. Caso os dados j&aacute; exista eles ser&atilde;o removidos.<br />
		Deseja continuar? <br>";
	echo '<a href="?instalar=s"> Sim </a><br />';
	echo '<a href="http://www.google.com"> N&atilde;o </a><br />';


}else{


	// Verificando se tabela existe
	$tableExists = $con->query("SHOW TABLES LIKE '$tabela'")->rowCount() > 0;

	
	if($tableExists > 0){
		print("Apagando todos os dados... <br>");
		//Apagando os dados da tabela
		$sql = "DELETE FROM $tabela";
		$stmt = $con->prepare($sql); 
		$stmt->execute();


	}else{

		print("Criando a tabela... <br>");


		// Criando a tabela 
		$q="CREATE TABLE $tabela (
		  ID int(11) NOT NULL AUTO_INCREMENT,
		  status enum('d','i') NOT NULL DEFAULT 'd', 
		  texto text NOT NULL,
		  secao varchar(100) NOT NULL,
		  uri varchar(100) NOT NULL,
		  data_cad TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		  PRIMARY KEY (ID),
		  UNIQUE KEY ID (ID)
		  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
		";

		try {
		 $con->exec($q);
		 print("Tabela criada... <br>");
		}
		catch (PDOException $e) {
		 echo $e->getMessage();
		}

		// Criando a tabela users
		$q="CREATE TABLE users (
		  ID int(11) NOT NULL AUTO_INCREMENT,
		  status enum('d','i') NOT NULL DEFAULT 'd',
		  email varchar(160) NOT NULL,
		  senha char(60) NOT NULL,
		  data_cad TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		  PRIMARY KEY (ID),
		  UNIQUE KEY ID (ID)
		  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
		";

		try {
		 $con->exec($q);
		 print("Tabela criada users... <br>");
		}
		catch (PDOException $e) {
		 echo $e->getMessage();
		}

	}	

		//Adicionado usuarios adm
		$email = 'teste@teste.com';
		$senha = "123456";
		$senha_crypt = password_hash($senha,PASSWORD_DEFAULT);

		//Inserindo
		$sql = "INSERT INTO users(email,senha) VALUES (:email,:senha)";

		$stmt = $con->prepare($sql);
		                                              
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);       
		$stmt->bindParam(':senha', $senha_crypt, PDO::PARAM_STR);
		                                      
		$stmt->execute();


		print("Adicionando dados... <br>");

		// Empresa
		$texto = '<h2>Empresa<small> Institucional</small></h2> 
				<p>O Citi tem mais de 200 anos, o que reafirma a solidez e a perenidade dos negócios da organização – uma marca global com uma rede inigualável para atender a clientes em qualquer parte do mundo –, que desempenha papel central no desenvolvimento e financiamento da economia mundial.</p>';
		$sesao = 'Empresa';
		$uri = 'empresa';

		//Inserindo
		$sql = "INSERT INTO $tabela(texto,secao,uri) VALUES (:texto,:secao,:uri)";
		                                          
		$stmt = $con->prepare($sql);
		                                              
		$stmt->bindParam(':texto', $texto, PDO::PARAM_STR);       
		$stmt->bindParam(':secao', $sesao, PDO::PARAM_STR);
		$stmt->bindParam(':uri', $uri, PDO::PARAM_STR); 
		                                      
		$stmt->execute();


		print("Adicionando dados... <br>");

		// produtos
		$texto = '<h2>Produtos<small> Conheceça nossos produtos</small></h2> 
		<p>Torna-se inegável o fato de que todos nós, em uma determinada ocasião, já tenhamos nos deparado com algum manual de instrução, não é verdade?<br><br>

Pois bem, tal modalidade está relacionada à grande diversidade de gêneros textuais com os quais compartilhamos cotidianamente, os chamados textos instrucionais. Quanto à finalidade presente no discurso, eles têm por objetivo instruir o leitor acerca de um determinado procedimento.<br><br> 

Como exemplos representativos, podemos citar uma infinidade deles: receitas culinárias, bulas de medicamentos, manuais de instrução relacionados a aparelhos eletroeletrônicos, guias e mapas rodoviários, editais de concursos públicos, manuais referentes a jogos com um todo, dentre outros.</p>';
		$sesao = 'Produtos';
		$uri = 'produtos';

		//Inserindo
		$sql = "INSERT INTO $tabela(texto,secao,uri) VALUES (:texto,:secao,:uri)";
		                                          
		$stmt = $con->prepare($sql);
		                                              
		$stmt->bindParam(':texto', $texto, PDO::PARAM_STR);       
		$stmt->bindParam(':secao', $sesao, PDO::PARAM_STR); 
		$stmt->bindParam(':uri', $uri, PDO::PARAM_STR); 
		                                      
		$stmt->execute();		

		print("Adicionando dados... <br>");

		// Serviços
		$texto = '<h2>Serviços<small> Nossa área de atuação</small></h2>
		<p>Encerrando nossa conversa para o concurso da Caixa, venho deixar minhas últimas dicas e como prometido, falar um pouco do texto instrucional, já que os anteriores (descritivo, narrativo e expositivo-argumentativo) detalhei nos artigos que aqui deixei.<br><br>

            Bem, inicialmente é preciso fazer você entender que não precisa ter medo de certos termos que aparecem em uma prova de redação, assim se aparecer o nome instrucional (ou até injuntivo) não é nada de outro mundo, basta você saber que os textos dessa natureza têm um propósito de ensinar, de dar orientações ao leitor. Alguns exemplos dos textos injuntivos: a receita, a bula, as cartilhas e também os manuais de instrução. Então, vamos ver algumas características desses textos.</p>';
		$sesao = 'Serviços';
		$uri = 'servicos';

		//Inserindo
		$sql = "INSERT INTO $tabela(texto,secao,uri) VALUES (:texto,:secao,:uri)";
		                                          
		$stmt = $con->prepare($sql);
		                                              
		$stmt->bindParam(':texto', $texto, PDO::PARAM_STR);       
		$stmt->bindParam(':secao', $sesao, PDO::PARAM_STR); 
		$stmt->bindParam(':uri', $uri, PDO::PARAM_STR); 
		                                      
		$stmt->execute();


		echo "<script>
		alert('Dados cadastrados com sucesso!');
		window.location.href = '/';
		</script>";

}


