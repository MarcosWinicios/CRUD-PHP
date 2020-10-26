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
    FOREIGN KEY(idEstado) REFERENCES estado (id)
);

CREATE TABLE cliente (
    id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(20) NOT NULL,
    idade INT NOT NULL,
    idCidade INT NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY (idCidade) REFERENCES cidade (id)
    
);



INSERT INTO `atividade1`.`estado` (`nome`, `sigla`) VALUES ('Goiás', 'GO');
INSERT INTO `atividade1`.`estado` (`nome`, `sigla`) VALUES ('Brasília', 'DF');
INSERT INTO `atividade1`.`estado` (`nome`, `sigla`) VALUES ('São Paulo', 'SP');

INSERT INTO `atividade1`.`cidade` (`nome`, `idEstado`) VALUES ('Itapaci', '1');
INSERT INTO `atividade1`.`cidade` (`nome`, `idEstado`) VALUES ('Ceres', '1');
INSERT INTO `atividade1`.`cidade` (`nome`, `idEstado`) VALUES ('São Paulo', '3');

INSERT INTO `atividade1`.`cliente` (`nome`, `idade`, `idCidade`) VALUES ('Marcos ', '20', '1');
INSERT INTO `atividade1`.`cliente` (`nome`, `idade`, `idCidade`) VALUES ('Lucas', '30', '2');
INSERT INTO `atividade1`.`cliente` (`nome`, `idade`, `idCidade`) VALUES ('Maria', '25', '1');
INSERT INTO `atividade1`.`cliente` (`nome`, `idade`, `idCidade`) VALUES ('José', '18', '2');
INSERT INTO `atividade1`.`cliente` (`nome`, `idade`, `idCidade`) VALUES ('Joana', '19', '3');

