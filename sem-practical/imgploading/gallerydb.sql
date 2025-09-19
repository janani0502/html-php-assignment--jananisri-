-- Create the database
CREATE DATABASE IF NOT EXISTS gallerydb;
USE gallerydb;

-- Create the images table
CREATE TABLE IF NOT EXISTS images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    title VARCHAR(100) DEFAULT NULL,
    description TEXT DEFAULT NULL,
    uploaded_by VARCHAR(50) DEFAULT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
