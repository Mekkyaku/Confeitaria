<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Carrinho | Alima</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../adm/styleadm.css">
        <link href="../img/logo.png" rel="icon">
    </head>

    <body>
        <div class="admb">

        <img src="../img/logo.png" class="login">
            <div class="scroll">
                <?php
                    session_start();
                    unset($_SESSION['carrinho']);
                    $_SESSION['carrinho'] = array();
                    echo "<br><br><br><br><br><h1>Compra registrada com sucesso!</h1><br><p class='msg'>Agradecemos sua preferência! <3</p>";
                ?>

                <br>

                <form action="../cardapio.php" style="text-align:center">
                    <button class="btn btn-dark" type="submit">Continuar compra</button>
                </form>
            </div>
        </div>
    </body>
</html>