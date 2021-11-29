<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<?php
	session_start();
        if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
            header("Location: login.php");
        }
?>

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <title>ADM | Alima</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="styleadm.css">
        <link href="../img/logo.png" rel="icon">
    </head>

    <body>
        <div class="admb">
            <img src="../img/logo.png" class="login">

            <div class="scroll">
                    <br><br>
                <h1>Administração Alima</h1>

                <?php
                    echo "<h3> Selecione abaixo a função que deseja utilizar: </h3>";
                        if (($_SESSION["funcao"] === "gerente")) {
                ?>

                    <br>
          
                <form action="prod/produtos.php" style="text-align:center">
                    <button type="submit" class="btn btn-dark">Produtos</button>
                </form>

                <?php 
                        }
                        else{
                ?>
                        <br>
                    <button type="submit" class="btn btn-dark" disabled style="margin-left:205px">Produtos</button><br>
                <?php 
                        }
                ?>

                    <br>

                <form action="func/funcionarios.php" style="text-align:center">
                    <button type="submit" class="btn btn-dark">Funcionários</button>
                </form>

                    <br>

                <form action="logout.php" style="text-align:center">
                    <button type="submit" class="btn btn-danger">Log-out</button>
                </form>

                    <br><br><br><br><br><br>

                <p class="footer">
                    <b>Desenvolvedores:</b> Adryan Welke da Silva, Felipe Rovigatti Delfino e Igor Henrique de Abreu
                </p>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

</html> 