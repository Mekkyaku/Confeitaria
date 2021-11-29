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
        <div class="admb" style="width:1250px">

        <img src="../img/logo.png" class="login" style="margin-left:50px">
            <div class="scroll" style="width:750px">
                <?php
                    session_start();
                    if(!isset($_SESSION['carrinho'])){
                        $_SESSION['carrinho'] = array();
                    }

                    if(isset($_GET['acao'])){
                    
                        if($_GET['acao'] === 'adicionar'){
                            $idProduto = intval($_GET['idProduto']);
                            if(!isset($_SESSION['carrinho'][$idProduto])){
                                $_SESSION['carrinho'][$idProduto] = 1;
                            } else {
                                $_SESSION['carrinho'][$idProduto] += 1;
                            }
                        } 
                        
                        if($_GET['acao'] === 'limpar'){
                            unset($_SESSION['carrinho']);
                            $_SESSION['carrinho'] = array();
                        } 
                        
                        if($_GET['acao'] === 'remover'){
                            $idProduto = intval($_GET['idProduto']);
                            if(isset($_SESSION['carrinho'][$idProduto])){
                                $_SESSION['carrinho'][$idProduto] -= 1;		
                                if ($_SESSION['carrinho'][$idProduto]<=0){
                                    unset($_SESSION['carrinho'][$idProduto]);
                                }
                            }
                        }		
                }

                    ?>
                    <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Imagem</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Quantidade </th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Preço</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>
                                <form action="../cardapio.php">
                                    <button class="btn btn-dark" type="submit" style="width:max-content;">Continuar compra</button>
                                </form>
                            </td>
                            <td colspan="5">
                            </td>
                            <td>
                                <form action="fim.php" width="100%">
                                    <button class="btn btn-dark" type="submit" style="width:max-content;">Finalizar compra</button>
                                </form>
                            </td>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        if(count($_SESSION['carrinho']) == 0){
                            echo "<tr><td colspan='7'><h1>Não há produtos no carrinho</h1></td></tr>";
                        } else {
                            $conexao = mysqli_connect("localhost", "root", "", "alimaBD");
                            $total = 0;
                            foreach($_SESSION['carrinho'] as $idProduto => $qtd){
                                $sql   = "SELECT *  FROM tbProduto WHERE `idProduto`= '$idProduto'";
                                $resultado = mysqli_query($conexao,$sql);
                                while($linha = mysqli_fetch_array($resultado)){

                                    echo "<tr>";
                                    echo "<td width='100'><img width='100' src='../img/".$linha["nomeFoto"]."'></td>";
                                    echo "<td>".$linha["produto"]."</td>";
                                    echo "<td>".$linha["descricaoProduto"]."</td>";
                                    if($linha["promocao"]=="s") {
                                        $precoUnitario = $linha["precoPromocao"];
                                            } else {
                                                $precoUnitario = $linha["precoVenda"];
                                            }
                                            $subTotal   = $precoUnitario * $qtd;
                                            $total += $precoUnitario * $qtd;
                                            
                                            echo "<td>".number_format($qtd, 2, ',', '.')."</td>";
                                            echo "<td>".number_format($precoUnitario, 2, ',', '.')."</td>";
                                            echo "<td>".number_format($subTotal, 2, ',', '.')."</td>";
                                            echo "<td><a style='text-decoration:none;color:red;text-align:center;'href='?acao=remover&idProduto=$idProduto'>Remover</a></td>";
                                            }
                                }
                                $total = number_format($total, 2, ',', '.');
                                echo '<tr><td colspan="6">Total</td><td>R$ '.$total.'</td></tr>';
                        }
                ?>

                        </tbody>
                    </form>
                </table>
            </div>
        </div>        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
