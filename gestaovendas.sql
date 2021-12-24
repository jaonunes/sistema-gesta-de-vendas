-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.19-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para gestaodevendas
CREATE DATABASE IF NOT EXISTS `gestaodevendas` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `gestaodevendas`;

-- Copiando estrutura para tabela gestaodevendas.carrinho_compras
CREATE TABLE IF NOT EXISTS `carrinho_compras` (
  `id_carrinho` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_carrinho`),
  UNIQUE KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `FK_carrinho_compras_clientes_cadastrados` FOREIGN KEY (`id_cliente`) REFERENCES `clientes_cadastrados` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela gestaodevendas.carrinho_compras: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `carrinho_compras` DISABLE KEYS */;
INSERT INTO `carrinho_compras` (`id_carrinho`, `id_cliente`) VALUES
	(3, 1);
/*!40000 ALTER TABLE `carrinho_compras` ENABLE KEYS */;

-- Copiando estrutura para tabela gestaodevendas.clientes_cadastrados
CREATE TABLE IF NOT EXISTS `clientes_cadastrados` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) NOT NULL,
  `email_cliente` varchar(45) NOT NULL,
  `senha_cliente` varchar(45) NOT NULL,
  `logradouro_cliente` varchar(45) NOT NULL,
  `bairro_cliente` varchar(45) NOT NULL,
  `cep_cliente` varchar(20) NOT NULL,
  `cidade_cliente` varchar(20) NOT NULL,
  `uf_cliente` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela gestaodevendas.clientes_cadastrados: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes_cadastrados` DISABLE KEYS */;
INSERT INTO `clientes_cadastrados` (`id_cliente`, `nome_cliente`, `email_cliente`, `senha_cliente`, `logradouro_cliente`, `bairro_cliente`, `cep_cliente`, `cidade_cliente`, `uf_cliente`) VALUES
	(1, 'TESTE 1', 'teste@teste.com', '4a4dfcfc713f596e4a5dddd3eae4966e9932f683', 'Rua Jardim de Piranhas', 'Said Salomão', '69310-759', '	Boa Vista', 'Roraima');
/*!40000 ALTER TABLE `clientes_cadastrados` ENABLE KEYS */;

-- Copiando estrutura para tabela gestaodevendas.itens_carrinho
CREATE TABLE IF NOT EXISTS `itens_carrinho` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `id_carrinho` int(11) NOT NULL,
  `quantidade_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `FK_itens_carrinho_produtos` (`id_produto`),
  KEY `FK_itens_carrinho_carrinho_compras` (`id_carrinho`),
  CONSTRAINT `FK_itens_carrinho_carrinho_compras` FOREIGN KEY (`id_carrinho`) REFERENCES `carrinho_compras` (`id_carrinho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_itens_carrinho_produtos` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela gestaodevendas.itens_carrinho: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `itens_carrinho` DISABLE KEYS */;
/*!40000 ALTER TABLE `itens_carrinho` ENABLE KEYS */;

-- Copiando estrutura para tabela gestaodevendas.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(10) NOT NULL AUTO_INCREMENT,
  `descricao_produto` varchar(60) NOT NULL,
  `valor_produto` varchar(45) NOT NULL,
  `quantidade_produto` double NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela gestaodevendas.produtos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id_produto`, `descricao_produto`, `valor_produto`, `quantidade_produto`) VALUES
	(1, 'Tomate', '1.90', 5),
	(2, 'Cebola', '3.75', 5),
	(3, 'Laranja', '2.80', 5),
	(4, 'Pera', '5.70', 5),
	(5, 'Uva', '2.00', 5);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
