<?php

class ProdutoService {

  private $conexao;
  private $produto;

  function __construct(Conexao $conexao, Produto $produto)
  {
    $this->conexao = $conexao->conectar();
		$this->produto = $produto;
  }
  
  public function read() { 
		$query = 'select id, url_img, nome, descricao, preco from tb_produtos';
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
}

?>