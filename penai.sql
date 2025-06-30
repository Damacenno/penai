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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_penai_corrections_penai_users` (`id_user`),
  KEY `FK_penai_corrections_penai_redactions` (`id_redaction`),
  CONSTRAINT `FK_penai_corrections_penai_redactions` FOREIGN KEY (`id_redaction`) REFERENCES `penai_redactions` (`id`),
  CONSTRAINT `FK_penai_corrections_penai_users` FOREIGN KEY (`id_user`) REFERENCES `penai_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela penai_database.penai_corrections: ~3 rows (aproximadamente)
DELETE FROM `penai_corrections`;
INSERT INTO `penai_corrections` (`id`, `id_user`, `nota_geral`, `id_redaction`, `created_at`, `updated_at`) VALUES
	(12, 14, 400, 9, '2025-06-28 13:11:31', '2025-06-28 13:11:31'),
	(13, 14, 540, 10, '2025-06-28 13:46:45', '2025-06-28 13:46:45'),
	(22, 14, 880, 19, '2025-06-30 17:16:53', '2025-06-30 17:16:53');

-- Copiando estrutura para tabela penai_database.penai_correction_details
CREATE TABLE IF NOT EXISTS `penai_correction_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_correction` int DEFAULT NULL,
  `json_details` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_penai_correction_details_penai_corrections` (`id_correction`),
  CONSTRAINT `FK_penai_correction_details_penai_corrections` FOREIGN KEY (`id_correction`) REFERENCES `penai_corrections` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela penai_database.penai_correction_details: ~3 rows (aproximadamente)
DELETE FROM `penai_correction_details`;
INSERT INTO `penai_correction_details` (`id`, `id_correction`, `json_details`, `created_at`, `updated_at`) VALUES
	(10, 12, '{"nota_geral": {"nota_geral": 740, "comentario_geral": "Lorem Ipsum Dolor Sit Amet"}, "competencias": {"competencia_01": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_02": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_03": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_04": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_05": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}}, "comentarios_especificos": {"comentario": "", "caractere_final": 1258, "caractere_inicial": 1200}}', '2025-06-28 13:11:31', '2025-06-28 13:11:31'),
	(11, 13, '{"nota_geral": {"nota_geral": 740, "comentario_geral": "Lorem Ipsum Dolor Sit Amet"}, "competencias": {"competencia_01": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_02": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_03": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_04": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}, "competencia_05": {"nota": 10, "comentário": "Lorem Ipsum Dolor Sit Amet"}}, "comentarios_especificos": {"comentario": "", "caractere_final": 1258, "caractere_inicial": 1200}}', '2025-06-28 13:46:45', '2025-06-28 13:46:45'),
	(20, 22, '{"nota_geral": {"nota_geral": 880, "comentario_geral": "A redação apresenta excelente domínio da norma culta, abordagem crítica consistente sobre o tema e proposta de intervenção bem articulada. A estrutura do texto segue um bom encadeamento de ideias, demonstrando maturidade argumentativa. Pequenos ajustes poderiam aprimorar ainda mais a clareza e a profundidade analítica."}, "competencias": {"competencia_01": {"nota": 200, "comentário": "O tema foi plenamente compreendido e desenvolvido de forma clara e coerente. A contextualização inicial é pertinente, situando o leitor quanto à problemática do trabalho de cuidado feminino no Brasil. A tese é bem delineada e presente em todos os parágrafos do texto."}, "competencia_02": {"nota": 180, "comentário": "A argumentação é sólida, com bom uso de dados e citação de autoridade filosófica. No entanto, o segundo parágrafo poderia aprofundar um pouco mais as causas da invisibilidade e trazer exemplos mais variados, o que fortaleceria ainda mais a argumentação."}, "competencia_03": {"nota": 180, "comentário": "A seleção de informações é eficaz, e há boa progressão temática entre os parágrafos. Ainda assim, certas transições poderiam ser mais fluidas para garantir melhor coesão, especialmente entre o segundo e o terceiro parágrafos."}, "competencia_04": {"nota": 180, "comentário": "A proposta de intervenção é viável, detalhada e bem articulada com a discussão anterior. Há agentes, meios e finalidades bem definidos. Seria interessante, contudo, reforçar o papel das próprias cuidadoras como agentes de transformação."}, "competencia_05": {"nota": 140, "comentário": "O texto apresenta domínio bastante adequado da norma-padrão, com vocabulário técnico e preciso. Há pequenas falhas de colocação pronominal e pontuação em trechos específicos, como em \'o alto índica\', que parece conter erro de digitação ou construção."}}, "comentarios_especificos": {"comentario": "No segundo parágrafo, há um desvio de coesão ao se referir a \'o alto índica de empregadas domésticas\', que provavelmente pretendia ser \'o alto índice de empregadas domésticas\'. Isso compromete um pouco a clareza local. Além disso, reforçar a atuação das cuidadoras como parte da solução poderia enriquecer a intervenção.", "caractere_final": 1258, "caractere_inicial": 1200}}', '2025-06-30 17:16:53', '2025-06-30 17:16:53');

-- Copiando estrutura para tabela penai_database.penai_daily_themes
CREATE TABLE IF NOT EXISTS `penai_daily_themes` (
  `id` int DEFAULT NULL,
  `theme_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `theme_description` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela penai_database.penai_daily_themes: ~2 rows (aproximadamente)
