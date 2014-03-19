-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.5.24-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela ampla.wp_professional
CREATE TABLE IF NOT EXISTS `wp_professional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `birthday` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `profession` varchar(50) DEFAULT NULL,
  `client` int(11) DEFAULT NULL,
  `email_marketing` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela ampla.wp_professional: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `wp_professional` DISABLE KEYS */;
INSERT INTO `wp_professional` (`id`, `name`, `email`, `tel`, `birthday`, `sex`, `profession`, `client`, `email_marketing`) VALUES
	(1, 'Candido', 'candidosg@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 'Candido', 'candidosg@gmail.com', '', '2013-12-11', 'm', 'pedreiro', 1, 1),
	(3, 'Candido', 'candidosg@gmail.com', '321321312', '2013-12-11', 'm', 'pedreiro', 1, 1),
	(4, 'Candido', 'candidosg@gmail.com', '42332432', '2013-12-18', 'm', 'pedreiro', 1, 1),
	(5, 'Candido', 'candidosg@gmail.com', '42332432', '2013-12-18', 'm', 'pedreiro', 1, 1),
	(6, 'csasacsa', 'candidosg@gmail.com', '324535435', '2013-12-18', 'm', 'pedreiro', 1, 0),
	(7, 'csasacsa', 'candidosg@gmail.com', '324535435', '2013-12-18', 'm', 'pedreiro', 1, 0),
	(8, 'Candido', 'candidosg@gmail.com', '3434324', '2013-12-13', 'm', 'pedreiro', 1, 1),
	(9, 'Candido', 'candidosg@gmail.com', '3434324', '2013-12-13', 'm', 'pedreiro', 1, 1);
/*!40000 ALTER TABLE `wp_professional` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
