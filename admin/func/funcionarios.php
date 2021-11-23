<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Dogão Lanches</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/meu.css">

        <script>
        </script>

        </head>
    <body>
    <?php
        session_start();
        if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
            header("Location: login.php");
        }

        //conectar com o banco de dados
        $conexao = mysqli_connect("localhost", "root", "", "alimaBD");
        if ($_SESSION["funcao"]==="gerente") {
            $sql = "SELECT * FROM `tbFunc` where `ativo`='s' order by nome";
        } else {
            $sql = "SELECT * FROM `tbFunc` where idFunc='".$_SESSION["idFunc"]."'";
        }
        $resultado = mysqli_query($conexao,$sql); 
    ?>
    <h1 align='center'>Lista de Produtos</h1>
    <table border=1 align=center width=90%>
    <thead>
        <tr>
        <th>#ID</th>
        <th>Nome</th>
        <th>email</th>
        <th>Função</th>
        <th>Ação</th>
        </tr>
    </thead>
    <tbody>
    <?php
        while($linha = mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td width='5%'>".$linha["idFunc"]."</td>";
            echo "<td width='20%'>".$linha["nome"]."</td>";
            echo "<td width='15%'>".$linha["email"]."</td>";
            echo "<td>".$linha["funcao"]."</td>";
            $dados="idFunc=".$linha["idFunc"].
                "&nome=".$linha["nome"].
                "&email=".$linha["email"].
                "&funcao=".$linha["funcao"];
        
            echo	"<td width=120>".
                    "<a href=\"trocarSenhaFuncionario.php?$dados\"><img width=\"20%\" src=\"trocarSenha.png\"> </a>".
                    "<a href=\"alterarFuncionario.php?$dados\"><img width=\"20%\" src=\"edit.png\"> </a>";
            if (($_SESSION["funcao"]==="gerente")&&($_SESSION["idFunc"]!=$linha["idFunc"])) { 
                echo "<a href=\"excluirFuncionario.php?$dados\"><img width=\"20%\" src=\"cancel.png\"> </a>";
            }
            echo "</td>";
            echo "</tr>";
        }

        mysqli_close($conexao);
    ?>

    </tbody>
    </table>
    <p></p>
    <form action="index.php">
    <button type='submit'>Voltar</button>
    </form>
    <p></p>
    <?php	
        if ($_SESSION["funcao"]==="gerente") { ?>
            <form action="incluirFuncionario.php">
            <button type='submit'>Novo Funcionário</button>
            </form><?php
        }?>	

    </body>
</html>
