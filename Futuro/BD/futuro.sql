create database futuro;
use futuro;
/*Tablas*/
CREATE TABLE empresa (
  `id` integer PRIMARY KEY auto_increment,
  `nombre` varchar(255),
  `apellido` varchar(255),
  `telefono` varchar(255),
  `correo` varchar(255) unique,
  `contrasena` varchar(255),
  `nombre_empresa` varchar(255),
  `sector` varchar(255),
  `estado` ENUM('Aguascalientes', 'Baja California', 'Baja California Sur', 'Campeche', 'Chiapas', 'Chihuahua', 'Coahuila', 'Colima', 
  'Durango', 'Guanajuato', 'Guerrero', 'Hidalgo', 'Jalisco', 'México', 'Michoacán', 'Morelos', 'Nayarit', 'Nuevo León', 'Oaxaca', 'Puebla', 
  'Querétaro', 'Quintana Roo', 'San Luis Potosí', 'Sinaloa', 'Sonora', 'Tabasco', 'Tamaulipas', 'Tlaxcala', 'Veracruz', 'Yucatán', 'Zacatecas'),
  `rfc` varchar(255)
);

CREATE TABLE `oferta` (
  `id` integer PRIMARY KEY auto_increment,
  `id_empresa` integer,
  `cargo` varchar(255),
  `salario` float,
  `area` varchar(255),
  `estado`ENUM('Aguascalientes', 'Baja California', 'Baja California Sur', 'Campeche', 'Chiapas', 'Chihuahua', 'Coahuila', 'Colima', 
  'Durango', 'Guanajuato', 'Guerrero', 'Hidalgo', 'Jalisco', 'México', 'Michoacán', 'Morelos', 'Nayarit', 'Nuevo León', 'Oaxaca', 'Puebla', 
  'Querétaro', 'Quintana Roo', 'San Luis Potosí', 'Sinaloa', 'Sonora', 'Tabasco', 'Tamaulipas', 'Tlaxcala', 'Veracruz', 'Yucatán', 'Zacatecas'),
   `fecha` date
);

CREATE TABLE `postulacion` (
  `id` integer PRIMARY KEY auto_increment,
  `id_oferta` integer,
  `id_universitario` integer,
  `fecha` date
);

CREATE TABLE `universitario` (
  `id` integer PRIMARY KEY auto_increment,
  `nombre` varchar(255),
  `apellido` varchar(255),
  `telefono` varchar(255),
  `correo` varchar(255) unique,
  `contrasena` varchar(255),
  `universidad` varchar(255),
  `carrera` varchar(255),
  `estado`ENUM('Aguascalientes', 'Baja California', 'Baja California Sur', 'Campeche', 'Chiapas', 'Chihuahua', 'Coahuila', 'Colima', 
  'Durango', 'Guanajuato', 'Guerrero', 'Hidalgo', 'Jalisco', 'México', 'Michoacán', 'Morelos', 'Nayarit', 'Nuevo León', 'Oaxaca', 'Puebla', 
  'Querétaro', 'Quintana Roo', 'San Luis Potosí', 'Sinaloa', 'Sonora', 'Tabasco', 'Tamaulipas', 'Tlaxcala', 'Veracruz', 'Yucatán', 'Zacatecas')
);

CREATE TABLE reg_postulacion(
  `id` integer PRIMARY KEY auto_increment,
  `id_oferta` integer,
  `id_universitario` integer,
  `fecha` date,
  registro DATETIME
);

CREATE TABLE reg_oferta(
  `id` integer PRIMARY KEY auto_increment,
  `id_empresa` integer,
  `cargo` varchar(255),
  `salario` float,
  `area` varchar(255),
  `estado`ENUM('Aguascalientes', 'Baja California', 'Baja California Sur', 'Campeche', 'Chiapas', 'Chihuahua', 'Coahuila', 'Colima', 
  'Durango', 'Guanajuato', 'Guerrero', 'Hidalgo', 'Jalisco', 'México', 'Michoacán', 'Morelos', 'Nayarit', 'Nuevo León', 'Oaxaca', 'Puebla', 
  'Querétaro', 'Quintana Roo', 'San Luis Potosí', 'Sinaloa', 'Sonora', 'Tabasco', 'Tamaulipas', 'Tlaxcala', 'Veracruz', 'Yucatán', 'Zacatecas'), 
	 `fecha` date,
  `registro` DATETIME
);

CREATE TABLE reg_usuarios(
  `id` integer PRIMARY KEY auto_increment,
  tipo int, 
  `correo` varchar(255) unique,
  `contrasena` varchar(255)
  );
  
  CREATE TABLE comentario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    mensaje TEXT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