DELETE FROM `penai_daily_themes`;
INSERT INTO `penai_daily_themes` (`id`, `theme_title`, `theme_description`, `created_at`, `updated_at`, `active`) VALUES
	(1, 'Os desafios da inclusão de pessoas com deficiência no mercado de trabalho', 'Isso é maschismio...', '2025-06-28 10:56:30', '2025-06-28 10:56:31', 1),
	(2, 'A banalização do discurso de ódio nas redes sociais', 'Muito desigual', '2025-06-28 10:57:41', '2025-06-28 10:57:41', 1),
	(3, 'Os impactos da cultura do consumo excessivo no meio ambiente', 'A falta de infra', '2025-06-28 10:58:00', '2025-06-28 10:58:00', 0);

-- Copiando estrutura para tabela penai_database.penai_redactions
CREATE TABLE IF NOT EXISTS `penai_redactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `redaction_intro` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `redaction_desenvolv` text,
  `redaction_desenvolv_2` text,
  `redaction_conclusion` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela penai_database.penai_redactions: ~3 rows (aproximadamente)
DELETE FROM `penai_redactions`;
INSERT INTO `penai_redactions` (`id`, `title`, `description`, `created_at`, `redaction_intro`, `redaction_desenvolv`, `redaction_desenvolv_2`, `redaction_conclusion`, `updated_at`) VALUES
	(9, 'Desiguldade Social', 'Como a desiguldade social desequilibra', '2025-06-28 13:11:31', 'Conforme estudos demográficos realizados pelo Instituto Brasileiro de Geografia e Estatística (IBGE), a população de idosos crescerá drasticamente nas próximas décadas. Nesse contexto, o trabalho de cuidado realizado pelas mulheres é fundamental para acolher essa parcela populacional. Todavia, a invisibilidade e a omissão estatal são desafios que perpetuam o descaso sofrido por essas trabalhadoras no Brasil. Logo, faz-se imperiosa a tomada de medidas que resolvam esse contexto de emergência generalizada. Sob essa perspectiva, é crucial que a escassez de debates acerca da importância das atividades de assistência seja superada. A esse respeito, a ilustre filósofa Djamila Ribeiro defende que, para atuar em uma situação, deve-se, antes de tudo, tirá-la da invisibilidade.', 'Sob essa perspectiva, é crucial que a escassez de debates acerca da importância das atividades de assistência seja superada. A esse respeito, a ilustre filósofa Djamila Ribeiro defende que, para atuar em uma situação, deve-se, antes de tudo, tirá-la da invisibilidade. Entretanto, o panorama nacional destoa do pensamento da autora, já que o alto índica de empregadas domésticas em condições ocupacionais precárias não é enxergado pelo círculo social, de modo que discussões sobre essa questão sejam priorizadas, dificultando intervenções nesse problema. Então, essa nebulosidade precisa ser exposta para conscientizar a sociedade.', 'Outrossim, vale ressaltar de que maneira a negligência do estado fomenta a marginalização das cuidadoras. A partir disso, o sociólogo polonês Zygmunt Bauman utiliza o termo "Instituição Zumbi" para simbolizar as entidades que não cumprem seu papel previamente estabelecido. Seguindo o raciocínio, é possível compreender o Poder Executivo como um exemplo da ideia do expoente da Sociologia, uma vez que a sua função de garantir dignidade profissional a todos não está sendo cumprida em sua totalidade, pois muitas trabalhadoras de acolhimento ainda encontram-se em situações indignas. Por isso, a conduta governamental necessita ser reformulada para assegurar os direitos dessas profissionais.', 'Portanto, torna-se primordial mitigar a marginalidade do trabalho de cuidado realizado pelo gênero feminino. Dessa forma, o Ministério da Cidadania, enquanto responsável por políticas cidadãs, deve propagar dados e pesquisas que revelam a gravidade do esquecimento sofrido pelas cuidadoras, por meio de plataformas midiáticas de destaque, a fim de atingir o maior contingente possível e conscientizá-lo. Ademais, a coletividade, por intermédio do Ministério público, precisa cobrar do Governo Federal ações efetivas de proteção ocupacional às empregadas domésticas, com o intuito de promover o labor digno a esses indivíduos. Assim, a acolhida da nova geração de pessoas da terceira idade poderá ser efetiva.', '2025-06-28 13:11:31'),
	(10, 'Permanencia dos Povos ribeirinhos', 'A invisibilidade e negligencia para co', '2025-06-28 13:46:45', 'Conforme estudos demográficos realizados pelo Instituto Brasileiro de Geografia e Estatística (IBGE), a população de idosos crescerá drasticamente nas próximas décadas. Nesse contexto, o trabalho de cuidado realizado pelas mulheres é fundamental para acolher essa parcela populacional. Todavia, a invisibilidade e a omissão estatal são desafios que perpetuam o descaso sofrido por essas trabalhadoras no Brasil. Logo, faz-se imperiosa a tomada de medidas que resolvam esse contexto de emergência generalizada. Sob essa perspectiva, é crucial que a escassez de debates acerca da importância das atividades de assistência seja superada. A esse respeito, a ilustre filósofa Djamila Ribeiro defende que, para atuar em uma situação, deve-se, antes de tudo, tirá-la da invisibilidade.', 'Sob essa perspectiva, é crucial que a escassez de debates acerca da importância das atividades de assistência seja superada. A esse respeito, a ilustre filósofa Djamila Ribeiro defende que, para atuar em uma situação, deve-se, antes de tudo, tirá-la da invisibilidade. Entretanto, o panorama nacional destoa do pensamento da autora, já que o alto índica de empregadas domésticas em condições ocupacionais precárias não é enxergado pelo círculo social, de modo que discussões sobre essa questão sejam priorizadas, dificultando intervenções nesse problema. Então, essa nebulosidade precisa ser exposta para conscientizar a sociedade.', 'Outrossim, vale ressaltar de que maneira a negligência do estado fomenta a marginalização das cuidadoras. A partir disso, o sociólogo polonês Zygmunt Bauman utiliza o termo "Instituição Zumbi" para simbolizar as entidades que não cumprem seu papel previamente estabelecido. Seguindo o raciocínio, é possível compreender o Poder Executivo como um exemplo da ideia do expoente da Sociologia, uma vez que a sua função de garantir dignidade profissional a todos não está sendo cumprida em sua totalidade, pois muitas trabalhadoras de acolhimento ainda encontram-se em situações indignas. Por isso, a conduta governamental necessita ser reformulada para assegurar os direitos dessas profissionais.', 'Portanto, torna-se primordial mitigar a marginalidade do trabalho de cuidado realizado pelo gênero feminino. Dessa forma, o Ministério da Cidadania, enquanto responsável por políticas cidadãs, deve propagar dados e pesquisas que revelam a gravidade do esquecimento sofrido pelas cuidadoras, por meio de plataformas midiáticas de destaque, a fim de atingir o maior contingente possível e conscientizá-lo. Ademais, a coletividade, por intermédio do Ministério público, precisa cobrar do Governo Federal ações efetivas de proteção ocupacional às empregadas domésticas, com o intuito de promover o labor digno a esses indivíduos. Assim, a acolhida da nova geração de pessoas da terceira idade poderá ser efetiva.', '2025-06-28 13:46:45'),
	(19, 'Desigualdade', 'Descrição automática ou do tema escolhido', '2025-06-30 17:16:53', 'Conforme estudos demográficos realizados pelo Instituto Brasileiro de Geografia e Estatística (IBGE), a população de idosos crescerá drasticamente nas próximas décadas. Nesse contexto, o trabalho de cuidado realizado pelas mulheres é fundamental para acolher essa parcela populacional. Todavia, a invisibilidade e a omissão estatal são desafios que perpetuam o descaso sofrido por essas trabalhadoras no Brasil. Logo, faz-se imperiosa a tomada de medidas que resolvam esse contexto de emergência generalizada.', 'Sob essa perspectiva, é crucial que a escassez de debates acerca da importância das atividades de assistência seja superada. A esse respeito, a ilustre filósofa Djamila Ribeiro defende que, para atuar em uma situação, deve-se, antes de tudo, tirá-la da invisibilidade. Entretanto, o panorama nacional destoa do pensamento da autora, já que o alto índica de empregadas domésticas em condições ocupacionais precárias não é enxergado pelo círculo social, de modo que discussões sobre essa questão sejam priorizadas, dificultando intervenções nesse problema. Então, essa nebulosidade precisa ser exposta para conscientizar a sociedade.', NULL, 'Portanto, torna-se primordial mitigar a marginalidade do trabalho de cuidado realizado pelo gênero feminino. Dessa forma, o Ministério da Cidadania, enquanto responsável por políticas cidadãs, deve propagar dados e pesquisas que revelam a gravidade do esquecimento sofrido pelas cuidadoras, por meio de plataformas midiáticas de destaque, a fim de atingir o maior contingente possível e conscientizá-lo. Ademais, a coletividade, por intermédio do Ministério público, precisa cobrar do Governo Federal ações efetivas de proteção ocupacional às empregadas domésticas, com o intuito de promover o labor digno a esses indivíduos. Assim, a acolhida da nova geração de pessoas da terceira idade poderá ser efetiva.', '2025-06-30 17:16:53');

-- Copiando estrutura para tabela penai_database.penai_users
CREATE TABLE IF NOT EXISTS `penai_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `accumulated_points` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela penai_database.penai_users: ~3 rows (aproximadamente)
DELETE FROM `penai_users`;
INSERT INTO `penai_users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `accumulated_points`) VALUES
	(0, 'Hacka', 'hack@email.com', '123', '2025-06-28 08:05:40', '2025-06-28 08:05:42', NULL),
	(12, 'Joao Pedro', 'teste@email.com', 'admin', '2025-06-28 08:05:36', '2025-06-28 08:05:37', NULL),
	(14, 'Administrador', 'admin@admin.com', '$2y$12$UPWwmtIoVbe//MSVlcYZr.sEOiu5hSnicYrOXEIZHDASkvCjH1Cx.', '2025-06-28 11:05:50', '2025-06-28 11:05:50', 10);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
