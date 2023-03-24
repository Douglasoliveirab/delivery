CREATE TABLE lojas (
  id_loja INT(11) NOT NULL AUTO_INCREMENT,
  nome_loja VARCHAR(50) NOT NULL,
  endereco_loja VARCHAR(100) NOT NULL,
  descricao VARCHAR(100) NOT NULL,
  foto_perfil VARCHAR(100) NOT NULL,
  longitude DECIMAL(10,8) NOT NULL,
  latitude DECIMAL(10,8) NOT NULL,
  horario_funcionamento VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_loja),
  id_admin INT(11) NOT NULL,
  -- id_forma_pagamento INT(11) NOT NULL,
  FOREIGN KEY (id_admin) REFERENCES admin(id_admin),
  FOREIGN KEY (id_forma_pagamento) REFERENCES formas_pagamento(id_forma_pagamento)
);

CREATE TABLE admin (
   id_admin INT(11) NOT NULL AUTO_INCREMENT,
   nome_admin VARCHAR(50) NOT NULL,
   sobrenome_admin VARCHAR(50) NOT NULL,
   CPF INT(14) NOT NULL,
   ENDERECO_ADMIN VARCHAR(80) NOT NULL,
   TELEFONE VARCHAR(20) NOT NULL,
   EMAIL VARCHAR(70) NOT NULL,
   SENHA VARCHAR(20) NOT NULL,
   PRIMARY KEY (id_admin)
);

CREATE TABLE clientes (
  id_cliente INT(11) NOT NULL AUTO_INCREMENT,
  nome_cliente VARCHAR(50) NOT NULL,
  sobrenome_cliente VARCHAR(50) NOT NULL,
  cpf_cliente CHAR(14) NOT NULL,
  preferencia_pagamento VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  endereco VARCHAR(100) NOT NULL,
  senha VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_cliente)
);

CREATE TABLE motoboys (
  id_motoboy INT(11) NOT NULL AUTO_INCREMENT,
  nome_motoboy VARCHAR(50) NOT NULL,
  foto VARCHAR(100) NOT NULL,
  placa_veiculo VARCHAR(10) NOT NULL,
  modelo_veiculo VARCHAR(10) NOT NULL,
  ano_veiculo VARCHAR(10) NOT NULL,
  proprietario_veiculo VARCHAR(10) NOT NULL,
  documento_veiculo VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_motoboy),
  
);

CREATE TABLE enderecos (
  id_endereco INT(11) NOT NULL AUTO_INCREMENT,
  CEP VARCHAR (10) NOT NULL,
  CIDADE VARCHAR(20) NOT NULL,
  BAIRRO VARCHAR (20) NOT NULL,
  ENDERECO VARCHAR (35) NOT NULL,
  COMPLEMENTO VARCHAR (20),
  ID_CLIENTE INT(11) NOT NULL,
  FOREIGN KEY (id_CLIENTE) REFERENCES clientes(id_CLIENTE)
);

CREATE TABLE produtos (
  id_produto INT(11) NOT NULL AUTO_INCREMENT,
  id_categoria INT(11) NOT NULL,
  id_loja INT(11) NOT NULL,
  nome_produto VARCHAR(50) NOT NULL,
  img_produto VARCHAR(100) NOT NULL,
  descricao VARCHAR(100) NOT NULL,
  custo_produto DECIMAL(10,2),
  preco DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (id_produto),
  FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria),
  FOREIGN KEY (id_loja) REFERENCES lojas(id_loja)
);

CREATE TABLE formas_pagamento (
  id_forma_pagamento INT(11) NOT NULL AUTO_INCREMENT,
  forma_pagamento VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_forma_pagamento)
);


CREATE TABLE categorias_lojas (
  id_categoria_loja INT(11) NOT NULL AUTO_INCREMENT,
  nome_categoria VARCHAR(50) NOT NULL,
  id_loja INT(11) NOT NULL,
  PRIMARY KEY (id_categoria_loja),
  FOREIGN KEY (id_loja) REFERENCES lojas(id_loja)
);


CREATE TABLE pedidos (
  id_pedido INT(11) NOT NULL AUTO_INCREMENT,
  id_cliente INT(11) NOT NULL,
  id_loja INT(11) NOT NULL,
  id_motoboy INT(11) NOT NULL,
  datahora_pedido DATETIME NOT NULL,
  numero_pedido VARCHAR(50) NOT NULL,
  subtotal DECIMAL(10,2) NOT NULL,
  frete DECIMAL(10,2) NOT NULL,
  valor_total DECIMAL(10,2) NOT NULL,
  status_pagamento VARCHAR(20) NOT NULL,
  status_pedido VARCHAR(20) NOT NULL,
  PRIMARY KEY (id_pedido),
  FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
  FOREIGN KEY (id_loja) REFERENCES lojas(id_loja),
  FOREIGN KEY (id_motoboy) REFERENCES motoboy(id_motoboy)
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

CREATE TABLE entregas (
  id_entrega INT(11) NOT NULL AUTO_INCREMENT,
  id_pedido INT(11) NOT NULL,
  id_motoboy INT(11) NOT NULL,
  local_partida VARCHAR(100) NOT NULL,
  local_entrega VARCHAR(100) NOT NULL,
  valor_recebido DECIMAL(10,2) NOT NULL,
  distancia_percorrida DECIMAL(10,2) NOT NULL,
  datahora_entrega DATETIME NOT NULL,
  PRIMARY KEY (id_entrega),
  FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido),
  FOREIGN KEY (id_motoboy) REFERENCES motoboys(id_motoboy)
);