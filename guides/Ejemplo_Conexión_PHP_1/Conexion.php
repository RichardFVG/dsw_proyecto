<?php
// Variables de conexión a la base de datos

// Dirección del servidor de base de datos (localhost para XAMPP)
$hostDB = 'localhost';

// Nombre de la base de datos a la que deseas conectarte
$nombreDB = 'colores';

// Nombre de usuario de la base de datos
$usuarioDB = 'root';

// Contraseña del usuario (vacía por defecto en XAMPP)
$contraDB = '';

// Cadena DSN (Data Source Name) que contiene la información para conectarse a la base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;charset=utf8mb4";

// Intentar establecer la conexión con la base de datos
try {
    // Crear una nueva instancia de PDO para la conexión
    $miPDO = new PDO($hostPDO, $usuarioDB, $contraDB);

    // Configurar el modo de errores de PDO para que lance excepciones
    $miPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Registrar el mensaje de error en un log
    error_log("¡Error de conexión!: " . $e->getMessage());

    // Mostrar un mensaje genérico de error al usuario
    echo "Error de conexión a la base de datos.";

    // Finalizar la ejecución del script
    exit();
}
?>
