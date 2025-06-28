-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.4.3 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para penai_database
CREATE DATABASE IF NOT EXISTS `penai_database` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `penai_database`;

-- Copiando estrutura para tabela penai_database.penai_corrections
CREATE TABLE IF NOT EXISTS `penai_corrections` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT '0',
  `nota_geral` int DEFAULT '0',
  `id_redaction` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_penai_corrections_penai_users` (`id_user`),
  KEY `FK_penai_corrections_penai_redactions` (`id_redaction`),
  CONSTRAINT `FK_penai_corrections_penai_redactions` FOREIGN KEY (`id_redaction`) REFERENCES `penai_redactions` (`id`),
  CONSTRAINT `FK_penai_corrections_penai_users` FOREIGN KEY (`id_user`) REFERENCES `penai_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela penai_database.penai_corrections: ~2 rows (aproximadamente)
DELETE FROM `penai_corrections`;
INSERT INTO `penai_corrections` (`id`, `id_user`, `nota_geral`, `id_redaction`) VALUES
	(1, 0, 650, 1),
	(2, 12, 800, 2);

-- Copiando estrutura para tabela penai_database.penai_correction_details
CREATE TABLE IF NOT EXISTS `penai_correction_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_correction` int DEFAULT NULL,
  `json_details` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_penai_correction_details_penai_corrections` (`id_correction`),
  CONSTRAINT `FK_penai_correction_details_penai_corrections` FOREIGN KEY (`id_correction`) REFERENCES `penai_corrections` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela penai_database.penai_correction_details: ~2 rows (aproximadamente)
DELETE FROM `penai_correction_details`;
INSERT INTO `penai_correction_details` (`id`, `id_correction`, `json_details`) VALUES
	(1, 1, '{"nota_geral": {"nota_geral": 740, "comentario_geral": "Lorem Ipsum Dolor Sit Amet"}, "competencias": {"competencia_01": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_02": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_03": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_04": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_05": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}}, "comentarios_especificos": {"comentario": "", "caractere_final": 1258, "caractere_inicial": 1200}}'),
	(2, 2, '{"nota_geral": {"nota_geral": 740, "comentario_geral": "Lorem Ipsum Dolor Sit Amet"}, "competencias": {"competencia_01": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_02": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_03": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_04": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_05": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}}, "comentarios_especificos": {"comentario": "", "caractere_final": 1258, "caractere_inicial": 1200}}');

-- Copiando estrutura para tabela penai_database.penai_redactions
CREATE TABLE IF NOT EXISTS `penai_redactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `date_occ` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela penai_database.penai_redactions: ~2 rows (aproximadamente)
DELETE FROM `penai_redactions`;
INSERT INTO `penai_redactions` (`id`, `title`, `description`, `date_occ`) VALUES
	(1, 'Escravidao', 'Descreva sobre a escrividao', '2025-06-28'),
	(2, 'Desigualdade', 'A desigualdade social', '2025-06-28');

-- Copiando estrutura para tabela penai_database.penai_users
CREATE TABLE IF NOT EXISTS `penai_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela penai_database.penai_users: ~2 rows (aproximadamente)
DELETE FROM `penai_users`;
INSERT INTO `penai_users` (`id`, `nome`, `email`) VALUES
	(0, 'Hacka', 'hack@email.com'),
	(12, 'Joao Pedro', 'teste@email.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
