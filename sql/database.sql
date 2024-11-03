CREATE DATABASE taskmaster;
USE taskmaster;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY PRIMARY KEY,
    username VARCHAR(50),
    title VARCHAR(100),
    description TEXT,
    status VARCHAR(50),
    category VARCHAR(50),
    FOREIGN KEY (username) REFERENCES users(username)
);
