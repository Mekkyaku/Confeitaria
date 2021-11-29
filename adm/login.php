<!--Desenvolvido por: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu -->

<!DOCTYPE HTML>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Alima</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="styleadm.css">
        <link href="../img/logo.png" rel="icon">
    </head>

    <body>
        <div class="admb">
            <img src="../img/logo.png" class="login">

            <div class="scroll">
                    <br><br><br><br><br>
                
                <h1>Log-in</h1>
                
                    <br>

                <?php
                    session_start();
                        if ((isset($_SESSION["logado"])) && ($_SESSION["logado"] == TRUE)){
                            header("Location: index.php");
                        }
                        else{
                            if ((isset($_POST["email"])) && (isset($_POST["senha"]))){
                                $conexao = mysqli_connect("localhost","root","","alimaBD");
                                $sql = "SELECT *  FROM `tbFunc`;";
                                $resultado = mysqli_query($conexao,$sql);

                                if (!($linha = mysqli_fetch_array($resultado))){
                                    $sql = "ALTER TABLE `tbfunc` AUTO_INCREMENT=0;";
                                    $resultado = mysqli_query($conexao,$sql);
                                
                                    $email="supervisor@supervisor.com";
                                    $senha="supervisor";
                        
                                    $sql="INSERT INTO `tbfunc` (`idFunc`, `email`, `senha`, `nome`, `funcao`) VALUES (NULL, '$email', '$senha', 'supervisor', 'gerente');";
                                    $resultado = mysqli_query($conexao,$sql);
                                }
                    
                                $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                                $senha= $_POST["senha"];

                                $sql_code = "SELECT * FROM `tbFunc` WHERE `email` = '$email' LIMIT 1";
                                $sql_exec = $conexao->query($sql_code) or die($conexao->error);

                                $usuario = $sql_exec->fetch_assoc();
                                if(password_verify($senha, $usuario['senha'])){
                                    if ($usuario['ativo'] == 's'){                        
                                    $_SESSION["idFunc"] = $usuario["idFunc"];				
                                    $_SESSION["logado"] = TRUE;
                                    $_SESSION["funcao"] = $usuario["funcao"];
                                    $_SESSION["nome"] = $usuario["nome"];
                                    header("Location: index.php");
                                    }
                                }
                                else{ 
                                    ?>
                                    <p class="msg" id="msg"></p>
                                    <script>document.getElementById('msg').innerHTML = "E-mail ou senha inválidos!"</script>
                                    <?php 
                                            }
                                        }
                                    }	
                                    ?>
                
                <form action="login.php" method="post">
                    <label for="email" class="login">E-mail:</label> 
                        <input type=text name="email" autocomplete="off" required onclick="document.getElementById('msg').innerHTML = ''"> <br><br>
                    <label for="senha" class="login" style="margin-left:102px">Senha:</label> 
                        <input type=password name="senha" autocomplete="off" required onclick="document.getElementById('msg').innerHTML = ''"> <br><br><br>
                    <input class="btn btn-dark" type="submit" value="Log-in" style="margin-left:212px">
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>