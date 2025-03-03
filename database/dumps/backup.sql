-- MySQL dump 10.13  Distrib 8.0.32, for Linux (aarch64)
--
-- Host: localhost    Database: anosecaensl
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `employees`
--


--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`(191), `guard_name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--


/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create user','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(2,'read user','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(3,'update user','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(4,'delete user','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(5,'create employee','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(6,'read employee','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(7,'update employee','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(8,'delete employee','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(9,'create fee','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(10,'read fee','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(11,'update fee','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(12,'delete fee','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(13,'create role','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(14,'read role','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(15,'update role','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(16,'delete role','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(17,'create permission','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(18,'read permission','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(19,'update permission','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(20,'delete permission','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(21,'complete task','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(22,'create task','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(23,'read task','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(24,'update task','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(25,'delete task','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(26,'create status','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(27,'read status','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(28,'update status','web','2025-03-03 05:52:47','2025-03-03 05:52:47'),(29,'delete status','web','2025-03-03 05:52:47','2025-03-03 05:52:47');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


--
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--


/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrator','web','#FF5733','2025-03-03 05:52:47','2025-03-03 05:52:47'),(2,'operator','web','#33C1FF','2025-03-03 05:52:47','2025-03-03 05:52:47');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


DROP TABLE IF EXISTS `paises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paises` (
  `id` smallint(3) unsigned zerofill NOT NULL,
  `iso2` char(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `iso3` char(3) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `prefijo` smallint unsigned NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `continente` varchar(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `subcontinente` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `iso_moneda` varchar(3) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nombre_moneda` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iso2` (`iso2`),
  UNIQUE KEY `iso3` (`iso3`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paises`
--


/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
INSERT INTO `paises` VALUES (004,'AF','AFG',93,'Afganist','Asia',NULL,'AFN','Afgani afgano'),(008,'AL','ALB',355,'Albania','Europa',NULL,'ALL','Lek alban'),(010,'AQ','ATA',672,'Ant','Ant',NULL,NULL,NULL),(012,'DZ','DZA',213,'Argelia','',NULL,'DZD','Dinar algerino'),(016,'AS','ASM',1684,'Samoa Americana','Ocean',NULL,NULL,NULL),(020,'AD','AND',376,'Andorra','Europa',NULL,'EUR','Euro'),(024,'AO','AGO',244,'Angola','',NULL,'AOA','Kwanza angole'),(028,'AG','ATG',1268,'Antigua y Barbuda','Am','El Caribe',NULL,NULL),(031,'AZ','AZE',994,'Azerbaiy','Asia',NULL,'AZM','Manat azerbaiyano'),(032,'AR','ARG',54,'Argentina','Am','Am','ARS','Peso argentino'),(036,'AU','AUS',61,'Australia','Ocean',NULL,'AUD','D'),(040,'AT','AUT',43,'Austria','Europa',NULL,'EUR','Euro'),(044,'BS','BHS',1242,'Bahamas','Am','El Caribe','BSD','D'),(048,'BH','BHR',973,'Bahr','Asia',NULL,'BHD','Dinar bahrein'),(050,'BD','BGD',880,'Bangladesh','Asia',NULL,'BDT','Taka de Bangladesh'),(051,'AM','ARM',374,'Armenia','Asia',NULL,'AMD','Dram armenio'),(052,'BB','BRB',1246,'Barbados','Am','El Caribe','BBD','D'),(056,'BE','BEL',32,'B','Europa',NULL,'EUR','Euro'),(060,'BM','BMU',1441,'Bermudas','Am','El Caribe','BMD','D'),(064,'BT','BTN',975,'Bhut','Asia',NULL,'BTN','Ngultrum de But'),(068,'BO','BOL',591,'Bolivia','Am','Am','BOB','Boliviano'),(070,'BA','BIH',387,'Bosnia y Herzegovina','Europa',NULL,'BAM','Marco convertible de Bosnia-Herzegovina'),(072,'BW','BWA',267,'Botsuana','',NULL,'BWP','Pula de Botsuana'),(074,'BV','BVT',0,'Isla Bouvet',NULL,NULL,NULL,NULL),(076,'BR','BRA',55,'Brasil','Am','Am','BRL','Real brasile'),(084,'BZ','BLZ',501,'Belice','Am','Am','BZD','D'),(086,'IO','IOT',0,'Territorio Brit',NULL,NULL,NULL,NULL),(090,'SB','SLB',677,'Islas Salom','Ocean',NULL,'SBD','D'),(092,'VG','VGB',1284,'Islas V','Am','El Caribe',NULL,NULL),(096,'BN','BRN',673,'Brun','Asia',NULL,'BND','D'),(100,'BG','BGR',359,'Bulgaria','Europa',NULL,'BGN','Lev b'),(104,'MM','MMR',95,'Myanmar','Asia',NULL,'MMK','Kyat birmano'),(108,'BI','BDI',257,'Burundi','',NULL,'BIF','Franco burund'),(112,'BY','BLR',375,'Bielorrusia','Europa',NULL,'BYR','Rublo bielorruso'),(116,'KH','KHM',855,'Camboya','Asia',NULL,'KHR','Riel camboyano'),(120,'CM','CMR',237,'Camer','',NULL,NULL,NULL),(124,'CA','CAN',1,'Canad','Am','Am','CAD','D'),(132,'CV','CPV',238,'Cabo Verde','',NULL,'CVE','Escudo caboverdiano'),(136,'KY','CYM',1345,'Islas Caim','Am','El Caribe','KYD','D'),(140,'CF','CAF',236,'Rep','',NULL,NULL,NULL),(144,'LK','LKA',94,'Sri Lanka','Asia',NULL,'LKR','Rupia de Sri Lanka'),(148,'TD','TCD',235,'Chad','',NULL,NULL,NULL),(152,'CL','CHL',56,'Chile','Am','Am','CLP','Peso chileno'),(156,'CN','CHN',86,'China','Asia',NULL,'CNY','Yuan Renminbi de China'),(158,'TW','TWN',886,'Taiw','Asia',NULL,'TWD','D'),(162,'CX','CXR',61,'Isla de Navidad','Ocean',NULL,NULL,NULL),(166,'CC','CCK',61,'Islas Cocos','',NULL,NULL,NULL),(170,'CO','COL',57,'Colombia','Am','Am','COP','Peso colombiano'),(174,'KM','COM',269,'Comoras','',NULL,'KMF','Franco comoriano (de Comoras)'),(175,'YT','MYT',262,'Mayotte','',NULL,NULL,NULL),(178,'CG','COG',242,'Congo','',NULL,NULL,NULL),(180,'CD','COD',243,'Rep','',NULL,'CDF','Franco congole'),(184,'CK','COK',682,'Islas Cook','Ocean',NULL,NULL,NULL),(188,'CR','CRI',506,'Costa Rica','Am','Am','CRC','Col'),(191,'HR','HRV',385,'Croacia','Europa',NULL,'HRK','Kuna croata'),(192,'CU','CUB',53,'Cuba','Am','El Caribe','CUP','Peso cubano'),(196,'CY','CYP',357,'Chipre','Europa',NULL,'CYP','Libra chipriota'),(203,'CZ','CZE',420,'Rep','Europa',NULL,'CZK','Koruna checa'),(204,'BJ','BEN',229,'Ben','',NULL,NULL,NULL),(208,'DK','DNK',45,'Dinamarca','Europa',NULL,'DKK','Corona danesa'),(212,'DM','DMA',1767,'Dominica','Am','El Caribe',NULL,NULL),(214,'DO','DOM',1809,'Rep','Am','El Caribe','DOP','Peso dominicano'),(218,'EC','ECU',593,'Ecuador','Am','Am',NULL,NULL),(222,'SV','SLV',503,'El Salvador','Am','Am','SVC','Col'),(226,'GQ','GNQ',240,'Guinea Ecuatorial','',NULL,NULL,NULL),(231,'ET','ETH',251,'Etiop','',NULL,'ETB','Birr et'),(232,'ER','ERI',291,'Eritrea','',NULL,'ERN','Nakfa eritreo'),(233,'EE','EST',372,'Estonia','Europa',NULL,'EEK','Corona estonia'),(234,'FO','FRO',298,'Islas Feroe','Europa',NULL,NULL,NULL),(238,'FK','FLK',500,'Islas Malvinas','Am','Am','FKP','Libra malvinense'),(239,'GS','SGS',0,'Islas Georgias del Sur y Sandwich del Sur','Am','Am',NULL,NULL),(242,'FJ','FJI',679,'Fiyi','Ocean',NULL,'FJD','D'),(246,'FI','FIN',358,'Finlandia','Europa',NULL,'EUR','Euro'),(248,'AX','ALA',0,'Islas Gland','Europa',NULL,NULL,NULL),(250,'FR','FRA',33,'Francia','Europa',NULL,'EUR','Euro'),(254,'GF','GUF',0,'Guayana Francesa','Am','Am',NULL,NULL),(258,'PF','PYF',689,'Polinesia Francesa','Ocean',NULL,NULL,NULL),(260,'TF','ATF',0,'Territorios Australes Franceses',NULL,NULL,NULL,NULL),(262,'DJ','DJI',253,'Yibuti','',NULL,'DJF','Franco yibutiano'),(266,'GA','GAB',241,'Gab','',NULL,NULL,NULL),(268,'GE','GEO',995,'Georgia','Europa',NULL,'GEL','Lari georgiano'),(270,'GM','GMB',220,'Gambia','',NULL,'GMD','Dalasi gambiano'),(275,'PS','PSE',0,'Palestina','Asia',NULL,NULL,NULL),(276,'DE','DEU',49,'Alemania','Europa',NULL,'EUR','Euro'),(288,'GH','GHA',233,'Ghana','',NULL,'GHC','Cedi ghan'),(292,'GI','GIB',350,'Gibraltar','Europa',NULL,'GIP','Libra de Gibraltar'),(296,'KI','KIR',686,'Kiribati','Ocean',NULL,NULL,NULL),(300,'GR','GRC',30,'Grecia','Europa',NULL,'EUR','Euro'),(304,'GL','GRL',299,'Groenlandia','Am','Am',NULL,NULL),(308,'GD','GRD',1473,'Granada','Am','El Caribe',NULL,NULL),(312,'GP','GLP',0,'Guadalupe','Am','El Caribe',NULL,NULL),(316,'GU','GUM',1671,'Guam','Ocean',NULL,NULL,NULL),(320,'GT','GTM',502,'Guatemala','Am','Am','GTQ','Quetzal guatemalteco'),(324,'GN','GIN',224,'Guinea','',NULL,'GNF','Franco guineano'),(328,'GY','GUY',592,'Guyana','Am','Am','GYD','D'),(332,'HT','HTI',509,'Hait','Am','El Caribe','HTG','Gourde haitiano'),(334,'HM','HMD',0,'Islas Heard y McDonald','Ocean',NULL,NULL,NULL),(336,'VA','VAT',39,'Ciudad del Vaticano','Europa',NULL,NULL,NULL),(340,'HN','HND',504,'Honduras','Am','Am','HNL','Lempira hondure'),(344,'HK','HKG',852,'Hong Kong','Asia',NULL,'HKD','D'),(348,'HU','HUN',36,'Hungr','Europa',NULL,'HUF','Forint h'),(352,'IS','ISL',354,'Islandia','Europa',NULL,'ISK','Kr'),(356,'IN','IND',91,'India','Asia',NULL,'INR','Rupia india'),(360,'ID','IDN',62,'Indonesia','Asia',NULL,'IDR','Rupiah indonesia'),(364,'IR','IRN',98,'Ir','Asia',NULL,'IRR','Rial iran'),(368,'IQ','IRQ',964,'Iraq','Asia',NULL,'IQD','Dinar iraqu'),(372,'IE','IRL',353,'Irlanda','Europa',NULL,'EUR','Euro'),(376,'IL','ISR',972,'Israel','Asia',NULL,'ILS','Nuevo sh'),(380,'IT','ITA',39,'Italia','Europa',NULL,'EUR','Euro'),(384,'CI','CIV',225,'Costa de Marfil','',NULL,NULL,NULL),(388,'JM','JAM',1876,'Jamaica','Am','El Caribe','JMD','D'),(392,'JP','JPN',81,'Jap','Asia',NULL,'JPY','Yen japon'),(398,'KZ','KAZ',7,'Kazajst','Asia',NULL,'KZT','Tenge kazajo'),(400,'JO','JOR',962,'Jordania','Asia',NULL,'JOD','Dinar jordano'),(404,'KE','KEN',254,'Kenia','',NULL,'KES','Chel'),(408,'KP','PRK',850,'Corea del Norte','Asia',NULL,'KPW','Won norcoreano'),(410,'KR','KOR',82,'Corea del Sur','Asia',NULL,'KRW','Won surcoreano'),(414,'KW','KWT',965,'Kuwait','Asia',NULL,'KWD','Dinar kuwait'),(417,'KG','KGZ',996,'Kirguist','Asia',NULL,'KGS','Som kirgu'),(418,'LA','LAO',856,'Laos','Asia',NULL,'LAK','Kip lao'),(422,'LB','LBN',961,'L','Asia',NULL,'LBP','Libra libanesa'),(426,'LS','LSO',266,'Lesotho','',NULL,'LSL','Loti lesotense'),(428,'LV','LVA',371,'Letonia','Europa',NULL,'LVL','Lat let'),(430,'LR','LBR',231,'Liberia','',NULL,'LRD','D'),(434,'LY','LBY',218,'Libia','',NULL,'LYD','Dinar libio'),(438,'LI','LIE',423,'Liechtenstein','Europa',NULL,NULL,NULL),(440,'LT','LTU',370,'Lituania','Europa',NULL,'LTL','Litas lituano'),(442,'LU','LUX',352,'Luxemburgo','Europa',NULL,'EUR','Euro'),(446,'MO','MAC',853,'Macao','Asia',NULL,'MOP','Pataca de Macao'),(450,'MG','MDG',261,'Madagascar','',NULL,'MGA','Ariary malgache'),(454,'MW','MWI',265,'Malaui','',NULL,'MWK','Kwacha malauiano'),(458,'MY','MYS',60,'Malasia','Asia',NULL,'MYR','Ringgit malayo'),(462,'MV','MDV',960,'Maldivas','Asia',NULL,'MVR','Rufiyaa maldiva'),(466,'ML','MLI',223,'Mal','',NULL,NULL,NULL),(470,'MT','MLT',356,'Malta','Europa',NULL,'MTL','Lira maltesa'),(474,'MQ','MTQ',0,'Martinica','Am','El Caribe',NULL,NULL),(478,'MR','MRT',222,'Mauritania','',NULL,'MRO','Ouguiya mauritana'),(480,'MU','MUS',230,'Mauricio','',NULL,'MUR','Rupia mauricia'),(484,'MX','MEX',52,'M','Am','Am','MXN','Peso mexicano'),(492,'MC','MCO',377,'M','Europa',NULL,NULL,NULL),(496,'MN','MNG',976,'Mongolia','Asia',NULL,'MNT','Tughrik mongol'),(498,'MD','MDA',373,'Moldavia','Europa',NULL,'MDL','Leu moldavo'),(499,'ME','MNE',382,'Montenegro','Europa',NULL,NULL,NULL),(500,'MS','MSR',1664,'Montserrat','Am','El Caribe',NULL,NULL),(504,'MA','MAR',212,'Marruecos','',NULL,'MAD','Dirham marroqu'),(508,'MZ','MOZ',258,'Mozambique','',NULL,'MZM','Metical mozambique'),(512,'OM','OMN',968,'Om','Asia',NULL,'OMR','Rial oman'),(516,'NA','NAM',264,'Namibia','',NULL,'NAD','D'),(520,'NR','NRU',674,'Nauru','Ocean',NULL,NULL,NULL),(524,'NP','NPL',977,'Nepal','Asia',NULL,'NPR','Rupia nepalesa'),(528,'NL','NLD',31,'Pa','Europa',NULL,'EUR','Euro'),(530,'AN','ANT',599,'Antillas Holandesas','Am','El Caribe','ANG','Flor'),(533,'AW','ABW',297,'Aruba','Am','El Caribe','AWG','Flor'),(540,'NC','NCL',687,'Nueva Caledonia','Ocean',NULL,NULL,NULL),(548,'VU','VUT',678,'Vanuatu','Ocean',NULL,'VUV','Vatu vanuatense'),(554,'NZ','NZL',64,'Nueva Zelanda','Ocean',NULL,'NZD','D'),(558,'NI','NIC',505,'Nicaragua','Am','Am','NIO','C'),(562,'NE','NER',227,'N','',NULL,NULL,NULL),(566,'NG','NGA',234,'Nigeria','',NULL,'NGN','Naira nigeriana'),(570,'NU','NIU',683,'Niue','Ocean',NULL,NULL,NULL),(574,'NF','NFK',0,'Isla Norfolk','Ocean',NULL,NULL,NULL),(578,'NO','NOR',47,'Noruega','Europa',NULL,'NOK','Corona noruega'),(580,'MP','MNP',1670,'Islas Marianas del Norte','Ocean',NULL,NULL,NULL),(581,'UM','UMI',0,'Islas Ultramarinas de Estados Unidos',NULL,NULL,NULL,NULL),(583,'FM','FSM',691,'Micronesia','Ocean',NULL,NULL,NULL),(584,'MH','MHL',692,'Islas Marshall','Ocean',NULL,NULL,NULL),(585,'PW','PLW',680,'Palaos','Ocean',NULL,NULL,NULL),(586,'PK','PAK',92,'Pakist','Asia',NULL,'PKR','Rupia pakistan'),(591,'PA','PAN',507,'Panam','Am','Am','PAB','Balboa paname'),(598,'PG','PNG',675,'Pap','Ocean',NULL,'PGK','Kina de Pap'),(600,'PY','PRY',595,'Paraguay','Am','Am','PYG','Guaran'),(604,'PE','PER',51,'Per','Am','Am','PEN','Nuevo sol peruano'),(608,'PH','PHL',63,'Filipinas','Asia',NULL,'PHP','Peso filipino'),(612,'PN','PCN',870,'Islas Pitcairn','Ocean',NULL,NULL,NULL),(616,'PL','POL',48,'Polonia','Europa',NULL,'PLN','zloty polaco'),(620,'PT','PRT',351,'Portugal','Europa',NULL,'EUR','Euro'),(624,'GW','GNB',245,'Guinea-Bissau','',NULL,NULL,NULL),(626,'TL','TLS',670,'Timor Oriental','Asia',NULL,NULL,NULL),(630,'PR','PRI',1,'Puerto Rico','Am','El Caribe',NULL,NULL),(634,'QA','QAT',974,'Qatar','Asia',NULL,'QAR','Rial qatar'),(638,'RE','REU',262,'Reuni','',NULL,NULL,NULL),(642,'RO','ROU',40,'Rumania','Europa',NULL,'RON','Leu rumano'),(643,'RU','RUS',7,'Rusia','Asia',NULL,'RUB','Rublo ruso'),(646,'RW','RWA',250,'Ruanda','',NULL,'RWF','Franco ruand'),(654,'SH','SHN',290,'Santa Helena','',NULL,'SHP','Libra de Santa Helena'),(659,'KN','KNA',1869,'San Crist','Am','El Caribe',NULL,NULL),(660,'AI','AIA',1264,'Anguila','Am','El Caribe',NULL,NULL),(662,'LC','LCA',1758,'Santa Luc','Am','El Caribe',NULL,NULL),(666,'PM','SPM',508,'San Pedro y Miquel','Am','Am',NULL,NULL),(670,'VC','VCT',1784,'San Vicente y las Granadinas','Am','El Caribe',NULL,NULL),(674,'SM','SMR',378,'San Marino','Europa',NULL,NULL,NULL),(678,'ST','STP',239,'Santo Tom','',NULL,'STD','Dobra de Santo Tom'),(682,'SA','SAU',966,'Arabia Saud','Asia',NULL,'SAR','Riyal saud'),(686,'SN','SEN',221,'Senegal','',NULL,NULL,NULL),(688,'RS','SRB',381,'Serbia','Europa',NULL,NULL,NULL),(690,'SC','SYC',248,'Seychelles','',NULL,'SCR','Rupia de Seychelles'),(694,'SL','SLE',232,'Sierra Leona','',NULL,'SLL','Leone de Sierra Leona'),(702,'SG','SGP',65,'Singapur','Asia',NULL,'SGD','D'),(703,'SK','SVK',421,'Eslovaquia','Europa',NULL,'SKK','Corona eslovaca'),(704,'VN','VNM',84,'Vietnam','Asia',NULL,'VND','Dong vietnamita'),(705,'SI','SVN',386,'Eslovenia','Europa',NULL,NULL,NULL),(706,'SO','SOM',252,'Somalia','',NULL,'SOS','Chel'),(710,'ZA','ZAF',27,'Sud','',NULL,'ZAR','Rand sudafricano'),(716,'ZW','ZWE',263,'Zimbabue','',NULL,'ZWL','D'),(724,'ES','ESP',34,'Espa','Europa',NULL,'EUR','Euro'),(732,'EH','ESH',0,'Sahara Occidental','',NULL,NULL,NULL),(736,'SD','SDN',249,'Sud','',NULL,'SDD','Dinar sudan'),(740,'SR','SUR',597,'Surinam','Am','Am','SRD','D'),(744,'SJ','SJM',0,'Svalbard y Jan Mayen','Europa',NULL,NULL,NULL),(748,'SZ','SWZ',268,'Suazilandia','',NULL,'SZL','Lilangeni suazi'),(752,'SE','SWE',46,'Suecia','Europa',NULL,'SEK','Corona sueca'),(756,'CH','CHE',41,'Suiza','Europa',NULL,'CHF','Franco suizo'),(760,'SY','SYR',963,'Siria','Asia',NULL,'SYP','Libra siria'),(762,'TJ','TJK',992,'Tayikist','Asia',NULL,'TJS','Somoni tayik (de Tayikist'),(764,'TH','THA',66,'Tailandia','Asia',NULL,'THB','Baht tailand'),(768,'TG','TGO',228,'Togo','',NULL,NULL,NULL),(772,'TK','TKL',690,'Tokelau','Ocean',NULL,NULL,NULL),(776,'TO','TON',676,'Tonga','Ocean',NULL,'TOP','Pa\'anga tongano'),(780,'TT','TTO',1868,'Trinidad y Tobago','Am','El Caribe','TTD','D'),(784,'AE','ARE',971,'Emiratos ','Asia',NULL,'AED','Dirham de los Emiratos '),(788,'TN','TUN',216,'T','',NULL,'TND','Dinar tunecino'),(792,'TR','TUR',90,'Turqu','Asia',NULL,'TRY','Lira turca'),(795,'TM','TKM',993,'Turkmenist','Asia',NULL,'TMM','Manat turcomano'),(796,'TC','TCA',1649,'Islas Turcas y Caicos','Am','El Caribe',NULL,NULL),(798,'TV','TUV',688,'Tuvalu','Ocean',NULL,NULL,NULL),(800,'UG','UGA',256,'Uganda','',NULL,'UGX','Chel'),(804,'UA','UKR',380,'Ucrania','Europa',NULL,'UAH','Grivna ucraniana'),(807,'MK','MKD',389,'Macedonia','Europa',NULL,'MKD','Denar macedonio'),(818,'EG','EGY',20,'Egipto','',NULL,'EGP','Libra egipcia'),(826,'GB','GBR',44,'Reino Unido','Europa',NULL,'GBP','Libra esterlina (libra de Gran Breta'),(834,'TZ','TZA',255,'Tanzania','',NULL,'TZS','Chel'),(840,'US','USA',1,'Estados Unidos','Am','Am','USD','D'),(850,'VI','VIR',1340,'Islas V','Am','El Caribe',NULL,NULL),(854,'BF','BFA',226,'Burkina Faso','',NULL,NULL,NULL),(858,'UY','URY',598,'Uruguay','Am','Am','UYU','Peso uruguayo'),(860,'UZ','UZB',998,'Uzbekist','Asia',NULL,'UZS','Som uzbeko'),(862,'VE','VEN',58,'Venezuela','Am','Am','VEB','Bol'),(876,'WF','WLF',681,'Wallis y Futuna','Ocean',NULL,NULL,NULL),(882,'WS','WSM',685,'Samoa','Ocean',NULL,'WST','Tala samoana'),(887,'YE','YEM',967,'Yemen','Asia',NULL,'YER','Rial yemen'),(894,'ZM','ZMB',260,'Zambia','',NULL,'ZMK','Kwacha zambiano');
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;



DROP TABLE IF EXISTS `db_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cif` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_card` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `country_id` smallint unsigned DEFAULT NULL,
  `currency_iso` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_cif_unique` (`cif`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_credit_card_unique` (`credit_card`),
  KEY `users_country_id_foreign` (`country_id`),
  CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `paises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--


/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `db_users` VALUES (1,'H01471671','Brian Garrido','briangarrido@gmail.com','698972949','4577700464153162','C/Artesanos','2025-03-03 05:52:47',300,'eur',NULL,'2025-03-03 05:52:47','2025-03-03 05:56:08'),(2,'V83558072','Jose Diaz','Jose@gmail.com','698972949','378734493671000','Artesanos 3ºA',NULL,250,'eur',NULL,'2025-03-03 06:10:56','2025-03-03 06:10:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_email_unique` (`email`(191)),
  UNIQUE KEY `employees_dni_unique` (`dni`(191))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--


/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'40252320D','Chema Gaitan','chemagaitan@gmail.com',NULL,'458.405.5336','413 Lindgren Falls\nBashiriantown, ND 06094','$2y$10$rJfW63b9mKBFMPU8F3e5ZO8bdTWHfl16k2/WdxT8uyavBW2DYXAmO',NULL,'2025-03-03 05:52:47','2025-03-03 05:52:47'),(2,'49106749R','Juan Francisco Diaz','Juanfran.Diaz@gmail.com',NULL,'123456789','Artesanos 3ºA','$2y$10$k1ZOyXwndgjPpHmIxhO7puvDZNxTt3ncFo1sPqTS3gDuX5hIx25mK',NULL,'2025-03-03 06:06:19','2025-03-03 06:06:19');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;


--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `db_failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--


--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `concept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `import` double(8,2) NOT NULL,
  `due_date` timestamp NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` bigint unsigned NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_iso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fees_user_id_foreign` (`user_id`),
  CONSTRAINT `fees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `db_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fees`
--


/*!40000 ALTER TABLE `fees` DISABLE KEYS */;
INSERT INTO `fees` VALUES (1,'Fee predeterminado',0.50,'2025-03-07 07:11:00',0,1,'Fee predeterminado a todos los usuarios','eur','2025-03-03 06:11:57','2025-03-03 06:11:57'),(2,'Fee predeterminado',0.50,'2025-03-07 07:11:00',0,2,'Fee predeterminado a todos los usuarios','eur','2025-03-03 06:12:01','2025-03-03 06:12:01');
/*!40000 ALTER TABLE `fees` ENABLE KEYS */;


--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `db_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--


/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `db_migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2025_01_05_194820_create_permission_tables',1),(5,'2025_01_06_000001_create_users_table',1),(6,'2025_01_06_115913_create_employees_table',1),(7,'2025_01_06_120425_create_statuses_table',1),(8,'2025_01_06_120521_create_fees_table',1),(9,'2025_01_06_122558_create_tasks_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--


/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;


--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\Employee',1),(2,'App\\Models\\Employee',2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;


--
-- Table structure for table `paises`
--
--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `db_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--


/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `db_personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `db_personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--



--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--


/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(7,2),(21,2),(23,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;


--
-- Table structure for table `roles`
--


--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `statuses_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--


/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'C','Completed','#22c55e','2025-03-03 05:52:47','2025-03-03 05:52:47'),(2,'P','Pending','#f59e0b','2025-03-03 05:52:47','2025-03-03 05:52:47'),(3,'A','Waiting for approval','#60a5fa','2025-03-03 05:52:47','2025-03-03 05:52:47'),(4,'R','Rejected','#ef4444','2025-03-03 05:52:47','2025-03-03 05:52:47');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;


--
-- Table structure for table `tasks`
--


--
-- Table structure for table `tbl_comunidadesautonomas`
--

DROP TABLE IF EXISTS `tbl_comunidadesautonomas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_comunidadesautonomas` (
  `id` tinyint NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Comunidades Autónomas de España';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_comunidadesautonomas`
--


/*!40000 ALTER TABLE `tbl_comunidadesautonomas` DISABLE KEYS */;
INSERT INTO `tbl_comunidadesautonomas` VALUES (1,'Andalucía'),(2,'Aragón'),(3,'Asturias (Principado de)'),(4,'Balears (Illes)'),(5,'Canarias'),(6,'Cantabria'),(8,'Castilla y León'),(7,'Castilla-La Mancha'),(9,'Cataluña'),(18,'Ceuta'),(10,'Comunidad Valenciana'),(11,'Extremadura'),(12,'Galicia'),(13,'Madrid (Comunidad de)'),(19,'Melilla'),(14,'Murcia (Región de)'),(15,'Navarra (Comunidad Foral de)'),(16,'País Vasco'),(17,'Rioja (La)');
/*!40000 ALTER TABLE `tbl_comunidadesautonomas` ENABLE KEYS */;


--
-- Table structure for table `tbl_provincias`
--

DROP TABLE IF EXISTS `tbl_provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_provincias` (
  `cod` char(2) NOT NULL COMMENT 'Código de la provincia de dos dígitos',
  `nombre` varchar(50) NOT NULL COMMENT 'Nombre de la provincia',
  `comunidad_id` tinyint NOT NULL COMMENT 'Código de la comunidad a la que pertenece',
  PRIMARY KEY (`cod`),
  KEY `nombre` (`nombre`),
  KEY `FK_ComunidadAutonomaProv` (`comunidad_id`),
  CONSTRAINT `FK_ComunidadAutonomaProv` FOREIGN KEY (`comunidad_id`) REFERENCES `tbl_comunidadesautonomas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='Provincias de España; 99 para seleccionar a Nacional';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_provincias`
--


/*!40000 ALTER TABLE `tbl_provincias` DISABLE KEYS */;
INSERT INTO `tbl_provincias` VALUES ('01','Alava',16),('02','Albacete',7),('03','Alicante',10),('04','Almería',1),('05','Ávila',8),('06','Badajoz',11),('07','Balears (Illes)',4),('08','Barcelona',9),('09','Burgos',8),('10','Cáceres',11),('11','Cádiz',1),('12','Castellón',10),('13','Ciudad Real',7),('14','Córdoba',1),('15','Coruña (A)',12),('16','Cuenca',7),('17','Girona',9),('18','Granada',1),('19','Guadalajara',7),('20','Guipúzcoa',16),('21','Huelva',1),('22','Huesca',2),('23','Jaén',1),('24','León',8),('25','Lleida',9),('26','Rioja (La)',17),('27','Lugo',12),('28','Madrid',13),('29','Málaga',1),('30','Murcia',14),('31','Navarra',15),('32','Ourense',12),('33','Asturias',3),('34','Palencia',8),('35','Palmas (Las)',5),('36','Pontevedra',12),('37','Salamanca',8),('38','Santa Cruz de Tenerife',5),('39','Cantabria',6),('40','Segovia',8),('41','Sevilla',1),('42','Soria',8),('43','Tarragona',9),('44','Teruel',2),('45','Toledo',7),('46','Valencia',10),('47','Valladolid',8),('48','Vizcaya',16),('49','Zamora',8),('50','Zaragoza',2),('51','Ceuta',18),('52','Melilla',19);
/*!40000 ALTER TABLE `tbl_provincias` ENABLE KEYS */;




DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tasks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cif` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT '2025-03-03 05:48:36',
  `finish_date` timestamp NULL DEFAULT NULL,
  `postal_code` varchar(255) NOT NULL,
  `pre_notes` text,
  `post_notes` text,
  `summary_uri` varchar(255) DEFAULT NULL,
  `employee_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `province_id` char(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `status_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_employee_id_foreign` (`employee_id`),
  KEY `tasks_user_id_foreign` (`user_id`),
  KEY `tasks_status_id_foreign` (`status_id`),
  KEY `tasks_province_id_foreign` (`province_id`),
  CONSTRAINT `tasks_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tasks_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `tbl_provincias` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tasks_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `db_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--


/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'H01471671','Brian Garrido Picón','698972949','briangarridopicon@gmail.com','Artesanos 3ºA','123456789110','2025-03-03 05:48:36','2025-03-30 07:44:00','21005','123456789',NULL,NULL,2,1,'21',2,'2025-03-03 06:44:19','2025-03-03 06:44:46');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

--
-- Table structure for table `users`
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-03  7:22:55
