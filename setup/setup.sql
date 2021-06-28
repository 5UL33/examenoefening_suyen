CREATE DATABASE examenoefening_suyen;

CREATE TABLE Gebruiker (
	id INT NOT NULL AUTO_INCREMENT,
	voornaam VARCHAR(255) NOT NULL,
	achternaam VARCHAR(255) NOT NULL,
	telefoonnummer INT,
	email VARCHAR(255) NOT NULL,
	wachtwoord VARCHAR(60) NOT NULL,
	is_admin BOOLEAN,

	PRIMARY KEY(id)
);

CREATE TABLE Groep (
	id INT NOT NULL AUTO_INCREMENT,
	naam VARCHAR(255),
	beschrijving VARCHAR(255),

	PRIMARY KEY(id)
);

CREATE TABLE Groepsleden (

);