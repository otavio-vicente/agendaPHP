CREATE DATABASE agenda;

CREATE TABLE `compromissos` (
  `idCompromisso` int(11) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `hora` time NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `local` varchar(45) NOT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cep` bigint(20) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `tiposCompromissos_idTipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `compromissos` (`idCompromisso`, `dataInicio`, `dataFim`, `hora`, `descricao`, `local`, `rua`, `bairro`, `cidade`, `estado`, `cep`, `numero`, `observacao`, `tiposCompromissos_idTipo`) VALUES
(1, '2022-05-25', '2022-05-25', '12:00:00', 'Almoço e reunião de negócios.', 'Restaurante Divino Sabor', 'Das Andorinhas', 'Costa e Silva', 'Joinville', 'Santa Catarina', 89247852, 1520, 'Não tem estacionamento.', 1);

CREATE TABLE `compromissos_pessoas` (
  `pessoas_idPessoa` int(11) NOT NULL,
  `compromissos_idCompromisso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `compromissos_pessoas` (`pessoas_idPessoa`, `compromissos_idCompromisso`) VALUES
(1, 1),
(2, 1);



CREATE TABLE `pessoas` (
  `idPessoa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `relacoes_idRelacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `pessoas` (`idPessoa`, `nome`, `sobrenome`, `email`, `foto`, `relacoes_idRelacao`) VALUES
(1, 'João', 'da Silva', 'jsilva@admin.com', '', 1),
(2, 'Cláudia', 'Menezes', 'claudia@admin.com', '', 1),
(3, 'Joana', 'Andrade', 'joana@gmail.com', '', 3),
(4, 'Carlos', 'Andrade', 'carlos@gmail.com', '', 4);



CREATE TABLE `relacoes` (
  `idRelacao` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `relacoes` (`idRelacao`, `descricao`) VALUES
(1, 'Colaborador'),
(2, 'Fornecedor'),
(3, 'Esposa'),
(4, 'Filho'),
(5, 'Parente'),
(6, 'Pai'),
(7, 'Mãe');

CREATE TABLE `tiposcompromissos` (
  `idTipo` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `tiposcompromissos` (`idTipo`, `descricao`) VALUES
(1, 'Reunião'),
(2, 'Jantar em família'),
(3, 'Viagem'),
(4, 'Aniversário');

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` char(32) NOT NULL,
  `nivel` tinyint(4) NOT NULL COMMENT '1- Secretária / 2- Executivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuarios` (`idUsuario`, `email`, `senha`, `nivel`) VALUES
(1, 'sec@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'exec@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', 2);

ALTER TABLE `compromissos`
  ADD PRIMARY KEY (`idCompromisso`),
  ADD KEY `fk_agendarCompromissos_tiposCompromissos1` (`tiposCompromissos_idTipo`);

ALTER TABLE `compromissos_pessoas`
  ADD PRIMARY KEY (`pessoas_idPessoa`,`compromissos_idCompromisso`),
  ADD KEY `fk_compromissos_pessoas_compromissos` (`compromissos_idCompromisso`),
  ADD KEY `fk_compromissos_pessoas_pessoas` (`pessoas_idPessoa`);

ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`idPessoa`),
  ADD KEY `fk_pessoas_relacoes1` (`relacoes_idRelacao`);

ALTER TABLE `relacoes`
  ADD PRIMARY KEY (`idRelacao`);

ALTER TABLE `tiposcompromissos`
  ADD PRIMARY KEY (`idTipo`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

ALTER TABLE `compromissos`
  MODIFY `idCompromisso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `pessoas`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `relacoes`
  MODIFY `idRelacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `tiposcompromissos`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `compromissos`
  ADD CONSTRAINT `fk_agendarCompromissos_tiposCompromissos1` FOREIGN KEY (`tiposCompromissos_idTipo`) REFERENCES `tiposcompromissos` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `compromissos_pessoas`
  ADD CONSTRAINT `fk_compromissos_pessoas_compromissos` FOREIGN KEY (`compromissos_idCompromisso`) REFERENCES `compromissos` (`idCompromisso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compromissos_pessoas_pessoas` FOREIGN KEY (`pessoas_idPessoa`) REFERENCES `pessoas` (`idPessoa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `pessoas`
  ADD CONSTRAINT `fk_pessoas_relacoes1` FOREIGN KEY (`relacoes_idRelacao`) REFERENCES `relacoes` (`idRelacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
