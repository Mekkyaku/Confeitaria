<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <title>Editar produto | Alima</title>
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
                <h1>Editar produto</h1>

                <form enctype="multipart/form-data" action="upload.php" method="post">

                    <input type="hidden" name="acao" value="alterar">
                    <input type="hidden" name="idProduto" value="<?php echo $_GET["idProduto"]; ?>">
                    
                    <label for="produto" style="margin-left:92px">Produto:</label>
                        <input type="text" name="produto" value="<?php echo $_GET["produto"]; ?>"> <p></p>
                    <label for="descricaoProduto" style="margin-left:81px">Descrição:</label>
                        <input type="text" name="descricaoProduto" value="<?php echo $_GET["descricaoProduto"]; ?>"><p></p>
                    <label for="precoVenda" style="margin-left:62px">Preço venda:</label>
                        <input type="text" name="precoVenda" value="<?php echo $_GET["precoVenda"]; ?>"><p></p>
                    
                    <input type="hidden" name="nomeFotoAntiga" value="<?php echo $_GET["nomeFoto"]; ?>">
                
                    <label for="imagemProduto" style="margin-left:62px">Imagem:</label>
                        <input type="file" name="imagemProduto" id="img-input"><p></p>
                    <img class="up" width="300" src="../../img/<?php echo $_GET["nomeFoto"]; ?>" id="preview"><p></p>
                    <button type="submit" class="btn btn-dark" style="margin-left:207px">Editar</button>
                </form>

                <br>

                <form action="produtos.php" style="text-align:center">
                    <button type="submit" class="btn btn-danger">Voltar</button>
                </form>

                <br>

                <script>
                    document.getElementById("img-input").onchange = function () {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            document.getElementById("preview").src = e.target.result;
                        };

                        reader.readAsDataURL(this.files[0]);
                    };
                </script>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
