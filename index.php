<!DOCTYPE html>
<!--Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu-->

<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Home・Confeitaria</title>
        <link href="style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://i.pinimg.com/280x280_RS/d2/d8/a1/d2d8a19deabeda88f35aafae9d3ec0b6.jpg" rel="icon">
    </head>

    <body>

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
                  <a href="sobre.php"> Sobre </a>
                </button>
                <button>
                  <a href="#"> Carrinho </a>
                </button>
                </div>
            </div>

          </nav>

        <div class="bgimage">
          <img class="bgimage" src="bannerconfeitaria.png" alt="Foto da Confeitaria Alima">
        </div>

        <div id="porq">

            <div id="textoporq">
                <h2> Por que escolher a <Br> Confeitaria Alima?</h2>
                <p> Na Confeitaria Alima, nossa prioridade são os clientes e pensando nisso, nós escolhemos a dedo cada produto que será usado. <br>
                Todas as nossas receitas foram escolhidas juntamente à um nutricionista para maior qualidade e segurança. </p>
            </div>
            <center><hr width="60%"></center>

        </div>

        <div id="textoporq2">
          <div class="catg">
            <center><h3>Visitantes</h3></center>
            <ul>
              <li>Richard Paul Astley - 27/07/2017</li>
              <li>Paul Walker - 27/11/2013</li>
              <li>Fausto Corrêa da Silva - 14/01/2015 </li>
              <li>Shawn Mendes e Camilla Cabello - 01/11/2020</li>
              <hr width="100%">
            </ul>
          </div>

          <div class="catg">
            <center><h3>Eco-Friendly</h3></center>
            <p>Todos os produtos da Confeitaria Alima são cultivados em fazendas próprias e separadas, sem a utilização de produtos que possam agredir o meio ambiente. A Confeitaria Alima consta com 5 prêmios de segurança ao ambiente pela ANVISA.</p>
            <hr width="100%" >
          </div>

          <div class="catg">
            <center><h3>Doações</h3></center>
            <hr width="100%">
            <p> Todos os anos, a Confeitaria Alima realiza um evento beneficiente pra ajudar pessoas necessitadas com cestas básicas, o dinheiro para realizar este evento vem diretamente de 10% do lucro bruto anual</p>
          </div>
        </div>


        <div class="favfather">
        <center><h1> Favoritos da Galera </h1></center>
        <div class="favs">


          <div class="bolos">
              Bolo de Cereja
              <br>
              <img src="bolodecereja.jpg" width="190px">
              <br>
              Um bolo de cereja com recheio de morango e chantily em cima.
              <br>
              <button> 
                <a href="cardapio.php">Comprar</a>
              </button>
          </div>

            <div class="bolos">
              Bolo Floresta Negra
              <br>
              <img src="boloflorestanegra.png" width="190px">
              <br>
              Um bolo de camadas de chocolate com cereja e chantily em cima.
              <br>
              <button> 
                <a href="cardapio.php">Comprar</a>
              </button>
            </div>

            <div class="bolos">
              Bolo de Abacaxi com Creme
              <br>
              <img src="boloabacaxicomcreme.png" width="190px">
              <br>
              Um bolo de com recheio sabor abacaxi, creme e abacaxi em cima. 
              <br>
              <button> 
                <a href="cardapio.php">Comprar</a>
              </button>
            </div>
            
        </div>

      </div>


        <footer>
            <div class="separador">
              <div class="footerlinks">
                <div class="separadorlinks">
                  <a href="#"> Instagram </a>
                  <br>
                  <a href="#">Facebook </a>
                </div>
                <div class="separadorlinks">
                  <a href="#"> Linkedin </a>
                  <br>
                  <a href="#"> Ifood </a>
                </div>
                <div class="separadorlinks">
                  <a href="#"> Whatsapp </a>
                  <br>
                  <a href="#"> Contate-nos </a>
                </div>
                
              </div>
            </div>

            <center>@2021 Confeitaria Alima - TODOS OS DIREITOS RESERVADOS 
              <br>
              Desenvolvedores: Adryan Welke da Silva | Felipe Rovigatti Delfino | Igor Henrique de Abreu
            </center>
        </footer>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

</html>