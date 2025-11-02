CREATE DATABASE IF NOT EXISTS openshelf CHARACTER SET utf8 COLLATE utf8_general_ci;
USE openshelf;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    user_email VARCHAR(255) NOT NULL UNIQUE,
    user_cpf VARCHAR(20) NOT NULL,
    user_password VARCHAR(255) NOT NULL
);

CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_title VARCHAR(255) NOT NULL,
    book_pages INT,
    book_year INT,
    book_genre VARCHAR(100),
    book_author VARCHAR(255)
);

CREATE TABLE lendings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    book_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (book_id) REFERENCES books(id) ON DELETE CASCADE,
    UNIQUE KEY (user_id, book_id)
);