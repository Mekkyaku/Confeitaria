<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<?php
	session_start();
	if (!isset($_SESSION["logado"])||($_SESSION["logado"]!= TRUE)) {
		header("Location: ../login.php");
	}
	if (($_SESSION["funcao"] != "gerente")){
		header("Location: ../login.php");
	}
		
	if ($_POST["acao"]==="incluir")	{
		$conexao = mysqli_connect("localhost", "root", "", "alimaBD");
					
		$produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_SPECIAL_CHARS);					
		$descricaoProduto = filter_input(INPUT_POST, 'descricaoProduto', FILTER_SANITIZE_SPECIAL_CHARS);
		$precoVenda = filter_input(INPUT_POST, 'precoVenda', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);	
					
		$sql =  "INSERT INTO `tbproduto` ".
				"(`idProduto`, `ativo`, `produto`,".
				"`descricaoProduto`, `precoVenda`, ".
				"`promocao`, `precoPromocao`, `nomeFoto`) ".
				"VALUES (NULL, 's', '$produto', '$descricaoProduto', ".
				"'$precoVenda', 'n', '0.0', '../../img/semfoto.png');";

		$resultado = @mysqli_query($conexao, $sql);
		$idProduto = mysqli_insert_id($conexao);

		if (!$resultado) {
			die('Query Inválida: ' . @mysqli_error($conexao));
			echo "<form action='produtos.php'>";
				echo "<button type='submit'>Voltar</button>";
			echo "</form>";
		}

		mysqli_close($conexao);
	} 
	elseif ($_POST["acao"]==="alterar") {
		$conexao = mysqli_connect("localhost", "root", "", "alimaBD");
				
		$idProduto = $_POST["idProduto"];
		$produto = $_POST['produto'];					
		$descricaoProduto = $_POST['descricaoProduto'];
		$precoVenda = $_POST['precoVenda'];	

		$sql = "UPDATE `tbproduto` SET".
			   "`ativo` = 's',".
			   "`produto` = '$produto',".
		       "`descricaoProduto` = '$descricaoProduto',".
		       "`precoVenda` = '$precoVenda' ".
		       "WHERE `tbproduto`.`idProduto` = $idProduto;";
			   echo $idProduto;
			   echo $sql;
		
		$resultado = @mysqli_query($conexao, $sql);
		if (!$resultado) {
			die('Query Inválida: ' . @mysqli_error($conexao));
			echo "<form action='produtos.php'>";
				echo "<button type='submit'>Voltar</button>";
			echo "</form>";				
		} 
		mysqli_close($conexao);
		
	} 
	else {
		echo "<h1>Erro na Operação. Não foi possível alterar ou incluir</h1>";
			echo "<form action='produtos.php'>";
		echo "<button type='submit'>Voltar</button>";
		echo "</form>";
	}
		
	if ( isset( $_FILES[ 'imagemProduto' ][ 'name' ] ) && ($_FILES[ 'imagemProduto' ][ 'error' ] == 0 )) {
		
		$arquivo_tmp = $_FILES[ 'imagemProduto' ][ 'tmp_name' ];
		$nome = $_FILES[ 'imagemProduto' ][ 'name' ];
 	
		$extensao = strtolower ( pathinfo ( $nome, PATHINFO_EXTENSION ) );
 
		if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) { 
        	$novoNome = uniqid ( time () ) . '.' . $extensao;
			$destino = '../../img/'.$novoNome;
			
			if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
				$conexao = mysqli_connect("localhost", "root", "", "alimaBD");
				
				if($_POST["acao"]==="alterar"){
					$idProduto = $_POST["idProduto"];
				}

				$sql =  "UPDATE `tbproduto` SET".
					"`nomeFoto` = '$novoNome' ".
					"WHERE `tbproduto`.`idProduto` = $idProduto;";
		
				$resultado = @mysqli_query($conexao, $sql);

				if (!$resultado) {
					die('Query Inválida: ' . @mysqli_error($conexao));
					echo "<form action='produtos.php'>";
						echo "<button type='submit'>Voltar</button>";
					echo "</form>";				
				} 
				mysqli_close($conexao);

				$nomeFotoAntiga = $_POST["nomeFotoAntiga"];
				if (file_exists("../../img/".$nomeFotoAntiga)&&($nomeFotoAntiga!=="semfoto.png")) {
					unlink("../../img/".$nomeFotoAntiga);
				}				
				
				header("Location: produtos.php");

        	} 
			else {
				echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
				echo "<form action='produtos.php'>";
					echo "<button type='submit'>Voltar</button>";
				echo "</form>";	
			}
		} 
		else {
			echo "<p>Somente são permitidos extensões: .jpg;.jpeg;.gif;.png</p>";
			echo "<form action='produtos.php'>";
				echo "<button type='submit'>Voltar</button>";
			echo "</form>";	
		}
	} 
	else {
		header("Location: produtos.php");
	}
?>