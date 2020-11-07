CREATE DATABASE atividade1;
USE atividade1;

CREATE TABLE estado (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(80) NOT NULL,
    sigla CHAR(2) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE cidade (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(80) NOT NULL,
	idEstado INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(idEstado) REFERENCES estado (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE cliente (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    idade INT NOT NULL,
    idCidade INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (idCidade) REFERENCES cidade (id) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO estado VALUES (2,'Brasília','DF'),(4,'Rio de Janeiro','RJ'),(9,'Tocantins','TO'),(11,'Piauí','PI'),(12,'São Paulo','SP'),(14,'Acre','AC'),(15,'Goiás','GO'),(19,'São Paulo','SP');

INSERT INTO `cidade` VALUES (4,'Goiânia',15),(5,'Rialma',15),(6,'Itapaci',15),(7,'Ceres',15),(8,'Rialma',15);

INSERT INTO `cliente` VALUES (6,'Pedro',22,7),(9,'Joana',20,4),(10,'João',32,7),(11,'André',19,7);