-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS escuela;
USE escuela;

-- Crear tabla de materiales

--Esta tabla guarda:

--El nombre original del archivo
--La ruta donde se guarda
--El año (1, 3, 6)
--Una descripción opcional
--La fecha de subida

CREATE TABLE IF NOT EXISTS materiales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    nombre_archivo VARCHAR(255) NOT NULL,
    ruta VARCHAR(255) NOT NULL,
    anio INT NOT NULL,
    fecha_subida TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

