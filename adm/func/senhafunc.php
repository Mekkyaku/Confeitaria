<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<!DOCTYPE html>

<html>

    <head>
        <title>Alterar senha | Alima</title>
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
                    
                    if(isset($_POST["idFunc"])) {
                        if (($_SESSION["funcao"]==="gerente")) {
                            $idFunc = $_POST["idFunc"];
                            $senhaNova = password_hash($_POST["senhaNova"], PASSWORD_DEFAULT);
                                    
                            $conexao = mysqli_connect("localhost", "root", "", "alimaBD");
                            $sql =  "UPDATE `tbfunc` SET `senha` = '$senhaNova' WHERE `tbfunc`.`idFunc` = $idFunc;";
                            echo $sql;
                            
                            $resultado = @mysqli_query($conexao, $sql);
                            if (!$resultado) {
                                die('Query Inválida: ' . @mysqli_error($conexao));
                                echo "<form action='funcionarios.php'> onsubmit='window.onsubmit = function() { return true; };'";
                                echo "<button type='submit'>Voltar</button>";
                                echo "</form>";
                            }
                            mysqli_close($conexao);
                            if ($_SESSION["idFunc"]==$idFunc) {
                                session_destroy();
                                header("Location: ../login.php");
                            }
                            header("Location: funcionarios.php");
                        } else {
                            $conexao = mysqli_connect("localhost", "root", "", "alimaBD");
                                    
                            $idFunc = $_SESSION["idFunc"];
                            $senhaNova = $_POST["senhaNova"];
                            $senhaAntiga = $_POST["senhaAntiga"];
                                
                            $dados="idFunc=".$_POST["idFunc"].
                                    "&nome=".$_POST["nome"].
                                    "&email=".$_POST["email"];
                            
                            $sql = "SELECT * FROM `tbfunc` WHERE `tbfunc`.`idFunc` = '$idFunc' and `tbfunc`.`senha`='$senhaAntiga'";

                            $resultado = @mysqli_query($conexao, $sql);

                            if (!$linha = mysqli_fetch_array($resultado)) { 
                                $dados="idFunc=".$_POST["idFunc"].
                                "&nome=".$POST["nome"].
                                "&email=".$_POST["email"];
                                mysqli_close($conexao);				
                                header("Location: senhafunc.php?senhaAntigaInvalida=true&&$dados");
                            } else {
                                $sql =  "UPDATE `tbfunc` SET `senha` = '$senhaNova' WHERE `tbfunc`.`idFunc` = $idFunc;";
                                $resultado = @mysqli_query($conexao, $sql);
                                session_destroy();
                                header("Location: ../login.php");
                            }
                        
                        }
                    }
                ?>
                    <br><br>
                <h1> Alterar senha</h1>
                <p class="msg" id="mensagem"></p>

                <br>

                <form action="senhafunc.php" method="post" onsubmit="verificarDados()">
                    <input type="hidden" name="idFunc" value="<?php echo $_GET["idFunc"]; ?>">
                    <input type="hidden" name="email" value="<?php echo $_GET["email"]; ?>">
                    <input type="hidden" name="nome" value="<?php echo $_GET["nome"]; ?>">
                    
                    <p style="margin-left:105px;"><b>E-mail: </b><?php echo $_GET["email"]; ?></p>
                    <p style="margin-left:105px;"><b>Nome: </b><?php echo $_GET["nome"]; ?> </p>
                    <?php if ($_SESSION["funcao"]!=="gerente") { ?>
                    <label for="senhaAntiga" style="margin-left:53px">Senha antiga:</label>
                        <input type="password" name="senhaAntiga" id="input-senhaAntiga" onclick="document.getElementById('mensagem').innerHTML = ''"><p></p> <?php } ?>
                    <label for="senhaNova" style="margin-left:64px">Senha nova:</label>
                        <input type="password" name="senhaNova" id="input-senhaNova"><p></p>
                    <label for="confirmaSenhaNova" style="margin-left:30px">Confirmar senha:</label>
                        <input type="password" name="confirmaSenhaNova" id="input-confirmaSenhaNova"><p></p>
                    
                    <button type="submit" class="btn btn-dark" style="margin-left:212px">Alterar</button>
                </form>

                <br>
                            
                <form action="funcionarios.php" onsubmit="window.onsubmit = function() { return true; };" style="text-align:center">
                    <button type="submit" class="btn btn-danger">Voltar</button>
                </form>
                
                <br>

                <script>

                    function verificarDados() {
                        var senhaNova = document.getElementById("input-senhaNova").value;
                        var confirmaSenhaNova = document.getElementById("input-confirmaSenhaNova").value;
                        if (senhaNova.length<6) {
                            alert("A senha deve ter no mínimo 6 digitos!");
                            
                            document.getElementById("input-senhaNova").focus();
                            window.onsubmit = function() { return false; }
                            
                        }
                        else 
                        
                        if (senhaNova!==confirmaSenhaNova) {
                            alert("As senha não coincidem!");
                        
                            document.getElementById("input-confirmaSenhaNova").focus();
                            window.onsubmit = function() { return false; };
                            
                        } 
                        else {
                            window.onsubmit = function() { return true; };
                        }
                    }

                    <?php
                        if(isset($_GET["senhaAntigaInvalida"])){ ?>
                            var senhaAntigaInvalida =  <?php echo "\"".$_GET["senhaAntigaInvalida"]."\"";?>;
                            document.getElementById('mensagem').innerHTML = "Senha antiga inválida!";<?php		
                        } 
                    ?>

                </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

</html>
