CREATE DATABASE IF NOT EXIST EXAM;

USE EXAM;

CREATE TABLE Department(
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE,
);

CREATE TABLE Employee(
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    dept_id int,
    age int CHECK (age >= 18 && age < 80),
    sex VARCHAR(6)
);

