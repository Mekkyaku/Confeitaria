<!DOCTYPE html>

<html lang="pt-BR">

    <head>
        <title>Login・Alima</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="meu.css">
    </head>
        
    <body>
        <h1> Confeitaria Alima - Administração</h1>
        <h1 id="mensagem"></h1>
        
    <?php
        session_start();
        if ((isset($_SESSION["logado"]))&&($_SESSION["logado"]== TRUE)) {
            header("Location: index.php");
        } 
        else {
            if ((isset($_POST["email"]))&&(isset($_POST["senha"]))){

                $conexao = mysqli_connect("localhost", "root", "", "alimaBD");
                $sql = "SELECT * FROM `tbFunc`;";
                $resultado = mysqli_query($conexao,$sql);

                if (!($linha = mysqli_fetch_array($resultado))) {
                    $sql="ALTER TABLE `tbfunc` AUTO_INCREMENT = 0;";
                    $resultado = mysqli_query($conexao,$sql);
                                    
                    $email="supervisor@supervisor.com";
                    $senha="supervisor";
                    
                    $sql="INSERT INTO `tbfunc` (`idFunc`, `email`, `senha`, `nome`, `funcao`) VALUES (NULL, '$email', '$senha', 'supervisor', 'gerente');";
                    $resultado = mysqli_query($conexao,$sql);
                }
                
                $email=$_POST["email"];
                $senha=$_POST["senha"];    
                $sql = "SELECT * FROM `tbFunc` WHERE `ativo`='s' AND `email` = '$email' AND `senha` = '$senha'";
                $resultado = mysqli_query($conexao,$sql);

                if ($linha = mysqli_fetch_array($resultado)) {
                    $_SESSION["idFunc"] = $linha["idFunc"];				
                    $_SESSION["logado"] = TRUE;
                    $_SESSION["funcao"] = $linha["funcao"];
                    $_SESSION["nome"] = $linha["nome"];
                    header("Location: index.php");
                }
                else{ 
        ?>
        
        <script>document.getElementById('mensagem').innerHTML = "Email e/ou Senha inválidados!"</script>
        
        <?php 
                }
            }
        }	
        ?>

        <form action="login.php" method="post">
            Email <input type=text name="email" autocomplete="off" required onclick="document.getElementById('mensagem').innerHTML = ''"> <br>
            Senha <input type=password name="senha" autocomplete="off" required onclick="document.getElementById('mensagem').innerHTML = ''"> <br>
            <input type=submit value="Logar">
        </form>

    </body>

</html>



