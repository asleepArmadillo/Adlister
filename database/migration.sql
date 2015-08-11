USE adlister_db;

DROP TABLE IF EXISTS instruments;

CREATE TABLE instruments (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    type VARCHAR(100) NOT NULL,
    brand VARCHAR(100) NOT NULL,
    year INT,
    condition VARCHAR(50),
    price DECIMAL(13,2) NOT NULL,
    image_url VARCHAR(100),
    description TEXT NOT NULL,
    PRIMARY KEY (id)
);