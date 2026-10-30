<?php
/*
CREATE TABLE modulos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE,
    abreviatura VARCHAR(5) NOT NULL UNIQUE,
    creditos DECIMAL(4,2) NOT NULL,
    horassemanales SMALLINT
);
*/

/*Variables de conexion*/
$host     = 'mysql'; // tenemos host porque usamos docker, normalmente usamos localhost
$db       = 'siga';
$user     = 'elisa2';
$password = 'elisa2';
$charset  = 'utf8mb4';

//cadena de conexion
// Definición del Data Source Name (DSN)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones de configuración de PDO para manejo de errores y seguridad
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
    echo ('Conexión correcta.<br>');

    $sql = "CREATE TABLE IF NOT EXISTS modulos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100) NOT NULL unique,
        abreviatura VARCHAR(5) NOT NULL unique,
        creditos decimal(4, 2) NOT NULL,
        horassemanales smallint
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    // Ejecutar la sentencia en el servidor
        $pdo->exec($sql);

    echo "Conexión exitosa. La tabla 'modulos' se ha creado correctamente.";

} catch (\Throwable $error) {
    echo ('Se ha producido un error, aquí más información: ');
//  echo ('<pre>' . var_export($error, true) . '</pre>');
    echo ($error->getMessage());
}