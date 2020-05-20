<?php

$acao = 'read';

require_once 'produto_controller.php';

?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="css/estilo.css">  

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>

<body>  
  <nav>
    <div class="navbar container">
      <div>
        <h1><a href="#">App Carrinho</a></h1>
      </div>
  
      <div class="btn_carrinho">
        <a href="#">Carrinho R$ <span class="total_carrinho"></span></a>
  
        <div class="carrinho">
          <div>
            
          <?php foreach($produtos_carrinho as $prod) { ?>

            <div>
              <img src="<?= $prod->url_img ?>">
              <p><?= $prod->nome ?></p>
              <p>R$ <span class="preco_cart"><?= $prod->preco ?></span></p>
            </div>  
            
          <?php } ?>

          <p>Total: R$ <span class="total_carrinho"></span></p>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <?php if( isset($_GET['erro']) && $_GET['erro'] == 1 ) { ?>
    <div class="erro">
      <h5>Produto ja esta no carrinho</h5>
    </div>
	<?php } ?>

  <div class="produtos container">

    <?php foreach($produtos as $produto) { ?> 

      <div class="produto_individual">
        <img src="<?= $produto->url_img ?>">
        <h2><?= $produto->nome ?></h2>
        <p class="descricao_produto" ><?php 

          $descricao = $produto->descricao;

          $descricao_formatada = mb_strimwidth($descricao, 0, 80, '...');

          echo $descricao_formatada;
        ?></p>
        <p class="preco_produto">R$ <?= $produto->preco ?></p>

        <div><button onclick="adicionarCarrinho(<?= $produto->id ?>)"> <i class="fa fa-plus" aria-hidden="true"></i> Adicionar ao carrinho</button></div>
      </div>  

    <?php } ?>
    
  </div>


  <script src="js/adiciona.js"></script>
  <script src="js/total_cart.js"></script>
  <script src="js/carrinho_hover.js"></script>
</body>
</html>