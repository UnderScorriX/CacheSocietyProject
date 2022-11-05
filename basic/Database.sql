CREATE DATABASE yii2basic_roberto;

USE yii2basic_roberto;


CREATE TABLE `logopedista` (
  `mail` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `dataNascita` date DEFAULT NULL,
  `password` char(20) NOT NULL,
  PRIMARY KEY (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `utente` (
  `mail` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `dataNascita` date DEFAULT NULL,
  `password` char(20) NOT NULL,
  `logopedista` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mail`),
  KEY `logopedista` (`logopedista`),
  CONSTRAINT `utente_ibfk_1` FOREIGN KEY (`logopedista`) REFERENCES `logopedista` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `caregiver` (
  `mail` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `dataNascita` date DEFAULT NULL,
  `utenteAss` varchar(50) DEFAULT NULL,
  `password` char(20) NOT NULL,
  PRIMARY KEY (`mail`),
  KEY `utenteAss` (`utenteAss`),
  CONSTRAINT `caregiver_ibfk_1` FOREIGN KEY (`utenteAss`) REFERENCES `utente` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `prenotazione` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `mailLogopedista` varchar(50) NOT NULL,
  `mailCaregiver` varchar(50) NOT NULL,
  `mailUtente` varchar(50) NOT NULL,
  `conferma` int DEFAULT '0',
  `diagnosiId` int DEFAULT NULL,
  `ora` time DEFAULT NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mailLogopedista` (`mailLogopedista`),
  KEY `mailCaregiver` (`mailCaregiver`),
  KEY `mailUtente` (`mailUtente`),
  KEY `diagnosiId` (`diagnosiId`),
  CONSTRAINT `prenotazione_ibfk_1` FOREIGN KEY (`mailLogopedista`) REFERENCES `logopedista` (`mail`),
  CONSTRAINT `prenotazione_ibfk_2` FOREIGN KEY (`mailCaregiver`) REFERENCES `caregiver` (`mail`),
  CONSTRAINT `prenotazione_ibfk_3` FOREIGN KEY (`mailUtente`) REFERENCES `utente` (`mail`),
  CONSTRAINT `prenotazione_ibfk_4` FOREIGN KEY (`diagnosiId`) REFERENCES `diagnosi` (`id`),
  UNIQUE KEY `prenotazione_ibun_1` (`data`,`ora`,`mailLogopedista`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `diagnosi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `percorso` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



