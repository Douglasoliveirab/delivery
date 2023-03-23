-- CREATE DATABASE lanchonete;

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

CREATE TABLE enderecos (
  id_endereco INT(11) NOT NULL AUTO_INCREMENT,
  CEP VARCHAR (10) NOT NULL,
  CIDADE VARCHAR(20) NOT NULL,
  BAIRRO VARCHAR (20) NOT NULL,
  ENDERECO VARCHAR (35) NOT NULL,
  COMPLEMENTO VARCHAR (20),
  id_cliente INT(11) NOT NULL,
  FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);

CREATE TABLE categoria (
  id_categoria INT(11) NOT NULL AUTO_INCREMENT,
  img_categoria VARCHAR(100) NOT NULL,
  nome_categoria VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_categoria)
);

CREATE TABLE produtos (
  id_produto INT(11) NOT NULL AUTO_INCREMENT,
  id_categoria INT(11) NOT NULL,
  nome_produto VARCHAR(50) NOT NULL,
  img_produto VARCHAR(60) NOT NULL,
  descricao VARCHAR(100) NOT NULL,
  custo_produto DECIMAL(10,2),
  preco DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (id_produto),
  FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);

CREATE TABLE pedidos (
  id_pedido INT(11) NOT NULL AUTO_INCREMENT,
  id_cliente INT(11) NOT NULL,
  datahora_pedido DATETIME NOT NULL,
  numero_pedido VARCHAR(50) NOT NULL,
  tipo_entrega VARCHAR(20)NOT NULL,
  subtotal DECIMAL(10,2) NOT NULL,
  frete DECIMAL(10,2) NOT NULL,
  valor_total DECIMAL(10,2) NOT NULL,
  status_pagamento VARCHAR(20) NOT NULL,
  status_pedido VARCHAR(20) NOT NULL,
  PRIMARY KEY (id_pedido),
  FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);

CREATE TABLE itens_pedido (
  id_itens_pedido INT(11) NOT NULL AUTO_INCREMENT,
  id_pedido INT(11) NOT NULL,
  id_produto INT(11) NOT NULL,
  quantidade INT(11) NOT NULL,
  PRIMARY KEY (id_itens_pedido),
  FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido),
  FOREIGN KEY (id_produto) REFERENCES produtos(id_produto)
);

CREATE TABLE administrador (
  id_administrador INT(11) NOT NULL AUTO_INCREMENT,
  nome_usuario VARCHAR(50) NOT NULL,
  senha_usuario VARCHAR(50) NOT NULL,
  privilegios VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_administrador)
);

CREATE TABLE banner (
  id_banner INT(11) NOT NULL AUTO_INCREMENT,
  img_banner VARCHAR(50) NOT NULL,
  caminho_banner VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_banner)
);