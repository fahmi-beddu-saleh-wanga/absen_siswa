-- Create a database
CREATE DATABASE IF NOT EXISTS `absenn`;

-- Use the created database
USE `absenn`;


-- Create a users table
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL
);
-- Create a absensi table
CREATE TABLE absen (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_siswa VARCHAR(255) NOT NULL,
    kelas VARCHAR(50) NOT NULL,
    mata_pelajaran VARCHAR(50) NOT NULL,
    hari VARCHAR(50) NOT NULL,
    keterangan VARCHAR(50) NOT NULL
);
