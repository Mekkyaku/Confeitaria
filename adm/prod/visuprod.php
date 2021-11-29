<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <title>Visualizar produto ・ Alima</title>
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
                ?>
                    <br>
                <h1>Dados do Produto</h1>

                    <br>

                <p style="margin-left:105px;"><b>ID: </b><?php echo $_GET["idProduto"]; ?> 
                <p style="margin-left:105px;"><b>Produto: </b><?php echo $_GET["produto"]; ?> 
                <p style="margin-left:105px;"><b>Descrição: </b><?php echo $_GET["descricaoProduto"]; ?> 
                <p style="margin-left:105px;"><b>Preço venda: </b><?php echo $_GET["precoVenda"]; ?>

                <?php 
                    if ($_GET["promocao"]=="s"){
                        echo "<p style='margin-left:105px;'><b>Promoção: </b> Sim";
                    }
                    if ($_GET["promocao"]=="n"){
                        echo "<p style='margin-left:105px;'><b>Promoção: </b> Não";
                    }
                ?>

                <p style="margin-left:105px;"><b>Preço promoção: </b><?php echo $_GET["precoPromocao"]; ?></p>
                
                <img class="up" width="300" src="../../img/<?php echo $_GET["nomeFoto"]; ?>">

                    <br>

                <form action="produtos.php" style="text-align:center">
                    <button type="submit" class="btn btn-danger">Voltar</button>
                </form>

                <br>

    </div>

    <br><br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
