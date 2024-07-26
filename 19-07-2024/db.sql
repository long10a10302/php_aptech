CREATE DATABASE IF NOT EXISTS EXAM;

USE EXAM;

CREATE TABLE Department(
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE Employee(
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    dept_id int,
    age int CHECK (age >= 18 && age < 80),
    sex VARCHAR(6)
);

ALTER TABLE Employee
ADD CONSTRAINT fk_dept_id FOREIGN KEY (dept_id)
REFERENCES Department(id);

-- Insert 20 records into the Department table
INSERT INTO Department (name) VALUES
('IT'),
('HR'),
('Finance'),
('Marketing'),
('Operations'),
('Sales'),
('Legal'),
('R&D'),
('Customer Service'),
('Procurement'),
('Accounting'),
('IT Support'),
('Project Management'),
('Logistics'),
('Quality Assurance'),
('Administrative'),
('Training'),
('Facilities'),
('Risk Management'),
('Public Relations');

-- Insert 20 records into the Employee table
INSERT INTO Employee (name, dept_id, age, sex) VALUES
('John Doe', 1, 35, 'Male'),
('Jane Smith', 2, 28, 'Female'),
('Michael Johnson', 3, 42, 'Male'),
('Emily Davis', 4, 31, 'Female'),
('David Brown', 5, 29, 'Male'),
('Sarah Wilson', 6, 37, 'Female'),
('Robert Taylor', 7, 48, 'Male'),
('Jessica Anderson', 8, 27, 'Female'),
('Christopher Lee', 9, 33, 'Male'),
('Olivia Thompson', 10, 25, 'Female'),
('Daniel White', 11, 39, 'Male'),
('Emma Martinez', 12, 30, 'Female'),
('William Garcia', 13, 44, 'Male'),
('Sophia Gonzalez', 14, 26, 'Female'),
('Alexander Diaz', 15, 36, 'Male'),
('Isabella Reyes', 16, 32, 'Female'),
('Matthew Gutiérrez', 17, 41, 'Male'),
('Ava Ramírez', 18, 23, 'Female'),
('Joshua Morales', 19, 38, 'Male'),
('Avery Castillo', 20, 27, 'Female');