/*Llaves foraneas*/
ALTER TABLE `oferta` ADD FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`);

ALTER TABLE `postulacion` ADD FOREIGN KEY (`id_oferta`) REFERENCES `oferta` (`id`);

ALTER TABLE `postulacion` ADD FOREIGN KEY (`id_universitario`) REFERENCES `universitario` (`id`);

/*Triggers*/
CREATE TRIGGER postulacion_BD AFTER INSERT ON postulacion FOR EACH ROW 
INSERT INTO reg_postulacion (id, id_oferta, id_universitario, fecha, registro)
VALUES (new.id, new.id_oferta, new.id_universitario, new.fecha, now());

CREATE TRIGGER oferta_BD AFTER DELETE ON oferta FOR EACH ROW 
INSERT INTO reg_postulacion (id, id_empresa, cargo, salario, area, estado, fecha, registro)
VALUES (OLD.id, OLD.id_empresa, OLD.cargo, OLD.salario, OLD.area, OLD.estado, OLD.fecha, NOW());

CREATE TRIGGER usuario0_BD AFTER INSERT ON empresa FOR each row
INSERT INTO reg_usuarios (tipo, correo, contrasena)
VALUES (0, new.correo, new.contrasena);

CREATE TRIGGER usuario1_BD AFTER INSERT ON universitario FOR each row
INSERT INTO reg_usuarios (tipo, correo, contrasena)
VALUES (1, new.correo, new.contrasena);

/*Vistas*/
CREATE VIEW ofertas AS
SELECT oferta.id as id_oferta, oferta.cargo, oferta.area, oferta.id_empresa, empresa.nombre_empresa AS nombre_empresa, oferta.estado, oferta.salario, oferta.fecha
FROM oferta
INNER JOIN empresa ON oferta.id_empresa = empresa.id;

CREATE VIEW empresas AS
SELECT nombre_empresa, sector, estado
FROM empresa;

CREATE VIEW comentarios AS
SELECT nombre, mensaje, fecha_creacion as fecha
FROM comentario;

CREATE VIEW universitarios AS
SELECT nombre, apellido, carrera, estado, universidad
FROM universitario;

CREATE VIEW postulaciones AS
SELECT
    p.id,
    o.cargo AS cargo_oferta,
    u.nombre AS nombre_universitario,
    p.fecha
FROM
    postulacion p
JOIN
    oferta o ON p.id_oferta = o.id
JOIN
    universitario u ON p.id_universitario = u.id;

/*Insertar datos*/
INSERT INTO universitario (nombre, apellido, telefono, correo, contrasena, universidad, carrera, estado) VALUES
('Juan', 'García', '123456789', 'juan@gmail.com', 'password123', 'Universidad Nacional', 'Ingeniería Informática', 'Jalisco'),
('María', 'López', '987654321', 'maria@hotmail.com', 'securepass', 'Universidad Autónoma', 'Medicina', 'México'),
('Carlos', 'Martínez', '555111222', 'carlos@yahoo.com', 'mypassword', 'Tec de Monterrey', 'Arquitectura', 'Nuevo León'),
('Ana', 'Sánchez', '333444555', 'ana@gmail.com', 'pass123', 'Benemérita Universidad', 'Derecho', 'Querétaro'),
('Pedro', 'Ramírez', '777888999', 'pedro@gmail.com', 'pass456', 'Universidad Politécnica', 'Ciencias de la Computación', 'Veracruz'),
('Laura', 'Gómez', '666777888', 'laura@hotmail.com', 'passwordabc', 'Instituto Tecnológico', 'Ingeniería Civil', 'Sonora'),
('Eduardo', 'Torres', '111222333', 'eduardo@yahoo.com', 'securepass123', 'Universidad de Guadalajara', 'Psicología', 'Guanajuato'),
('Sofía', 'Díaz', '999000111', 'sofia@gmail.com', 'mypassword456', 'ITESM', 'Ingeniería Industrial', 'Puebla'),
('Héctor', 'Fernández', '444555666', 'hector@hotmail.com', 'pass789', 'Universidad Autónoma de México', 'Economía', 'Tamaulipas'),
('Carmen', 'Hernández', '123123123', 'carmen@yahoo.com', 'password789', 'Universidad Nacional Autónoma', 'Biología', 'Sinaloa');

INSERT INTO `empresa`(`nombre`, `apellido`, `telefono`, `correo`, `contrasena`, `nombre_empresa`, `sector`, `estado`, `rfc`) VALUES 
('Juan', 'Pérez', '5551234567', 'juan@example.com', 'password1', 'Amazon', 'Tecnología', 'Jalisco', 'RFC111111'),
('María', 'López', '5559876543', 'maria@example.com', 'password2', 'Mercado Libre', 'Servicios', 'Nuevo León', 'RFC222222'),
('Carlos', 'González', '5551112233', 'carlos@example.com', 'password3', 'Techme', 'Manufactura', 'Zacatecas', 'RFC333333'),
('Ana', 'Martínez', '5554445566', 'ana@example.com', 'password4', 'Duolingo', 'Educación', 'Puebla', 'RFC444444'),
('Pedro', 'Sánchez', '5559990000', 'pedro@example.com', 'password5', 'IMSS', 'Salud', 'Yucatán', 'RFC555555'),
('Laura', 'Ramírez', '5556667777', 'laura@example.com', 'password6', 'Nu', 'Finanzas', 'Sinaloa', 'RFC666666'),
('Roberto', 'Hernández', '5551112222', 'roberto@example.com', 'password7', 'Shein', 'Comercio', 'Chiapas', 'RFC777777'),
('Sofía', 'Díaz', '5554445555', 'sofia@example.com', 'password8', 'Primera Plus', 'Transporte', 'Coahuila', 'RFC888888'),
('Luis', 'Fernández', '5552223333', 'luis@example.com', 'password9', 'Telcel', 'Telecomunicaciones', 'Veracruz', 'RFC999999'),
('Marta', 'Vargas', '5557778888', 'marta@example.com', 'password10', 'CFE', 'Energía', 'Guanajuato', 'RFC101010');

INSERT INTO oferta (id_empresa, cargo, salario, area, estado, fecha) VALUES
(1, 'Desarrollador Web', 50000.00, 'Tecnología', 'Jalisco', '2023-01-15'),
(2, 'Analista de Datos', 60000.00, 'Ciencias de la Computación', 'Nuevo León', '2023-02-20'),
(3, 'Ingeniero Civil', 75000.00, 'Ingeniería Civil', 'Veracruz', '2023-03-10'),
(4, 'Abogado Corporativo', 80000.00, 'Derecho', 'Querétaro', '2023-04-05'),
(5, 'Psicólogo Organizacional', 70000.00, 'Psicología', 'Guanajuato', '2023-05-12'),
(6, 'Economista Financiero', 90000.00, 'Economía', 'Tamaulipas', '2023-06-18'),
(7, 'Biólogo Molecular', 85000.00, 'Biología', 'Sinaloa', '2023-07-23'),
(8, 'Ingeniero Industrial', 70000.00, 'Ingeniería Industrial', 'Puebla', '2023-08-30'),
(9, 'Arquitecto Paisajista', 80000.00, 'Arquitectura', 'Sonora', '2023-09-14'),
(10, 'Médico General', 95000.00, 'Medicina', 'México', '2023-10-05');

INSERT INTO postulacion (id_oferta, id_universitario, fecha) VALUES 
(1, 1, '2023-01-01'),
(2, 2, '2023-01-02'),
(3, 3, '2023-01-03'),
(4, 4, '2023-01-04'),
(5, 5, '2023-01-05'),
(6, 6, '2023-01-06'),
(7, 7, '2023-01-07'),
(8, 8, '2023-01-08'),
(9, 9, '2023-01-09'),
(10, 10, '2023-01-10');

INSERT INTO comentario (`id`, `nombre`, `correo`, `mensaje`, `fecha_creacion`) VALUES 
(1, 'Ana', 'ana@example.com', '¡Gran trabajo!', '2023-12-10'),
(2, 'Carlos', 'carlos@example.com', 'Me encanta este contenido.', '2023-12-10'),
(3, 'Elena', 'elena@example.com', 'Fascinante.', '2023-12-10'),
(4, 'David', 'david@example.com', '¡Impresionante!', '2023-12-10'),
(5, 'Fernanda', 'fernanda@example.com', 'Gracias por compartir esto.', '2023-12-10'),
(6, 'Gabriel', 'gabriel@example.com', 'Interesante.', '2023-12-10'),
(7, 'Isabel', 'isabel@example.com', 'Me inspira.', '2023-12-10'),
(8, 'Javier', 'javier@example.com', '¡Bien hecho!', '2023-12-10'),
(9, 'Karla', 'karla@example.com', 'Me encanta tu estilo.', '2023-12-10'),
(10, 'Luis', 'luis@example.com', 'Sigue así.', '2023-12-10');