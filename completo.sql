-- MySQL dump 10.13  Distrib 8.0.24, for Win64 (x86_64)
--
-- Host: localhost    Database: cardfort
-- ------------------------------------------------------
-- Server version	5.7.33-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cadastro`
--

DROP TABLE IF EXISTS `cadastro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cadastro` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `email` varchar(60) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadastro`
--

LOCK TABLES `cadastro` WRITE;
/*!40000 ALTER TABLE `cadastro` DISABLE KEYS */;
INSERT INTO `cadastro` VALUES (1,'GUILHERME','PIZZOLLO','guibrito030504@gmail.com','guilherme030504','030504',NULL),(8,'Pedro','Pinto','pedropinto@gmail.com','pedro','123',NULL),(9,'GUILHERME','PIZZOLLO','guibrito030504@gmail.com','bia','123',NULL),(10,'Guilherme','Brito','guilherme_pizzollo@estudante.sc.senai.br','gui','123','1634216196.gif'),(11,'maite','scbadf','dfagd@gyhef','maite','123','1634208072.png'),(12,'biia','biia','bia@gmail','biia','biia','1634211706.gif'),(13,'adm','adm','adm@adm','adm','adm','1634654866.jpg'),(14,'helo','patricio','heloisapatricioguollo28@gmail.com','lalal','1234','1634998249.gif'),(15,'gustavo','goulart','gustavo@gmail.com','gustavo','123','1635011092.gif'),(16,'ana','adm','guilherme_pizzollo@estudante.sc.senai.br','gu','123','');
/*!40000 ALTER TABLE `cadastro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cadeiras`
--

DROP TABLE IF EXISTS `cadeiras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cadeiras` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET latin1 NOT NULL,
  `preco` float NOT NULL,
  `id_material` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `img` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `descricao` varchar(400) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_cadeiras_categorias_idx_idx` (`id_categoria`),
  KEY `fk_cadeiras_material_idx_idx` (`id_material`),
  CONSTRAINT `fk_cadeiras_categorias_idx` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cadeiras_material_idx` FOREIGN KEY (`id_material`) REFERENCES `material` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cadeiras`
--

LOCK TABLES `cadeiras` WRITE;
/*!40000 ALTER TABLE `cadeiras` DISABLE KEYS */;
INSERT INTO `cadeiras` VALUES (13,'Cadeira Gamer XT Racer Reclinável Preta e Amarela - Viking Series XTR-011',1234.05,1,1,'1634824093.jpg','A cadeira Gamer da XT Racer giratória é uma ótima opção pra quem procura conforto e qualidade. O modelo XTR-011 da linha Viking Series é reclinável, tem regulagem de altura e seu encosto tem como inclinação ajustável em até 150°. Há também duas almofadas para lombar e cabeça que são removíveis. O estofamento é feito com material de alta qualidade que traz ao móvel resistência e confortabilidade.'),(14,'Cadeira Escritório Presidente Com Massageador e Aquecimento Kelter Preto V401',1000,1,2,'1634824130jfif','Cadeira de escritório presidente com massagem e aquecimento.'),(15,'Poltrona Costela e Puff Costela - Móveis Roperi',1407.82,2,3,'1634824185.jpg','A Poltrona com Puff Costela é extremamente confortável e tem design moderno. Ideal para qualquer ambiente, também é muito resistente, devido a composição do aço em sua estrutura.'),(16,'Poltrona Egg Arne Jacobsen Base Aluminio Relax Com Trava, 100% Nacional ',1189.91,2,4,'1634824239.jpg','Poltrona com estrutura interna em Fibra de vidro recoberto com PP para uma maior resistência e leveza e espumas com densidade D28.'),(17,'Cadeira de Jantar Yanka Cinza',350,4,5,'1634824354.jpg','Beleza não falta na Cadeira Yanka! Com destaque para as linhas retas, ela une o que há de mais moderno para conferir elegância e destaque a qualquer ambiente da sua casa. A concha revestida em linho na cor cinza garante esse toque clean e discreto, enquanto os pés fixos em aço carbono oferecem estabilidade e sobriedade à peça.'),(18,'Cadeira De Escritório Tóquio Preta - Anatômica',659,4,2,'1637666690.png','Com um design exclusivo, a cadeira Tóquio destaca-se no ambiente em que é inserida remetendo modernidade e elegância.'),(19,'Cadeira Gamer XT Racer Reclinável Preta Platinum - W Series XTR-010',1424,1,1,'1637666794.jpg','A cadeira Gamer da XT Racer giratória é uma ótima opção pra quem procura conforto e qualidade. O modelo XTR-010 da linha Platinum W Series é reclinável, tem regulagem de altura e seu encosto tem como inclinação ajustável em até 150°. Há também duas almofadas para lombar e cabeça que são removíveis.'),(20,'Cadeira Gamer Craft Preta e Vermelha',738.5,1,1,'1637666867.jpg','Se você passa um longo período de tempo sentado na frente do computador sabe o quanto a cadeira influencia no aconchego do seu corpo, não é? E para aprimorar esses momentos, nada melhor do que contar com um móvel como a Cadeira Gamer Craft. '),(21,'Poltrona Reclinável Motorizada Imperial Corano Gelo',2608,1,4,'1637666961.jpg','Ideal para complementar o lar-style e trazer comodidade na medida certa, a Poltrona Imperial é a companhia perfeita para seus momentos de descanso, de leitura ou para ser aquele assento extra na hora de receber visitas em casa. ');
/*!40000 ALTER TABLE `cadeiras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Gamer'),(2,'Escritório'),(3,'Decorativa'),(4,'Para sala'),(5,'Jantar');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `material` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'Couro'),(2,'Madeira'),(3,'Ferro'),(4,'Plástico'),(5,'Acrilico');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-23  8:53:36
