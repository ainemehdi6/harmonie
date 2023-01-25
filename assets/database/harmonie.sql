DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `idAdmin` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idAdmin`)
);

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `idEvent` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `statut` enum('En cours','Passé','Annulé') DEFAULT NULL,
  `idAdmin` int DEFAULT NULL,
  PRIMARY KEY (`idEvent`)
);


DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
);

DROP TABLE IF EXISTS `participants`;

CREATE TABLE `participants` (
  `idUser` int DEFAULT NULL,
  `idEvent` int DEFAULT NULL
) ;

CREATE TABLE `memberspassword` (
  `password` varchar(50) NOT NULL
);

INSERT INTO `memberspassword` (`password`) VALUES

('password');
