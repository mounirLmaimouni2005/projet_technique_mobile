CREATE TABLE IF NOT EXISTS tourguide (
    id_tourguide INT AUTO_INCREMENT PRIMARY KEY,
    nom_complete_tourguide VARCHAR(100) NOT NULL,
    email_tourguide VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    telephone VARCHAR(20)
);



CREATE TABLE IF NOT EXISTS region (
    id_region INT AUTO_INCREMENT PRIMARY KEY,
    nom_region VARCHAR(100) NOT NULL UNIQUE
);


CREATE TABLE IF NOT EXISTS destination (
    id_destination INT AUTO_INCREMENT PRIMARY KEY,
    nom_destination VARCHAR(100) NOT NULL,
    description_destination TEXT NOT NULL,
    image VARCHAR(255),
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_tourguide INT NOT NULL,
    id_region INT NOT NULL,

    FOREIGN KEY (id_tourguide) REFERENCES tourguide(id_tourguide),
    FOREIGN KEY (id_region) REFERENCES region(id_region)
);


SELECT * FROM tourguide;
SELECT * FROM region ; 
SELECT * FROM destination ; 

SHOW databases;
USE destination_db