<?php

//hacer migracion de la tabla modulos
//hacer seeder tabla modulos
//hacer create de tabla modulos
//hacer store de tabla modulos
//entregar enlace github para proximo dia 


$sql = "CREATE TABLE IF NOT EXISTS modulos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL unique,
        abreviatura VARCHAR(5) NOT NULL unique,
        creditos decimal(4, 2) NOT NULL,
        horassemanales smallint
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";