CREATE DATABASE  IF NOT EXISTS subasort CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE subasort;

CREATE TABLE Cuenta (
  idCuenta int NOT NULL AUTO_INCREMENT,
  idUsuario INT,
  contrasena VARCHAR (20),
  idTipoCuenta INT,
  PRIMARY KEY (idCuenta));

CREATE TABLE InscSorteo (
  idInscSorteo INT NOT NULL AUTO_INCREMENT,
  idSorteo INT DEFAULT NULL,
  idUsuario INT,
  PRIMARY KEY (idInscSorteo)
) ;

CREATE TABLE InscSubasta (
  idInscSub INT NOT NULL AUTO_INCREMENT,
  idSubasta INT,
  idUsuario int,
  PRIMARY KEY (idInscSub)
);

CREATE TABLE Producto (
  idProducto INT NOT NULL AUTO_INCREMENT,
  nomProducto VARCHAR(50),
  descProducto VARCHAR(500),
  precioCompra VARCHAR(6),
  PRIMARY KEY (idProducto)
);

CREATE TABLE Sorteo (
  idSorteo INT NOT NULL AUTO_INCREMENT,
  idProdSorteo INT,
  idGanaSorteo INT ,
  fechaSorteo DATE NOT NULL,
  precioBoleto DOUBLE (6,6) NOT NULL,
  PRIMARY KEY (idSorteo)
  );

CREATE TABLE Subasta (
  idSubasta INT NOT NULL AUTO_INCREMENT,
  idProdSubasta INT,
  idGanaSubasta INT,
  fechaSubasta  DATE NOT NULL,
  montoMinimo DOUBLE (6,6) NOT NULL,
  PRIMARY KEY (idSubasta)
  );

CREATE TABLE TipoCuenta (
  idTipoCuenta INT NOT NULL AUTO_INCREMENT,
  descripcion varchar(50),
  PRIMARY KEY (idTipoCuenta)
);

CREATE TABLE Usuario (
  idUsuario INT NOT NULL AUTO_INCREMENT,
  ciUsuario VARCHAR(10)  NOT NULL,
  nombreUsuario VARCHAR(50) NOT NULL,
  apellidoUsuario VARCHAR(50) NOT NULL,
  direccionUsuario VARCHAR(50) NOT NULL,
  telfUsuario VARCHAR(50) NOT NULL,
  correoUsuario VARCHAR(50)  NOT NULL,
  PRIMARY KEY (idUsuario)
) ;



ALTER TABLE Cuenta
ADD CONSTRAINT A1 FOREIGN KEY(idUsuario)
REFERENCES Usuario (idUsuario);

ALTER TABLE Cuenta
ADD CONSTRAINT A2 FOREIGN KEY (idTipoCuenta)
REFERENCES TipoCuenta (idTipoCuenta);

ALTER TABLE Subasta 
ADD CONSTRAINT A3 FOREIGN KEY (idProdSubasta)
REFERENCES Producto (idProducto);

ALTER TABLE Subasta
ADD CONSTRAINT A4 FOREIGN KEY (idGanaSubasta)
REFERENCES Usuario (idUsuario);

ALTER TABLE Sorteo 
ADD CONSTRAINT A5 FOREIGN KEY (idProdSorteo)
REFERENCES Producto (idProducto);

ALTER TABLE Sorteo
ADD CONSTRAINT A6 FOREIGN KEY (idGanaSorteo)
REFERENCES Usuario (idUsuario);

ALTER TABLE InscSorteo
ADD CONSTRAINT A7 FOREIGN KEY (idUsuario)
REFERENCES Usuario (idUsuario);

ALTER TABLE InscSubasta
ADD CONSTRAINT A8 FOREIGN KEY (idUsuario)
REFERENCES Usuario (idUsuario);

ALTER TABLE InscSorteo
ADD CONSTRAINT A9 FOREIGN KEY (idSorteo)
REFERENCES Sorteo (idSorteo);

ALTER TABLE InscSubasta
ADD CONSTRAINT A10 FOREIGN KEY (idSubasta)
REFERENCES Subasta (idSubasta);