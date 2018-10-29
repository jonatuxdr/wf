CREATE DATABASE IF NOT EXISTS tagBeSill CHAR SET utf8 COLLATE utf8_bin;

USE tagBeSill;

CREATE TABLE IF NOT EXISTS Status (
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) NOT NULL,
    description BLOB NOT NULL
)engine InnoDB;

CREATE TABLE IF NOT EXISTS Project (
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title varchar(255) NOT NULL,
	description BLOB NOT NULL,
	image varchar(255) DEFAULT NULL,
	pubDate DATETIME DEFAULT NULL,
	creationDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updatedAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	statusId INTEGER UNSIGNED NOT NULL,
	FOREIGN KEY (statusId) REFERENCES Status(id)
) engine InnoDB;

CREATE TABLE IF NOT EXISTS Category(
	id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) NOT NULL,
    description BLOB NOT NULL
)engine InnoDB;

CREATE TABLE IF NOT EXISTS projectCategory(
    projectId INTEGER UNSIGNED,
    categoryId INTEGER UNSIGNED,
    PRIMARY KEY (projectId, categoryId),
    FOREIGN KEY (projectId) REFERENCES Project(id),
    FOREIGN KEY (categoryId) REFERENCES Category(id)
)engine InnoDB;

/*
Faut avoir déclarer les tables afin de pouvoir accéder aux foreign keys !!!!!!!!!!!!!!!!
*/

INSERT INTO Category(label, description) VALUES
	('Management', 'Lorem ipsum dolor si amet'),
    ('ERP', 'Lorem ipsum dolor si amet'),
    ('DMZ','Lorem ipsum dolor si amet');
    
    /*DMZ = Comme une phase de test. Exemple User --Envoie de gros ficher-------DMZ(va checker si il y a pas de malware dans le gros fichier puis le renvoie à l'appli)----------- Appli*/

INSERT INTO Status(label, description) VALUES
	('Analysis', 'Lorem ipsum'),
    ('In progress', 'Lorem ipsum '),
    ('Blocked','Lorem ipsum'),
    ('Out of budget','Lorem ipsum');
    
INSERT INTO Project(title, description, image, pubDate, statusId) VALUES
	('wf3m', 'Lorem ipsum', 'img/myPicture1.JPG', NOW(), 1),
    ('In progress', 'Lorem ipsum', 'img/myPicture2.jpg', NOW(), 3),
    ('Out of budget', 'Lorem ipsum asset', 'img/myPicture3.jpg', NOW(), 1),
    ('Analysis', 'Lorem ipsum asset me to the end', 'img/myPicture4.jpg', NOW(), 2),
    ('Blocked', 'Lorem ipsum asset me to the end blablablablablablabla', 'img/myPicture5.jpg', NOW(), 3);
    
INSERT INTO projectCategory VALUES
	(1,1),
    (2,2),
    (2,3);
