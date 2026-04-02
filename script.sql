-- Créer la base de données
CREATE DATABASE IF NOT EXISTS school;
USE school;

-- Création de la table students
CREATE TABLE students(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

