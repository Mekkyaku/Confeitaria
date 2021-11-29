<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <title>Excluir funcionário | Alima</title>
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
                            $sql =  "UPDATE `tbfunc` SET `ativo` = 'n' WHERE `tbfunc`.`idFunc` = $idFunc;";
                            $conexao = mysqli_connect("localhost", "root", "", "alimaBD");
                            
                            $resultado = @mysqli_query($conexao, $sql);
                            if (!$resultado) {
                                die('Query Inválida: ' . @mysqli_error($conexao));
                                echo "<form action='funcionarios.php'> onsubmit='window.onsubmit = function() { return true; };'";
                                echo "<button type='submit'>Voltar</button>";
                                echo "</form>";
                            }
                            header("Location: funcionarios.php");
                        }
                    }
                ?>

                    <br><br>

                <h1>Excluir funcionário</h1>
                <p class="msg" id="mensagem"></p>

                    <br>

                <form action="excluifunc.php" method="post">

                    <input type="hidden" name="idFunc" value="<?php echo $_GET["idFunc"]; ?>">
                    
                    <p style="margin-left:155px;"><b>E-mail: </b><?php echo $_GET["email"]; ?></p>
                    <p style="margin-left:155px;"><b>Nome: </b><?php echo $_GET["nome"]; ?></p>
                    <p style="margin-left:155px;"><b>Função: </b><?php echo $_GET["funcao"];?></p><br>
                    
                    <button type="submit" class="btn btn-dark" style="margin-left:213.5px">Excluir</button>
                </form>

                <br>

                <form action="funcionarios.php" style="text-align:center">
                    <button type="submit" class="btn btn-danger">Voltar</button>
                </form>

                <br>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
