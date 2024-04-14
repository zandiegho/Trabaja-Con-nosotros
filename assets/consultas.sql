
--CONSULTA PARA ENCONTRAR LOS DATOS PRINCIPALES DE LOS USUARIOS.
SELECT p.id_persona, p.nombre_persona, p.apellido_persona, dp.telefono_persona, dp.experiencia_repartidor, dp.tiene_moto
CASE dp.disponibilidad
	WHEN 'AD-AM' THEN 'Algunos días - En la Mañana'
	WHEN 'AD-PM' THEN 'Algunos días - En la tarde'
	WHEN 'AD-N' THEN 'Algunos días - En la noche'
	WHEN 'AD-DP' THEN 'Algunos días - A cualquier hora'
	WHEN 'TD-AM' THEN 'Todos los días - En la mañana'
	WHEN 'TD-PM' THEN 'Todos los días - En la tarde'
	WHEN 'TD-N' THEN 'Todos los días - En la noche'
	WHEN 'TD-DP' THEN 'Todos los días - A cualquier hora'
	WHEN 'FS-AM' THEN 'Solo Fines de Semana - En la mañana'
	WHEN 'FS-PM' THEN 'Solo Fines de Semana - En la Tarde'
	WHEN 'FS-N' THEN 'Solo Fines de Semana - En la Noche'
	WHEN 'FS-DP' THEN 'Solo Fines de Semana - A cualquier hora'
END AS disponibilidad 
FROM persona p, datos_persona dp
WHERE p.id_persona = dp.id_persona;

--Para contar cuantos postulados totales hay
SELECT COUNT(*) 
FROM persona;


--Para contar cuantos postulados descartados hay
SELECT COUNT(*) 
FROM persona
WHERE descartado = 'si';



