# Projeto-Carrinho-Ecommerce

Para poder acessar o site basta:

criar banco de dados 'carrinho';

criar as seguintes tabelas:

CREATE TABLE tb_produtos (
	id int PRIMARY KEY AUTO_INCREMENT,
    	url_img varchar(100) not null,
    	nome varchar(50) not null,
    	descricao text not null,
    	preco float not null
);

CREATE TABLE tb_carrinho (
	id int PRIMARY KEY AUTO_INCREMENT,
    	produto_id int not null
);


OBS: Eu utilizei o banco de dados mysql, se for utilizar outro DB trocar no arquivo conexao.php