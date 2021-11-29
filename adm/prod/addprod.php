<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <title>Adicionar produto | Alima</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../styleadm.css">
        <link href="../../img/logo.png" rel="icon">
    </head>

    <body>
        <div class="admb" style="width:1000px">
            <img src="../../img/logo.png" class="login">

            <div class="scroll" style="width:600px">
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

                <h1>Adicionar produto</h1>

                <br>

                <form enctype="multipart/form-data" action="upload.php" method="post">
                    <input type="hidden" name="acao" value="incluir">
                    <label for="produto" style="margin-left:142px">Produto:</label>
                        <input type="text" name="produto"><br><br>
                    <label for="descricaoProduto" style="margin-left:131px">Descrição:</label>
                        <input type="text" name="descricaoProduto"><br><br>
                    <label for="precoVenda" style="margin-left:113px">Preço venda:</label>
                        <input type="text" name="precoVenda"><br><br>
                    <label for="imagemProduto" style="margin-left:142px">Imagem:</label>
                        <input type="file" name="imagemProduto" id="img-input"><br><br>
                        <img width="300" src="" id="preview" class="up"><br>
                    <button type="submit" class="btn btn-dark" style="margin-left:253px">Adicionar</button>
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
        <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>