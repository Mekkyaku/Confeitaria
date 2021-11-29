<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<!DOCTYPE html>

<html lang="pt-BR">
    <head> 
        <title>Promoção ・ Alima</title>
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
                    if (isset($_POST["novoPrecoPromocao"])) {
                        $conexao = mysqli_connect("localhost", "root", "", "alimaBD");
                        if($_POST["promocao"]==="n") {
                            $sql = "UPDATE `tbproduto` SET `promocao` = 's' , `precoPromocao`='".$_POST["novoPrecoPromocao"]."' WHERE `tbproduto`.`idProduto` = ".$_POST["idProduto"].";";
                        } 
                        else {
                            $sql = "UPDATE `tbproduto` SET `promocao` = 'n' WHERE `tbproduto`.`idProduto` = ".$_POST["idProduto"].";";
                        }
                        
                        $resultado = mysqli_query($conexao,$sql);
                        header("Location: produtos.php");
                    }
                ?>
                    <br>
                <h1>Promoção</h1>

                    <br>
 
                <p style="margin-left:105px;"><b>ID: </b><?php echo $_GET["idProduto"]; ?> <p></p> 
                <p style="margin-left:105px;"><b>Produto: </b><?php echo $_GET["produto"]; ?> <p></p>
                <p style="margin-left:105px;"><b>Descrição: </b><?php echo $_GET["descricaoProduto"]; ?> <p></p>
                <p style="margin-left:105px;"><b>Preço venda: </b><?php echo $_GET["precoVenda"]; ?> <p></p>

                <?php
                    if ($_GET["promocao"]=="s"){
                        echo "<p style='margin-left:105px;'><b>Promoção:</b> Sim";
                    }
                    if ($_GET["promocao"]=="n"){
                        echo "<p style='margin-left:105px;'><b>Promoção:</b> Não";
                    }
                ?>
                <p style="margin-left:105px;"><b>Preço promoção: </b><?php echo $_GET["precoPromocao"]; ?> <p></p>
                <img class="up" width="300" src="../../img/<?php echo $_GET["nomeFoto"]; ?>"><p></p>
                
                    <br>

                <form action="promoprod.php" method="post" onsubmit="verificarPreco()">
                    <input type="hidden" name="idProduto" value="<?php echo $_GET["idProduto"]; ?>">
                    <input type="hidden" name="promocao" value="<?php echo $_GET["promocao"]; ?>" id="htPromocao">
                    <input type="hidden" name="precoVenda" value="<?php echo $_GET["precoVenda"]; ?>" id="htPrecoVenda">
                    <input type="hidden" name="precoPromocao" value="<?php echo $_GET["precoPromocao"]; ?>">
                    <label for="novoPrecoPromocao" style="margin-left:15px"><b>Preço promoção: </b></label>
                        <input type="text" name="novoPrecoPromocao" value="<?php echo $_GET["precoPromocao"]; ?>" id="htPrecoPromocao"><p></p>
                    <button class="btn btn-dark" type="submit" value="Submit" style="margin-left:150px"><?php if($_GET["promocao"]==="n"){ echo "Colocar em promoção";} else { echo "Retirar da promoção";} ?></button><p></p>
                </form>

                <form action="produtos.php" style="text-align:center">
                    <button class="btn btn-danger" type='submit'>Voltar</button>
                </form>

                    <br>

                <script>
                    function verificarPreco() {
                        var promocao = document.getElementById("htPromocao").value;
                        var precoVenda = parseFloat(document.getElementById("htPrecoVenda").value);
                        var precoPromocao = parseFloat(document.getElementById("htPrecoPromocao").value);
                        var menorPrecoPossivel = precoVenda*0.70;
                        if ((precoPromocao<precoVenda)&&(precoPromocao>=menorPrecoPossivel)) {
                            return true;
                        } else {
                            alert("Preço de promoção: R$ "+precoPromocao+
                            "\nPreço de Promoção deve ser menor que o preço de venda: R$ "+
                            precoVenda+"\n e maior ou igual a R$ "+
                            menorPrecoPossivel);

                            window.onsubmit = function() { return false; };
                        }
                    }
                </script>
    </body>
</html>
