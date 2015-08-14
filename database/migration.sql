USE adlister_db;

DROP TABLE IF EXISTS categories;

CREATE TABLE categories (
    category_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    type VARCHAR(50) NOT NULL,
    PRIMARY KEY (category_id)
);

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    user_id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone BIGINT,
    PRIMARY KEY (user_id)
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
    FOREIGN KEY (category_id) REFERENCES categories (category_id),
    FOREIGN KEY (user_id) REFERENCES users (user_id),
    PRIMARY KEY (id)
);