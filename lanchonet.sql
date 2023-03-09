CREATE DATABASE lanchonete;

USE lanchonete;

CREATE TABLE clientes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  endereco VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE pedidos (
  id INT(11) NOT NULL AUTO_INCREMENT,
  cliente_id INT(11) NOT NULL,
  datahora DATETIME NOT NULL,
  status VARCHAR(20) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (cliente_id) REFERENCES clientes(id)
);

CREATE TABLE itens_pedido (
  id INT(11) NOT NULL AUTO_INCREMENT,
  pedido_id INT(11) NOT NULL,
  produto VARCHAR(50) NOT NULL,
  quantidade INT(11) NOT NULL,
  valor_unitario DECIMAL(10,2) NOT NULL,
  valor_total DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (pedido_id) REFERENCES pedidos(id)
);

CREATE TABLE produtos (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NOT NULL,
  descricao VARCHAR(100),
  valor DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (id)
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

