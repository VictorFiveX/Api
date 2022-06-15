
create database db_esearch;

use db_esearch;

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `produto` (
  `idP` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nameP` varchar(200) NOT NULL,
  `marcaP` varchar(200) NOT NULL,
  `preco` decimal(8,2) NOT NULL,
  `medida` decimal(8,2) NOT NULL,
  `tipomp` varchar(200) NOT NULL,
  `supermercado` varchar(200) NOT NULL
);

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`)
VALUES (1, 'Teste', 'teste@teste.com','123456'),
(2, 'Victor', 'Victor@teste.com','123456');

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;



