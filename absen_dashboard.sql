-- Create a database
CREATE DATABASE IF NOT EXISTS `absen_dashboard`;

-- Use the created database
USE `absen_dashboard`;
-- Create a classes table
CREATE TABLE IF NOT EXISTS `classes` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `class_name` VARCHAR(255) NOT NULL
);

-- Create a students table
CREATE TABLE IF NOT EXISTS `students` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `class_id` INT,
    FOREIGN KEY (`class_id`) REFERENCES `classes`(`id`)
);


-- Create a subjects table
CREATE TABLE IF NOT EXISTS `subjects` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `subject_name` VARCHAR(255) NOT NULL
);

-- Create a absensi table
CREATE TABLE absensi (
    id INT PRIMARY KEY AUTO_INCREMENT,
    hari VARCHAR(255) NOT NULL,
    keterangan VARCHAR(255) NOT NULL,
    `student_id` INT,
    `class_id` INT,
    `subject_id` INT,
    FOREIGN KEY (`student_id`) REFERENCES `students`(`id`),
    FOREIGN KEY (`class_id`) REFERENCES `classes`(`id`),
    FOREIGN KEY (`subject_id`) REFERENCES `subjects`(`id`)
);
