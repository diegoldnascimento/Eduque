-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.21 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para foo
DROP DATABASE IF EXISTS `foo`;
CREATE DATABASE IF NOT EXISTS `foo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `foo`;


-- Copiando estrutura para tabela foo.aluno
DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `dtNascimento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela foo.aluno: ~0 rows (aproximadamente)
DELETE FROM `aluno`;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` (`id`, `nome`, `sobrenome`, `email`, `cpf`, `dtNascimento`, `sexo`, `telefone`) VALUES
	(1, 'Diego', 'Lopes', 'hello@diegolopes.me', '140.800.300-00', '1994-02-24', 'm', '(00) 000000000'),
	(2, 'Jackson', 'Ferreira', 'hua@hotmail.com', '140.800.300-00', '1995-01-20', 'm', '2199464768');
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;


-- Copiando estrutura para tabela foo.aula
DROP TABLE IF EXISTS `aula`;
CREATE TABLE IF NOT EXISTS `aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `turma_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `valor` float NOT NULL,
  `data` varchar(45) NOT NULL,
  `horarioInicio` varchar(45) NOT NULL,
  `horarioTermino` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_aula_aluno_idx` (`aluno_id`),
  KEY `fk_aula_professor_idx` (`professor_id`),
  KEY `fk_aula_turma_idx` (`turma_id`),
  CONSTRAINT `fk_aula_aluno` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_aula_professor` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_aula_turma` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela foo.aula: ~0 rows (aproximadamente)
DELETE FROM `aula`;
/*!40000 ALTER TABLE `aula` DISABLE KEYS */;
INSERT INTO `aula` (`id`, `turma_id`, `professor_id`, `aluno_id`, `valor`, `data`, `horarioInicio`, `horarioTermino`) VALUES
	(2, 2, 1, 2, 50, '2015-09-18', '14', '17'),
	(3, 2, 1, 2, 50, '2015-09-18', '14', '17'),
	(4, 2, 1, 2, 50, '2015-09-18', '14', '17'),
	(5, 2, 1, 2, 50, '2015-09-18', '14', '17'),
	(6, 2, 1, 2, 50, '2015-09-18', '14', '17'),
	(7, 2, 1, 2, 50, '2015-09-18', '14', '17');
/*!40000 ALTER TABLE `aula` ENABLE KEYS */;


-- Copiando estrutura para tabela foo.contrato
DROP TABLE IF EXISTS `contrato`;
CREATE TABLE IF NOT EXISTS `contrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `valor` varchar(45) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `aberto` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contrato_aluno_idx` (`aluno_id`),
  KEY `fk_contrato_professor_idx` (`professor_id`),
  CONSTRAINT `fk_contrato_aluno` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_contrato_professor` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela foo.contrato: ~1 rows (aproximadamente)
DELETE FROM `contrato`;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` (`id`, `aluno_id`, `professor_id`, `valor`, `dataInicio`, `dataFim`, `aberto`) VALUES
	(1, 2, 2, '350,00', '2015-09-16', '2015-09-16', 1),
	(4, 1, 2, '450,00', '2015-02-15', '2015-09-20', 0);
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;


-- Copiando estrutura para tabela foo.curso
DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `ementa` varchar(45) DEFAULT NULL,
  `descricao` varchar(45) NOT NULL,
  `valorTotal` varchar(45) NOT NULL,
  `cargaHoraria` varchar(45) NOT NULL,
  `ativo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela foo.curso: ~1 rows (aproximadamente)
DELETE FROM `curso`;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` (`id`, `codigo`, `nome`, `ementa`, `descricao`, `valorTotal`, `cargaHoraria`, `ativo`) VALUES
	(1, 'K4M8L8K1CM', 'Lógica de Programação', 'Testando...', 'Teste de resumo agora.', 'R$ 450.00', '20', '1'),
	(2, 'B4DDDB5474', 'Curso de teste', 'Ementa.asdasdasdasasdasdad', 'Oi.asdasdasdasasas', 'R$ 24,10', '24', '1');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;


-- Copiando estrutura para tabela foo.local
DROP TABLE IF EXISTS `local`;
CREATE TABLE IF NOT EXISTS `local` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `capacidade` varchar(45) DEFAULT NULL,
  `responsavel` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `logradouro` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `n` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela foo.local: ~0 rows (aproximadamente)
DELETE FROM `local`;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
INSERT INTO `local` (`id`, `nome`, `capacidade`, `responsavel`, `telefone`, `logradouro`, `bairro`, `cidade`, `complemento`, `cep`, `n`, `estado`) VALUES
	(1, 'Diego', '100', 'Ronaldo', '', 'Estrada dos Tres Rios', 'Jacarepagua', 'Rio de Janeiro', 'Não sei', '22753212', '123', 'RJ');
/*!40000 ALTER TABLE `local` ENABLE KEYS */;


