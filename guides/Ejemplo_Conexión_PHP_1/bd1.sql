-- Create the 'colores' database
CREATE DATABASE IF NOT EXISTS colores CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Use the 'colores' database
USE colores;

-- Create the 'color' table
CREATE TABLE IF NOT EXISTS color (
    id INT AUTO_INCREMENT PRIMARY KEY,
    color VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255) NOT NULL
);
