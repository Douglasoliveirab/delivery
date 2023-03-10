CREATE DATABASE lanchonete;

USE lanchonete;

CREATE TABLE clientes (
  id_cliente INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL,
  sobrenome VARCHAR(50) NOT NULL,
  cpf CHAR(14) NOT NULL,
  email VARCHAR(50) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  endereco VARCHAR(100) NOT NULL,
  senha VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_cliente)
);

CREATE TABLE produtos (
  id_produto INT(11) NOT NULL AUTO_INCREMENT,
  id_categoria INT(11) NOT NULL,
  nome_produto VARCHAR(50) NOT NULL,
  img_produto VARCHAR(100) NOT NULL,
  descricao VARCHAR(100)NOT NULL,
  custo_produto VARCHAR(100),
  valor DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (id_produto),
  FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);

CREATE TABLE pedidos (
  id_pedido INT(11) NOT NULL AUTO_INCREMENT,
  id_cliente INT(11) NOT NULL,
  datahora_pedido DATETIME NOT NULL,
  numero_pedido VARCHAR (50) NOT NULL,
  subtotal DECIMAL(10,2) NOT NULL,
  valor_total DECIMAL(10,2) NOT NULL,
  status VARCHAR(20) NOT NULL,
  PRIMARY KEY (id_pedido),
  FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);

CREATE TABLE itens_pedido (
  id_itens_pedido INT(11) NOT NULL AUTO_INCREMENT,
  id_pedido INT(11) NOT NULL,
  id_produto VARCHAR(50) NOT NULL,
  quantidade INT(11) NOT NULL,
  PRIMARY KEY (id_itens_pedido),
  FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido),
  FOREIGN KEY (id_produto) REFERENCES produts(id_produto)
  
);

CREATE TABLE categoria(
   id_categoria INT(11) NOT NULL AUTO_INCREMENT,
   nome_categoria VARCHAR(50) NOT NULL,
   PRIMARY KEY (id_categoria)
);

CREATE TABLE ADINISTRADOR(
  id_adinistrador INT(11) NOT NULL AUTO_INCREMENT,
  nome_usuario VARCHAR(50) NOT NULL,
  senha_usuario VARCHAR(50) NOT NULL,
  privilegios VARCHAR(50) NOT NULL
);

CREATE TABLE banner(
  id_banner INT(11) NOT NULL  AUTO_INCREMENT,
  img_banner VARCHAR(50) NOT NULL

);







-- INSERT INTO produtos (nome, descricao, valor) VALUES
--   ('X-Burguer', 'Pão, hambúrguer, queijo, alface e tomate', 10.99),
--   ('X-Salada', 'Pão, hambúrguer, queijo, alface, tomate e maionese', 12.99),
--   ('X-Bacon', 'Pão, hambúrguer, queijo, bacon, alface, tomate e maionese', 14.99),
--   ('X-Tudo', 'Pão, dois hambúrgueres, queijo, bacon, ovo, alface, tomate e maionese', 19.99);

-- como selecionar um pedido e imprimir todos os dados no geral
-- SELECT pedidos.id, clientes.nome AS nome_cliente, clientes.endereco, pedidos.datahora, pedidos.status, itens_pedido.produto, itens_pedido.quantidade, itens_pedido.valor_unitario, itens_pedido.valor_total
-- FROM pedidos
-- JOIN clientes ON pedidos.cliente_id = clientes.id
-- JOIN itens_pedido ON itens_pedido.pedido_id = pedidos.id
-- WHERE pedidos.id = 1;


-- codigo para atualizar estado do pedido no banco
-- UPDATE pedidos
-- SET status = 'Concluído'
-- WHERE id = 1;

