<?php

require_once 'produto.model.php';
require_once 'carrinho.model.php';
require_once 'produto.service.php';
require_once 'carrinho.service.php';
require_once 'conexao.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if($acao == 'read') {

  $produto = new Produto();
  $carrinho = new Carrinho();
  $conexao = new Conexao();

  $produtoService = new ProdutoService($conexao, $produto);
  $carrinhoService = new CarrinhoService($conexao, $carrinho);

  $produtos_carrinho = $carrinhoService->read();
  $produtos = $produtoService->read();


} else if($acao == 'add_cart') {
  
  $carrinho = new Carrinho();
  $conexao = new Conexao();

  $carrinho->__set('produto_id', $_GET['id']);

  $carrinhoService = new CarrinhoService($conexao, $carrinho);

  if(count($carrinhoService->recuperarIdProduto()) == 0) {

    $carrinhoService->adicionaCarrinho();

    header('Location: index.php');
  } else {

    header('Location: index.php?erro=1');
  }

}

?>