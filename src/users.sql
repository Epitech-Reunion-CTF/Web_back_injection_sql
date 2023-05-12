SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS db_login;
USE db_login;

CREATE TABLE IF NOT EXISTS utilisateur (
    id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(3000) NOT NULL,
    password VARCHAR(2555) NOT NULL
);

INSERT INTO utilisateur (username, password) VALUES ('John', 'bondour');
INSERT INTO utilisateur (username, password) VALUES ('Cameron', 'iloli');
INSERT INTO utilisateur (username, password) VALUES ('bernado', 'beleck');
INSERT INTO utilisateur (username, password) VALUES ('jean', 'inzazazf');
INSERT INTO utilisateur (username, password) VALUES ('royce', 'ozakzazf');
INSERT INTO utilisateur (username, password) VALUES ('bari', 'azaeveoez');
INSERT INTO utilisateur (username, password) VALUES ('epictf{fallaitbiencherchercettefoisci}', 'bienjouer');
INSERT INTO utilisateur (username, password) VALUES ('admin', 'EpiEctfZoRo');