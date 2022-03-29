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

                         Likes INT NOT NULL,

                        comment_id INT NOT NULL,

                        message TEXT NOT NULL,

                      PRIMARY KEY (id)



);

DROP TABLE IF EXISTS comment;

CREATE TABLE comment
(

    id INT NOT NULL AUTO_INCREMENT,
    comment VARCHAR (500),
    post_id INT NOT NULL,
    PRIMARY KEY (id)
);

