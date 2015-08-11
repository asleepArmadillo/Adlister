USE adlister_db;

DROP TABLE IF EXISTS listings;

CREATE TABLE listings (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    type VARCHAR(100) NOT NULL,
    brand VARCHAR(100) NOT NULL,
    year INT,
    condition VARCHAR(50),
    price DECIMAL(13,2) NOT NULL,
    image_url VARCHAR(100),
    description TEXT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories (id),
    FOREIGN KEY (user_id) REFERENCES users (id),
    PRIMARY KEY (id)
);

DROP TABLE IF EXISTS categories;

CREATE TABLE categories (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    type VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone BIGINT,
    PRIMARY KEY (id)
);