-- Copiando estrutura para tabela foo.pagamento
DROP TABLE IF EXISTS `pagamento`;
CREATE TABLE IF NOT EXISTS `pagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` varchar(45) NOT NULL,
  `forma` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `contrato_id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pagamento_contrato_idx` (`contrato_id`),
  CONSTRAINT `fk_pagamento_contrato` FOREIGN KEY (`contrato_id`) REFERENCES `contrato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela foo.pagamento: ~0 rows (aproximadamente)
DELETE FROM `pagamento`;
/*!40000 ALTER TABLE `pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamento` ENABLE KEYS */;


-- Copiando estrutura para tabela foo.professor
DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `bio` varchar(45) NOT NULL,
  `observacao` varchar(45) NOT NULL,
  `contrato` varchar(45) NOT NULL,
  `cpf` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela foo.professor: ~2 rows (aproximadamente)
DELETE FROM `professor`;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` (`id`, `nome`, `sobrenome`, `bio`, `observacao`, `contrato`, `cpf`, `email`, `telefone`) VALUES
	(1, 'Diego', 'Lopes', 'Estou testsando.', '', 'Prestação de Serviço', '14381938747', 'contato@diegolopes.net.br', '(21) 3305-3236'),
	(2, 'Diego', 'Silva', 'Estou testando bio denovo', 'Agora com observação.', 'CLT', '14381938747', 'dzn@outlook.com.br', '(21) 3305-3236');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;


-- Copiando estrutura para tabela foo.professorcurso
DROP TABLE IF EXISTS `professorcurso`;
CREATE TABLE IF NOT EXISTS `professorcurso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professor_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_professorCurso_to_curso_idx` (`curso_id`),
  KEY `fk_professorCurso_to_professor_idx` (`professor_id`),
  CONSTRAINT `fk_professorCurso_to_curso` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_professorCurso_to_professor` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela foo.professorcurso: ~0 rows (aproximadamente)
DELETE FROM `professorcurso`;
/*!40000 ALTER TABLE `professorcurso` DISABLE KEYS */;
/*!40000 ALTER TABLE `professorcurso` ENABLE KEYS */;


-- Copiando estrutura para tabela foo.turma
DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `turno` varchar(45) NOT NULL,
  `dataFim` date NOT NULL,
  `dataInicio` date NOT NULL,
  `horario` varchar(50) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `lotada` tinyint(1) DEFAULT NULL,
  `local_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_turma_professor_idx` (`professor_id`),
  KEY `fk_turma_local_idx` (`local_id`),
  CONSTRAINT `fk_turma_local` FOREIGN KEY (`local_id`) REFERENCES `local` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turma_professor` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela foo.turma: ~2 rows (aproximadamente)
DELETE FROM `turma`;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` (`id`, `codigo`, `turno`, `dataFim`, `dataInicio`, `horario`, `professor_id`, `lotada`, `local_id`) VALUES
	(1, 'AHMQISA190', 'Noite', '2015-09-20', '2015-09-14', '20h - 21h', 1, 0, 1),
	(2, '31B3AAM2K6', 'Integral', '2015-09-20', '2015-09-15', '10h - 15h', 1, 0, 1);
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;


-- Copiando estrutura para tabela foo.turmaaluno
DROP TABLE IF EXISTS `turmaaluno`;
CREATE TABLE IF NOT EXISTS `turmaaluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `turma_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_turmaAluno_aluno_idx` (`aluno_id`),
  KEY `fk_turmaAluno_turma_idx` (`turma_id`),
  CONSTRAINT `fk_turmaAluno_aluno` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turmaAluno_turma` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela foo.turmaaluno: ~2 rows (aproximadamente)
DELETE FROM `turmaaluno`;
/*!40000 ALTER TABLE `turmaaluno` DISABLE KEYS */;
INSERT INTO `turmaaluno` (`id`, `turma_id`, `aluno_id`) VALUES
	(2, 2, 1),
	(5, 1, 1),
	(7, 1, 2);
/*!40000 ALTER TABLE `turmaaluno` ENABLE KEYS */;


-- Copiando estrutura para tabela foo.turmacurso
DROP TABLE IF EXISTS `turmacurso`;
CREATE TABLE IF NOT EXISTS `turmacurso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `turma_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_turmaCurso_turma_idx` (`turma_id`),
  KEY `fk_turmaCurso_curso_idx` (`curso_id`),
  CONSTRAINT `fk_turmaCurso_curso` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turmaCurso_turma` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela foo.turmacurso: ~0 rows (aproximadamente)
DELETE FROM `turmacurso`;
/*!40000 ALTER TABLE `turmacurso` DISABLE KEYS */;
INSERT INTO `turmacurso` (`id`, `turma_id`, `curso_id`) VALUES
	(2, 1, 1),
	(3, 2, 1);
/*!40000 ALTER TABLE `turmacurso` ENABLE KEYS */;


-- Copiando estrutura para tabela foo.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `professor_id` int(11) DEFAULT NULL,
  `aluno_id` int(11) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `ultimoAcesso` timestamp NULL DEFAULT NULL,
  `dataCadastro` date NOT NULL,
  `nivelAcesso` varchar(45) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usuario_to_aluno_idx` (`aluno_id`),
  KEY `fk_usuario_to_professor_idx` (`professor_id`),
  CONSTRAINT `FK_usuario_to_aluno` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_to_professor` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela foo.usuario: ~2 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `usuario`, `senha`, `professor_id`, `aluno_id`, `ativo`, `ultimoAcesso`, `dataCadastro`, `nivelAcesso`, `email`) VALUES
	(1, 'admin', 'aa1bf4646de67fd9086cf6c79007026c', NULL, NULL, 1, '2015-09-18 09:33:23', '2015-09-08', 'Administrador', ''),
	(2, 'teste', '698dc19d489c4e4db73e28a713eab07b', NULL, NULL, 1, '2015-09-08 22:52:10', '2015-09-08', 'Professor', 'dzn@outlook.com.br'),
	(3, 'teste1', '4297f44b13955235245b2497399d7a93', NULL, NULL, 1, '2015-09-16 14:28:19', '2015-09-16', 'Administrador', 'contato@diegolopes.net.br');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
