<?php
	session_start();
        if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
            header("Location: login.php");
        }
?>

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <title>Admin・Alima</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <h1> Confeitaria Alima - Administração</h1>
        
        <?php
            echo "<h1>Seja Bem-Vindo!, ".$_SESSION["nome"]."</h1>";
                if (($_SESSION["funcao"] === "gerente")) {
        ?>

            <form action="prod/produtos.php">
                <button type="submit">Produtos</button> <br>
            </form>

        <?php 
                }
        ?>

            <form action="func/funcionarios.php">
                <button type="submit">Funcionários</button> <br>
            </form> 
        
            <form action="logout.php">
                <button type="submit">Logout</button>
            </form>	

    </body>

</html> 