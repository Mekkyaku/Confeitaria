<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <title>Adicionar funcionário ・ Alima</title>
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

                    if(isset($_POST["email"])&&($_POST["email"]!=="")){
                        $conexao = mysqli_connect("localhost", "root", "", "alimaBD");
                                    
                        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                        $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
                        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
                        $funcao = $_POST["funcao"];
                        
                        $sql = "SELECT * FROM `tbfunc` WHERE `email` = '$email'";

                        $resultado = @mysqli_query($conexao, $sql);
                        if ($linha = mysqli_fetch_array($resultado)) { 
                            mysqli_close($conexao);
                            header("Location: addfunc.php?emailJaCadastrado=".$linha["email"]);
                        }
                        else {		    
                            
                            $sql =  "INSERT INTO `tbFunc` ".
                                    "(`idFunc`, `ativo`, `email`,".
                                    "`senha`, `nome`, ".
                                    "`funcao`) ".
                                    "VALUES (NULL, 's', '$email', '$senha', ".
                                    "'$nome', '$funcao');";
                                    
                                    $resultado = @mysqli_query($conexao, $sql);
                                    if (!$resultado) {
                                        die('Query Inválida: ' . @mysqli_error($conexao));
                                        echo "<form action='funcionarios.php' onsubmit='window.onsubmit = function() { return true; };'>";
                                        echo "<button type='submit'>Voltar</button>";
                                        echo "</form>";
                                    }
                            mysqli_close($conexao);
                            header("Location: funcionarios.php");
                        }
                    }
                ?>
                    <br>
                <h1>Adicionar funcionário</h1>
                <p class="msg" id="mensagem"></p>

                    <br>

                <form  action="addfunc.php" method="post" onsubmit="verificarDados()">
                    <label for="email" style="margin-left:104px">E-mail:</label>
                        <input type="text" name="email" id="input-email" onclick="document.getElementById('mensagem').innerHTML = ''"><p></p>
                    <label for="senha" style="margin-left:104px">Senha:</label>
                        <input type="password" name="senha" id="input-senha"><p></p>
                    <label for="confirmaSenha" style="margin-left:30px">Confirmar senha:</label>
                        <input type="password" name="confirmaSenha" id="input-confirmaSenha"><p></p>
                    <label for="nome" style="margin-left:103px">Nome:</label>
                        <input type="text" name="nome" id="input-nome"><p></p>
                    <label for="funcao" style="margin-left:96px">Função:</label>
                        <input type="radio" name="funcao" value="gerente"> Gerente<br>
                        <input type="radio" name="funcao" value="vendedor" style="margin-left:155px"> Vendedor<br>
                        <input type="radio" name="funcao" value="caixa" style="margin-left:155px"> Caixa<br><br>
                    <button type="submit" class="btn btn-dark" style="margin-left:193px">Adicionar</button>
                </form>

                    <br>

                <form action="funcionarios.php" onsubmit="window.onsubmit = function() { return true; };" style="text-align:center">
                    <button type="submit" class="btn btn-danger">Voltar</button>
                </form>
        
                <br>

                <script>
                    function validarEmail(email) {
                        var re = /\S+@\S+\.\S+/;
                        return re.test(email);
                    }

                    function verificarDados() {
                        var email = document.getElementById("input-email").value;
                        var senha = document.getElementById("input-senha").value;
                        var confirmaSenha = document.getElementById("input-confirmaSenha").value;
                        var nome = document.getElementById("input-nome").value;
                        if (!validarEmail(email)) {
                            alert("Digite um email válido!");
                            
                            document.getElementById("input-email").focus();
                            window.onsubmit = function() { return false; };	
                            
                        } 
                        else 
                        
                        if (senha.length<6) {
                            alert("A senha deve ter no mínimo 6 digitos!");
                            
                            document.getElementById("input-senha").focus();
                            window.onsubmit = function() { return false; }
                            
                        } 
                        else 
                        
                        if (senha!==confirmaSenha) {
                            alert("A Senha e Confirma Senha devem ser iguais!");
                            
                            document.getElementById("input-confirmaSenha").focus();
                            window.onsubmit = function() { return false; };
                            
                        } 
                        else 
                        
                        if (nome.length<3) {
                            alert("O nome deve ter no mínimo 3 caracteres!");
                            
                            document.getElementById("input-nome").focus();
                            window.onsubmit = function() { return false; };

                        } else {
                            return true;
                        }
                    }

                    <?php
                        if(isset($_GET["emailJaCadastrado"])){ ?>
                            var emailJaCadastrado =  <?php echo "\"".$_GET["emailJaCadastrado"]."\"";?>;
                            document.getElementById('mensagem').innerHTML = "O e-mail '"+emailJaCadastrado+"' já foi cadastrado!";<?php		
                        } 
                    ?>
                </script>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
