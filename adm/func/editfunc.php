<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<!DOCTYPE html>

<html lang="pt-BR">
	<head>
		<title>Editar funcionário | Alima</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
        <link rel="stylesheet" href="../styleadm.css">
		<link href="../../img/logo.png" rel="icon">
	</head>

	<body>
		<div class="admb">
			<img src="../../img/logo.png" class="login">

			<div class="scroll">
				<?php
					session_start();
					if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
						header("Location: ../login.php");
					}

					if(isset($_POST["idFunc"])) {
						if (($_SESSION["funcao"]==="gerente")) {
							$idFunc = $_POST["idFunc"];
							$nomeNovo = $_POST["nomeNovo"];
							$emailNovo = $_POST["emailNovo"];

							if ($_SESSION["idFunc"]!=$idFunc) {
								$funcaoNovo = $_POST["funcaoNovo"];
								$sql =  "UPDATE `tbfunc` SET `nome` = '$nomeNovo', `email`='$emailNovo', `funcao`='$funcaoNovo' WHERE `tbfunc`.`idFunc` = $idFunc;";
							}
							else {
								$sql =  "UPDATE `tbfunc` SET `nome` = '$nomeNovo', `email`='$emailNovo' WHERE `tbfunc`.`idFunc` = $idFunc;";
							}	
							
							$conexao = mysqli_connect("localhost", "root", "", "alimaBD");
							$resultado = @mysqli_query($conexao, $sql);

							if (!$resultado) {
								die('Query Inválida: ' . @mysqli_error($conexao));
								echo "<form action='funcionarios.php'> onsubmit='window.onsubmit = function() { return true; };'";
									echo "<button type='submit'>Voltar</button>";
								echo "</form>";
							}

							mysqli_close($conexao);
							if ($_SESSION["idFunc"]==$idFunc) {
								session_destroy();
								header("Location: ../login.php");
							}

							header("Location: funcionarios.php");
						} 
						else {
							$idFunc = $_POST["idFunc"];
							$nomeNovo = filter_input(INPUT_POST, 'nomeNovo', FILTER_SANITIZE_SPECIAL_CHARS);
							$emailNovo = filter_input(INPUT_POST, 'emailNovo', FILTER_SANITIZE_EMAIL);
							
							$sql =  "UPDATE `tbfunc` SET `nome` = '$nomeNovo', `email`='$emailNovo' WHERE `tbfunc`.`idFunc` = $idFunc;";
							$conexao = mysqli_connect("localhost", "root", "", "alimaBD");
							
						echo $sql;	
							$resultado = @mysqli_query($conexao, $sql);
							if (!$resultado) {
								die('Query Inválida: ' . @mysqli_error($conexao));
								echo "<form action='funcionarios.php'> onsubmit='window.onsubmit = function() { return true; };'";
									echo "<button type='submit'>Voltar</button>";
								echo "</form>";
							}

							mysqli_close($conexao);
							session_destroy();
							header("Location: ../login.php");
									
						}
					}
				?>
					<br><br><br>
				<h1>Editar funcionário</h1>
				<p class="msg" id="mensagem"></h2>

					<br>

				<form  action="editfunc.php" method="post" onsubmit="verificarDados()">

					<input type="hidden" name="idFunc" value="<?php echo $_GET["idFunc"]; ?>">
					<input type="hidden" name="email" value="<?php echo $_GET["email"]; ?>">
					<input type="hidden" name="nome" value="<?php echo $_GET["nome"]; ?>">
					
					<label for="emailNovo" style="margin-left:104px">E-mail:</label>
						<input type="email" name="emailNovo" value="<?php echo $_GET["email"]; ?>" id="input-email"><p></p>
					<label for="nomeNovo" style="margin-left:104px">Nome:</label>
						<input type="text" name="nomeNovo" value="<?php echo $_GET["nome"]; ?>" id="input-nome"><p></p><p></p>
					
					<?php
						if (($_SESSION["funcao"]==="gerente")&&($_SESSION["idFunc"]!=$_GET["idFunc"])) {?>
							<label for="funcaoNovo" style="margin-left:99px">Função:</label>
								<input type="radio" name="funcaoNovo" value="gerente" <?php if($_GET["funcao"]==="gerente"){ echo "checked";}?>>Gerente<br> 
								<input type="radio" name="funcaoNovo" value="vendedor" style="margin-left:157px"  <?php if($_GET["funcao"]==="vendedor"){ echo "checked";}?>>Vendedor<br> 
								<input type="radio" name="funcaoNovo" value="caixa" style="margin-left:157px" <?php if($_GET["funcao"]==="caixa"){ echo "checked";}?>>Caixa<br><br><?php
						} 
					?>

					<button type="submit" class="btn btn-dark" style="margin-left:216px">Editar</button>
				</form>

				<br>

					<form action="funcionarios.php" style="text-align:center">
						<button type="submit" class="btn btn-danger">Voltar</button>
					</form>
				
				<br>

				<script>
					function verificarDados() {
						var email = document.getElementById("input-email").value;
						var nome = document.getElementById("input-nome").value;
						if (!validarEmail(email)) {
							alert("Digite um email válido!");
							document.getElementById("input-email").focus();
							window.onsubmit = function() { return false; };	
							
						} else if (nome.length<3) {
							alert("O nome deve ter no mínimo 3 caracteres!");
							document.getElementById("input-nome").focus();
							window.onsubmit = function() { return false; };

						} else {
							return true;
						}
					}

				<?php
					if(isset($_GET["senhaAntigaInvalida"])){ ?>
						var senhaAntigaInvalida =  <?php echo "\"".$_GET["senhaAntigaInvalida"]."\"";?>;
						document.getElementById('mensagem').innerHTML = "Senha antiga inválida!";<?php		
					} 
				?>

				</script>
			</div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>
