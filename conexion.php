<?php
session_start();

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'tecnovigilancia');
define('DB_USER', 'HRAEI');
define('DB_PASS', 'HRAEI2025');


// Conexión con manejo de errores mejorado
try {
    $conn = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8mb4",
        DB_USER, 
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    error_log("Error de conexión: " . $e->getMessage());
    die("Error al conectar con la base de datos. Por favor, intente más tarde.");
}
?>