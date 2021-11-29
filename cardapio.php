<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Cardápio | Alima</title>
        <link href="style.css" rel="stylesheet">
        <link href="style1.css" rel="strylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="img/logo.png" rel="icon">
    </head>
    <body style="background-color:#E8C3D0">
        
        <div class="collapse" id="navbarToggleExternalContent">
            <div style="background-color: white;">
              <h5 id="textonavbar">Confeitaria Alima</h5>
              <span class="text-muted">Juntos desde 2004</span>
            </div>
          </div>
          <nav class="navbar navbar-dark" style="background-color: #E899C6;">
            <div class="botoesnavbar">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" id="botaoesquerda">
                <span class="navbar-toggler-icon"></span>
              </button>

                <div class="header">
                    <button>
                        <a href="index.php"> Home </a>
                    </button>
                    
                    <button>
                        <a href="cardapio.php"> Cardápio </a>
                    </button>

                    <button>
                        <a href="compra/carrinho.php"> Carrinho </a>
                    </button>
                </div>
            </div>
        </nav>

        <div class="cardapioflp"><br><center><h1> Cardápio </h1> </center><br>

        <?php
	        session_start();

            $conexao = mysqli_connect("localhost", "root", "", "alimaBD");
            $sql = "SELECT * FROM `tbproduto` where `ativo`='s' and `promocao`='s' order by produto";
            $resultado = mysqli_query($conexao,$sql); 
        ?>

        <center><h5>Promoções</h5></center>
        <table class="table" style="width:1000px;margin-left:auto;margin-right:auto;">
        <thead>
            <tr>
            <th scope="col" colspan="3">Descrição</th>
            <th scope="col">De</th>
            <th scope="col">Por</th>
            <th scope="col">Carrinho</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while($linha = mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td width='200'><img width='180' src='img/".$linha["nomeFoto"]."'></td>";
            echo "<td>".$linha["produto"]."</td>";
            echo "<td>".$linha["descricaoProduto"]."</td>";
            echo "<td><s>".$linha["precoVenda"]."</s></td>";
            echo "<td>".$linha["precoPromocao"]."</td>";
            echo "<td width=120>".
                "<a href='compra/carrinho.php?acao=adicionar&idProduto=".$linha["idProduto"]."'><img src=img/carrinho.png style='width:70%'></a>".
                "</td>";
            ?>


        <?php
            
            echo "</td>";
            echo "</tr>";
        }

        ?>
        </tbody>
        </table>
        
            <br>

        <?php
            $sql = "SELECT * FROM `tbproduto` where `ativo`='s' and `promocao`='n' order by produto";
            $resultado = mysqli_query($conexao,$sql); 

        ?>
        <h5 align='center'>Produtos</h5>
        <table class="table" style="width:1000px;margin-left:auto;margin-right:auto;">
        <thead>
            <tr>
            <th scope="col" colspan="3">Descrição</th>
            <th scope="col">Preço</th>
            <th scope="col">Carrinho</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while($linha = mysqli_fetch_array($resultado)){
            echo "<tr>";
            echo "<td align='center' width='180'><img width='160' src='img/".$linha["nomeFoto"]."'></td>";
            echo "<td>".$linha["produto"]."</td>";
            echo "<td>".$linha["descricaoProduto"]."</td>";
            echo "<td>".$linha["precoVenda"]."</td>";
            echo "<td  align='center' width=120>".
                "<a href=compra/carrinho.php?acao=adicionar&idProduto=".$linha["idProduto"]."\'><img src=img/carrinho.png style='width:70%'></a>".
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
        <p></p>

        <form action="compra/carrinho.php" style="text-align:center">
        <input type="hidden" name="acao" value="limpar">
        <button class="btn btn-dark" type="submit">Limpar carrinho</button>
        </form>
        <p></p>
        <form action="compra/carrinho.php" style="text-align:center">
        <input type="hidden" name="acao" value="finalizar">
        <button class="btn btn-dark" type="submit">Conferir carrinho</button>
        </form>
        
        <br>
        
    </div>
    </body>
    
</html>