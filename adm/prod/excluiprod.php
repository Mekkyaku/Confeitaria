<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <title>Excluir produto | Alima</title>
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
                    if (($_SESSION["funcao"] != "gerente")){
                        header("Location: ../login.php");
                    }
                    if (isset($_POST["idProduto"])) {
                        $conexao = mysqli_connect("localhost", "root", "", "alimaBD");
                        
                        $sql = "UPDATE `tbproduto` SET `ativo` = 'n' WHERE `tbproduto`.`idProduto` = ".$_POST["idProduto"].";";
                        $resultado = mysqli_query($conexao,$sql);
                        header("Location: produtos.php");
                    }
                ?>
                    <br>
                <h1>Excluir produto</h1>

                    <br>
                
                <p style="margin-left:155px;"><b>ID: </b><?php echo $_GET["idProduto"]; ?> <p></p> 
                <p style="margin-left:155px;"><b>Produto: </b><?php echo $_GET["produto"]; ?> <p></p>
                <p style="margin-left:155px;"><b>Descrição: </b><?php echo $_GET["descricaoProduto"]; ?> <p></p>
                <p style="margin-left:155px;"><b>Preço venda: </b><?php echo $_GET["precoVenda"]; ?> <p></p>

                <?php
                    if ($_GET["promocao"]=="s"){
                        echo "<p style='margin-left:155px;'><b>Promoção: </b> Sim";
                    }
                    if ($_GET["promocao"]=="n"){
                        echo "<p style='margin-left:155px;'><b>Promoção: </b> Não";
                    }
                ?>

                <p style="margin-left:155px;"><b>Preço promoção: </b><?php echo $_GET["precoPromocao"]; ?> <p></p>
                <img class="up" width="300" src="../../img/<?php echo $_GET["nomeFoto"]; ?>"><p></p>
                
                <form action="excluiprod.php" method="post">
                    <input type="hidden" name="idProduto" value="<?php echo $_GET["idProduto"];?>">
                    <button type="submit" class="btn btn-dark" style="margin-left:205.5px">Excluir</button>
                </form>

                <br>

                <form action="produtos.php" style="text-align:center">
                    <button type="submit" class="btn btn-danger">Voltar</button>
                </form>

                <br>

            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
