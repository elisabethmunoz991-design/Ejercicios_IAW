<?php
// Este archivo solo procesa datos y redirige, no debe mostrar HTML.


$host     = 'mysql';
$db       = 'siga';
$user     = 'sigauser';
$password = 'sigapassword';
$charset  = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones de configuración de PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);

    if (
        !isset($_POST["nombre"]) ||
        !isset($_POST["abreviatura"]) ||
        !isset($_POST["creditos"]) ||
        !isset($_POST["horassemanales"])
    ) {
        header('Location: error.php');
        exit;
    }

    // horassemanales es opcional: si llega vacío guardamos NULL
    $horassemanales = $_POST["horassemanales"] === '' ? null : $_POST["horassemanales"];

    // Sentencia preparada para evitar inyecciones SQL
    $sql = "INSERT INTO modulos (nombre, abreviatura, creditos, horassemanales)
            VALUES (:nombre, :abreviatura, :creditos, :horassemanales)";

    $sentencia_preparada = $pdo->prepare($sql);

    // Pasamos los datos directamente al array de ejecución
    $datos = [
        'nombre'         => $_POST["nombre"],
        'abreviatura'    => $_POST["abreviatura"],
        'creditos'       => $_POST["creditos"],
        'horassemanales' => $horassemanales
    ];

    $sentencia_preparada->execute($datos);

    // Redirección si todo va bien
    header('Location: exito.php');
    exit(); // Es una buena práctica poner exit() siempre después de un header
} catch (\Throwable $error) {
    header('Location: error.php');
    exit();
}