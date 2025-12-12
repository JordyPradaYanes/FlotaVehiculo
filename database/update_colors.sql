-- Script SQL para actualizar colores de inglés a español
-- Ejecutar en phpMyAdmin o desde la consola MySQL

UPDATE vehiculos SET color = 'Verde' WHERE LOWER(color) IN ('green', 'lime', 'olive');
UPDATE vehiculos SET color = 'Azul' WHERE LOWER(color) IN ('blue', 'navy', 'aqua', 'cyan', 'teal');
UPDATE vehiculos SET color = 'Rojo' WHERE LOWER(color) IN ('red', 'maroon');
UPDATE vehiculos SET color = 'Amarillo' WHERE LOWER(color) IN ('yellow');
UPDATE vehiculos SET color = 'Negro' WHERE LOWER(color) IN ('black');
UPDATE vehiculos SET color = 'Blanco' WHERE LOWER(color) IN ('white', 'silver');
UPDATE vehiculos SET color = 'Gris' WHERE LOWER(color) IN ('gray', 'grey');
UPDATE vehiculos SET color = 'Naranja' WHERE LOWER(color) IN ('orange');
UPDATE vehiculos SET color = 'Morado' WHERE LOWER(color) IN ('purple', 'fuchsia');
UPDATE vehiculos SET color = 'Rosa' WHERE LOWER(color) IN ('pink');
UPDATE vehiculos SET color = 'Marrón' WHERE LOWER(color) IN ('brown');
UPDATE vehiculos SET color = 'Plateado' WHERE LOWER(color) = 'silver';
