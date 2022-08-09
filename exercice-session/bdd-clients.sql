DROP DATABASE IF EXISTS `bdd-clients`;

CREATE DATABASE `bdd-clients`;

USE `bdd-clients`;

CREATE TABLE `CLIENTS`(
idClient INTEGER NOT NULL AUTO_INCREMENT,
nomClient VARCHAR(255) NOT NULL,
prenomClient VARCHAR(255) NOT NULL,
adresseMailClient VARCHAR(255) NOT NULL,
mdpClient VARCHAR(255) NOT NULL,
CONSTRAINT pkClient PRIMARY KEY(idClient)
);