<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <title>Funcionários | Alima</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <link rel="stylesheet" href="../styleadm.css">
            <link href="../../img/logo.png" rel="icon">
        </head>
        
    <body>
        <div class="admb">
            <?php
                session_start();
                    if (!isset($_SESSION["logado"])||$_SESSION["logado"]!= TRUE) {
                        header("Location: ../login.php");
                    }

                $conexao = mysqli_connect("localhost", "root", "", "alimaBD");

                if ($_SESSION["funcao"]==="gerente") {
                    $sql = "SELECT * FROM `tbFunc` where `ativo`='s' order by nome";
                }
                else{
                    $sql = "SELECT * FROM `tbFunc` where idFunc='".$_SESSION["idFunc"]."'";
                }

                $resultado = mysqli_query($conexao,$sql); 
            ?>
            <img src="../../img/logo.png" class="login" style="width:395px;">

            <div class="scroll" style="width:505px">
                    <br><br>
                <h1>Funcionários</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Função</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($linha = mysqli_fetch_array($resultado)){
                                echo "<tr>";
                                echo "<th scope='row'>".$linha["idFunc"]."</th>";
                                echo "<td>".$linha["nome"]."</td>";
                                echo "<td>".$linha["email"]."</td>";
                                echo "<td>".$linha["funcao"]."</td>";

                                $dados="idFunc=".$linha["idFunc"].
                                    "&nome=".$linha["nome"].
                                    "&email=".$linha["email"].
                                    "&funcao=".$linha["funcao"];
                            
                                echo    "<td>".
                                        "<a style='text-decoration: none' href=\"senhafunc.php?$dados\"><img width='20px' src='../../img/senha.png'> </a>".
                                        "<a style='text-decoration: none' href=\"editfunc.php?$dados\"><img width='20px' src='../../img/editar.png'> </a>";

                                if (($_SESSION["funcao"]==="gerente")&&($_SESSION["idFunc"]!=$linha["idFunc"])) { 
                                    echo "<a style='text-decoration: none' href=\"excluifunc.php?$dados\"><img width='20px' src='../../img/deletar.png'> </a>";
                                }
                                echo "</td>";
                                echo "</tr>";
                            }

                            mysqli_close($conexao);
                        ?>
                    </tbody>
                </table>

                    <br>

                <?php	
                    if ($_SESSION["funcao"]==="gerente"){ 
                ?>
                    <form action="addfunc.php" style="text-align:center">
                        <button type="submit" class="btn btn-dark">Adicionar</button>
                    </form>
                <?php
                    }
                ?>

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
