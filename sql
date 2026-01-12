CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('teacher') NOT NULL DEFAULT 'teacher'
);


CREATE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    student_number VARCHAR(50),
    course VARCHAR(50),
    year_level VARCHAR(20),
    status VARCHAR(20) DEFAULT 'Active'
);


CREATE TABLE attendance (
    attendance_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    student_name VARCHAR(100) NOT NULL,
    date_today DATE NOT NULL,
    time_in VARCHAR(20),
    time_out VARCHAR(20),
    remarks ENUM('Present','Late','Absent') NOT NULL,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE
);

INSERT INTO teachers (id, fullname, username, password) VALUES
(1, 'Maria Santos', 'teacher1', 'password'),
(2, 'Juan Dela Cruz', 'teacher2', 'password'),
(3, 'Ana Lopez', 'teacher3', 'password'),
(4, 'Carlos Reyes', 'teacher4', 'password'),
(5, 'Liza Mendoza', 'teacher5', 'password'),
(6, 'Mark Villanueva', 'teacher6', 'password'),
(7, 'Grace Navarro', 'teacher7', 'password'),
(8, 'Paul Fernandez', 'teacher8', 'password'),
(9, 'Jenny Ramos', 'teacher9', 'password'),
(10, 'Robert Lim', 'teacher10', 'password');

INSERT INTO teachers (id, fullname, username, password) VALUES
(1, 'Maria Santos', 'teacher1', 'password'),
(2, 'Juan Dela Cruz', 'teacher2', 'password'),
(3, 'Ana Lopez', 'teacher3', 'password'),
(4, 'Carlos Reyes', 'teacher4', 'password'),
(5, 'Liza Mendoza', 'teacher5', 'password'),
(6, 'Mark Villanueva', 'teacher6', 'password'),
(7, 'Grace Navarro', 'teacher7', 'password'),
(8, 'Paul Fernandez', 'teacher8', 'password'),
(9, 'Jenny Ramos', 'teacher9', 'password'),
(10, 'Robert Lim', 'teacher10', 'password');

INSERT INTO students (id, fullname) VALUES
(1, 'Anna Manzanares'),
(2, 'Emmy Cruz'),
(3, 'Eric Johnson'),
(4, 'John Perez'),
(5, 'Sofia Ramirez'),
(6, 'Michael Tan'),
(7, 'Karen Bautista'),
(8, 'Daniel Ong'),
(9, 'Paolo Garcia'),
(10, 'Nicole Santos');
