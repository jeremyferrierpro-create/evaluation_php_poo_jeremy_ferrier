-- Je crée la base de données si elle existe pas.
CREATE DATABASE IF NOT EXISTS games CHARSET utf8mb4;

-- Utilisation de la base de données créée
USE games;

-- Je crée les tables
CREATE TABLE IF NOT EXISTS console(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`name` VARCHAR(50) UNIQUE NOT NULL,
manufacturer VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS video_game(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`type` VARCHAR(50) NOT NULL,
title VARCHAR(50) NOT NULL,
publish_at DATE NOT NULL,
id_console INT NOT NULL,
CONSTRAINT fk_console_publish_video_game
FOREIGN KEY(id_console)
REFERENCES console(id)
ON DELETE CASCADE
);

-- Insertion de données
INSERT INTO `console` (`name`, manufacturer) VALUES
("PlayStation 5", 'Sony'),
("Switch", "Nintendo"),
("Xbox Series X", 'Microsoft'),
("Steam Deck", 'Valve');


