CREATE DATABASE IF NOT EXISTS vijesti_db;

USE vijesti_db;

CREATE TABLE IF NOT EXISTS articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    about TEXT NOT NULL,
    content TEXT NOT NULL,
    pphoto VARCHAR(255) NOT NULL,
    category VARCHAR(50) NOT NULL,
    archive BOOLEAN NOT NULL,
    contentReal TEXT NOT NULL,
    aboutReal TEXT NOT NULL,
    contentReal2 TEXT NOT NULL
);
