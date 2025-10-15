-- Crear base de datos
CREATE DATABASE IF NOT EXISTS registro_formulario
USE registro_formulario;

-- Crear tabla de registros
CREATE TABLE IF NOT EXISTS registros (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  producto VARCHAR(100) NOT NULL,
  mes VARCHAR(20) NOT NULL,
  cantidad INT NOT NULL,
  fecha_hora DATETIME NOT NULL,
  UNIQUE KEY unique_registro (email, mes, cantidad)
);
