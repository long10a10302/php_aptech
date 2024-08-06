CREATE DATABASE IF NOT EXISTS exam;

use exam;

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) UNIQUE NOT NULL,
    password_hash CHAR(40) NOT NULL  CHECK (LENGTH(password_hash) >= 6),
    phone INT NOT NULL UNIQUE
);

INSERT INTO users (username, password, phone)
VALUES
  ('johndoe', 'password123', '0987654321'),
  ('janedoe', 'secure_password', '0123456789'),
  ('bobsmith', 'ilovecoding', '0456789012'),
  ('sarahjones', 'mypassword123', '0789012345'),
  ('mikeanderson', 'strongpassword', '0987612345'),
  ('emilywilliams', 'password456', '0123987654'),
  ('davidlee', 'passw0rd', '0456123789'),
  ('jessicajohnson', 'password789', '0789654321'),
  ('markbrown', 'mypassword456', '0612345678'),
  ('sophiathomas', 'secure_password123', '0345678901');