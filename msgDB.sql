CREATE TABLE IF NOT EXISTS `mensagem` (
  `ID` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `nome_user_para` varchar(180) DEFAULT NULL,
  `nome_user_de` varchar(180) DEFAULT NULL,
  `lida` varchar(180) DEFAULT NULL,
  `hora` varchar(180) DEFAULT NULL,
  `assunto` varchar(180) DEFAULT NULL,
  `texto` text,
  PRIMARY KEY (`ID`)
);


INSERT INTO `mensagem` (`ID`, `nome_user_para`, `nome_user_de`, `lida`, `hora`, `assunto`, `texto`) VALUES
(1, 'Felgueiras', 'Guilherme', 'si', '24/08/2017, 3:16 am', 'Noma mensagem', 'Ola'),
(2, 'Guilherme', 'Amanda', 'si', '24/08/2017, 3:17 am', 'Outra mensagem', 'Eaii');


CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`ID`)
);


INSERT INTO `usuarios` (`ID`, `nome`) VALUES
(1, 'Guilherme'),
(2, 'Felgueiras'),
(3, 'Amanda');
