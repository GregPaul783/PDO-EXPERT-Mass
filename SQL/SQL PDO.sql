CREATE DATABASE winkel;

use winkel;

CREATE TABLE user(
userID int NOT NULL AUTO_INCREMENT,
naam varchar(255),
email varchar(255),
password varchar(255),
PRIMARY KEY(userID)
);

SELECT * FROM user;

CREATE TABLE product(
productID int NOT NULL AUTO_INCREMENT,
omschrijving varchar(255),
foto LONGBLOB,
prijs decimal(6,2),
PRIMARY KEY(productID)
);

SELECT * FROM product;