USE AdoptaGatitos;

-- Poblar la tabla Personalidad
INSERT INTO Personalidad (nombre, descripcion) VALUES
('Juguetón', 'Le encanta jugar y correr por todos lados'),
('Tranquilo', 'Prefiere descansar y observar su entorno'),
('Cariñoso', 'Siempre busca caricias y compañía humana'),
('Independiente', 'Le gusta explorar y no siempre busca atención');

-- Poblar la tabla Raza
INSERT INTO Raza (nombre, descripcion) VALUES
('Mestizo', 'Gato sin raza específica'),
('Siames', 'Pelaje claro con patas, orejas y cola oscuras'),
('Persa', 'Pelaje largo y cara achatada'),
('Maine Coon', 'Gato grande y pelaje esponjoso');

-- Poblar la tabla Categoria_Producto
INSERT INTO Categoria_Producto (nombre, descripcion) VALUES
('Alimento', 'Comida para gatos enlatada o seca'),
('Juguetes', 'Pelotas, rascadores y otros juguetes para gatos'),
('Medicina', 'Medicamentos y vitaminas para gatos'),
('Accesorios', 'Collares, camas y transportadoras');

-- Poblar la tabla Refugio
INSERT INTO Refugio (direccion, telefono, email) VALUES
('Calle Gatos Felices #123', '5551234567', 'refugio1@gatos.com'),
('Avenida Michis #456', '5557654321', 'refugio2@gatos.com');

-- Poblar la tabla Ciudadano
INSERT INTO Ciudadano (nombre, username, email, password, fecha_registro, telefono, genero, foto_perfil) VALUES
('Juan Pérez', 'juanp', 'juan@gatitos.com', '1234', '2025-03-01', '5551112222', 'Masculino', 'juan.jpg'),
('Ana López', 'analopez', 'ana@gatitos.com', '1234', '2025-03-02', '5553334444', 'Femenino', 'ana.jpg');

-- Poblar la tabla Encargado
INSERT INTO Encargado (nombre, username, email, password, telefono, foto_perfil, fecha_ingreso, id_refugio) VALUES
('Carlos Ramírez', 'carlosr', 'carlos@gatos.com', 'admin123', '5555555555', 'carlos.jpg', '2024-01-15', 1),
('María Fernández', 'mariaf', 'maria@gatos.com', 'admin456', '5556667777', 'maria.jpg', '2024-02-20', 2);

-- Poblar la tabla Cartilla_Salud
INSERT INTO Cartilla_Salud (vacunas_aplicadas, estado_general, ultima_revision, id_ciudadano) VALUES
('Rabia, Triple Felina', 'Salud óptima', '2025-02-10', NULL),
('Desparasitación', 'Leve infección, en tratamiento', '2025-02-15', NULL),
('Vacunas completas', 'Energético y saludable', '2025-02-20', NULL);

-- Poblar la tabla Gato con nuevos datos
INSERT INTO Gato (nombre, genero, foto, fecha_ingreso, descripcion, estado, edad, color, fecha_adopcion, id_cartilla, id_ciudadano, id_personalidad, id_raza, id_refugio) VALUES
('Simba', 'Macho', 'simba.jpg', '2025-02-10', 'Juguetón y enérgico', 'En adopción', 1, 'Naranja', NULL, 1, NULL, 3, 2, 1),
('Nina', 'Hembra', 'nina.jpg', '2025-02-12', 'Muy cariñosa y le gusta dormir en el regazo', 'En adopción', 4, 'Blanco', NULL, 2, NULL, 2, 1, 1),
('Tom', 'Macho', 'tom.jpg', '2025-03-01', 'Curioso y astuto, siempre explorando', 'En adopción', 2, 'Gris con blanco', NULL, 3, NULL, 2, 3, 2);

-- Poblar la tabla Supervision con nuevos datos
INSERT INTO Supervision (id_cartilla, id_encargado, fecha_supervision, comentarios_supervision) VALUES
(1, 1, '2025-03-05', 'Se mantiene en buen estado de salud, alimentación adecuada'),
(2, 2, '2025-03-06', 'Leve resfriado tratado con medicación, en observación'),
(3, 1, '2025-03-07', 'Muy activo y sin signos de enfermedad');
