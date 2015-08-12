USE adlister_db;

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

-- drop foreign keys first
DROP TABLE IF EXISTS listings;

CREATE TABLE listings (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    category_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    title VARCHAR(100) NOT NULL,
    date_posted DATE NOT NULL,
    brand VARCHAR(100),
    year INT UNSIGNED,
    item_condition VARCHAR(50) NOT NULL,
    price FLOAT(13,2) NOT NULL,
    image_url VARCHAR(100),
    description TEXT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories (id),
    FOREIGN KEY (user_id) REFERENCES users (id),
    PRIMARY KEY (id)
);