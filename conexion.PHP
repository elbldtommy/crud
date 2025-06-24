<?php
$host = 'localhost';
$dbnmae = 'crud_productos';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql;host=$host;dbname=$dbname", $username,$password);
    $coon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
}catch(PDOException $e) {
   echo "error de conexion" . $e->getMessage();
}
?>
