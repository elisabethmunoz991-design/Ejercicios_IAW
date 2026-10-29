<?php
//seeder: para poblar la tabla modulos
//para disponer de datos iniciales

$host     = 'mysql';
$db       = 'siga';
$user     = 'sigauser';
$password = 'sigapassword';
$charset  = 'utf8mb4';

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

    $pdo->exec("TRUNCATE TABLE modulos"); //limpiar la tabla antes de insertar

    //sentencia preparada -> evitar inyecciones sql
    $sql = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales)
            values (:nombre, :abreviatura, :creditos, :horassemanales)";

    $sentencia_preparada = $pdo->prepare($sql);

    $modulos = [
        ['nombre' => 'Implantación de aplicaciones web', 'abreviatura' => 'IAW',   'creditos' => 8.00, 'horassemanales' => 5],
        ['nombre' => 'Administración de sistemas gestores de bases de datos', 'abreviatura' => 'ASGBD', 'creditos' => 6.50, 'horassemanales' => 4],
        ['nombre' => 'Seguridad y alta disponibilidad', 'abreviatura' => 'SAD',   'creditos' => 5.00, 'horassemanales' => 3],
        ['nombre' => 'Empresa e iniciativa emprendedora', 'abreviatura' => 'EIE', 'creditos' => 4.00, 'horassemanales' => null],
    ];

    foreach ($modulos as $modulo) {
        $datos = [
            ':nombre'         => $modulo['nombre'],
            ':abreviatura'    => $modulo['abreviatura'],
            ':creditos'       => $modulo['creditos'],
            ':horassemanales' => $modulo['horassemanales']
        ];
        $sentencia_preparada->execute($datos);
        echo ('insert ok<br>');
    }

} catch (\Throwable $error) {
    echo ('se ha producido un error, aqui tienes la información: ');
    echo ('<pre>' . var_export($error, true) . '</pre>');
    echo ($error->getMessage());
}
