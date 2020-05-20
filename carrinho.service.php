<?php

class CarrinhoService {

  private $conexao;
  private $carrinho;

  function __construct(Conexao $conexao, Carrinho $carrinho)
  {
    $this->conexao = $conexao->conectar();
		$this->carrinho = $carrinho;
  }

  public function read() { 
    $query = '
      select 
        prod.id, 
        prod.url_img, 
        prod.nome, 
        prod.descricao, 
        prod.preco, 
        cart.produto_id
      from tb_produtos as prod
      right join tb_carrinho as cart on (prod.id = cart.produto_id)';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

  public function recuperarIdProduto() {
    $query = "select id, produto_id from tb_carrinho where produto_id = :produto_id";
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':produto_id', $this->carrinho->__get('produto_id'));
    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }
  
  public function adicionaCarrinho() {
    $query = 'insert into tb_carrinho(produto_id)values(:id)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->carrinho->__get('produto_id'));
		$stmt->execute();
  }
}

?>