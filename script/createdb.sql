DROP DATABASE IF EXISTS Social_Site;

CREATE DATABASE Social_Site;

USE Social_Site;



DROP TABLE IF EXISTS Post;

CREATE TABLE Post (

                         id INT NOT NULL AUTO_INCREMENT,

                         auteur VARCHAR(50),

                         titel VARCHAR(50),

                         bericht VARCHAR(50),

                         afbeelding VARCHAR(225),
                         PRIMARY KEY (id)


);


DElete FROM post where id = 3;