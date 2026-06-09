CREATE DATABASE library_system;
USE library_system;

-- ADMIN
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

-- BOOKS
CREATE TABLE books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    author VARCHAR(255),
    isbn VARCHAR(50),
    qty INT,
    available INT
);

-- MEMBERS
CREATE TABLE members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(20)
);

-- ISSUE TABLE
CREATE TABLE issue_books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT,
    member_id INT,
    issue_date DATE,
    return_date DATE NULL,
    due_date DATE,
    fine DECIMAL(10,2) DEFAULT 0,
    status VARCHAR(20) DEFAULT 'issued'
);