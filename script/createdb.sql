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

                         Likes InT NOT NULL,

                         PRIMARY KEY (id)



);
ALTER TABLE post ADD likes INT;

ALTER TABLE post DROP likes;


DElete FROM post where id = 3;