<?php
$host = 'localhost';
$dbname = 'crud_productos'; // corregido
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // corregido
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit(); // Para evitar que siga ejecutándose el resto del código
}
?>
