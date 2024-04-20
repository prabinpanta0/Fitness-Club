-- Creating the database
CREATE DATABASE IF NOT EXISTS the_fitness_club;
USE the_fitness_club;

-- Creating the users table
CREATE TABLE IF NOT EXISTS users (
   id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(255) NOT NULL,
   Gender VARCHAR(10) NOT NULL,
   Age INT NOT NULL,
   email VARCHAR(255) UNIQUE NOT NULL,
   password VARCHAR(255) NOT NULL,
   address VARCHAR(255) NOT NULL,
   profile_pic LONGBLOB,
   membership VARCHAR(255) NOT NULL,
   duration VARCHAR(255) NOT NULL
);