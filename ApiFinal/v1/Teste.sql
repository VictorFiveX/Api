
create database teste;

use teste;


CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`)
VALUES (1, 'Teste', 'teste@teste.com','123456'),
(2, 'Victor', 'Victor@teste.com','123456');

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;


