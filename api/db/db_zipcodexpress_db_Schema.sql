--
-- Database: `zipcodexpress_db`
--

CREATE DATABASE IF NOT EXISTS `zipcodexpress_db`;
USE `zipcodexpress_db`;


-- ENTITIES

--
-- Struttura della tabella `app_version`
--

CREATE TABLE IF NOT EXISTS `app_version` (
	`id` int  NOT NULL,
	
	-- RELAZIONI

	`_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT 

);






