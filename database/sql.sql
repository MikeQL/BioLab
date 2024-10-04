-- fichero de referencia donde van las sentencias sql --
CREATE TABLE users(
    id int NOT NULL AUTO_INCREMENT,
    first_name varchar(100) NOT NULL,
    last_name varchar(255) NOT NULL,
    email varchar(100) NOT NULL UNIQUE,
    password varchar(255),
    PRIMARY KEY (id)
);