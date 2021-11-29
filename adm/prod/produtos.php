<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <title>Produtos | Alima</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../styleadm.css">
        <link href="../../img/logo.png" rel="icon">
    </head>

    <body>
        <div class="admb" style="width:1200px">
            <img src="../../img/logo.png" class="login" style="margin-left:50px">
            
            <div class="scroll" style="width:700px">
                <?php
                    session_start();
                    if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
                        header("Location: ../login.php");
                    }
                    if (($_SESSION["funcao"] != "gerente")){
                        header("Location: ../login.php");
                    }

                    $conexao = mysqli_connect("localhost", "root", "", "alimaBD");
                    $sql = "SELECT * FROM `tbproduto` where ativo='s'order by produto";
                    $resultado = mysqli_query($conexao,$sql); 

                ?>

                <h1>Produtos</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Produto</th>
                            <th scope="col" width=200px>Descrição</th>
                            <th scope="col">Preço venda</th>
                            <th scope="col">Promoção</th>
                            <th scope="col">Preço promoção</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($linha = mysqli_fetch_array($resultado)){
                            echo "<tr>";
                            echo "<th scope='row'>".$linha["idProduto"]."</th>";
                            echo "<td width=150px><img width=100% src='../../img/".$linha["nomeFoto"]."'></td>";
                            echo "<td>".$linha["produto"]."</td>";
                            echo "<td>".$linha["descricaoProduto"]."</td>";
                            echo "<td>".$linha["precoVenda"]."</td>";

                            if ($linha["promocao"]=="s"){
                                echo "<td>Sim</td>"; 
                            }
                            if ($linha["promocao"]=="n"){
                                echo "<td>Não</td>";
                            }

                            echo "<td>".$linha["precoPromocao"]."</td>";
                                $dados="idProduto=".$linha["idProduto"].
                                "&produto=".$linha["produto"].
                                "&descricaoProduto=".$linha["descricaoProduto"].
                                "&precoVenda=".$linha["precoVenda"].
                                "&promocao=".$linha["promocao"].
                                "&precoPromocao=".$linha["precoPromocao"].
                                "&nomeFoto=".$linha["nomeFoto"];
                            echo "<td width=110px>".
                                "<a style='text-decoration: none'href=\"visuprod.php?$dados\"><img width=20px src=\"../../img/visu.png\"> </a>".
                                "<a style='text-decoration: none'href=\"editprod.php?$dados\"><img width=20px src=\"../../img/editar.png\"> </a>".
                                "<a style='text-decoration: none'href=\"excluiprod.php?$dados\"><img width=20px src=\"../../img/deletar.png\"> </a>".
                                "<a style='text-decoration: none'href=\"promoprod.php?$dados\"><img width=20px src=\"../../img/promo.png\"> </a>".
                                "</td>";
                        ?>

                        <?php     
                            echo "</td>";
                            echo "</tr>";
                        }

                            mysqli_close($conexao);
                        ?>
                    </tbody>
                </table>

                <br>

                <form action="addprod.php" style="text-align:center">
                    <button type="submit" class="btn btn-dark">Adicionar</button>
                </form>

                <br>
            
                <form action="../index.php" style="text-align:center">
                    <button type="submit" class="btn btn-danger">Voltar</button>
                </form>

                <br>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
