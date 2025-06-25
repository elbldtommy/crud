<?php
include "conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO productos(nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)";
    $res = $conn->prepare($sql);
    $res->execute([$nombre, $descripcion, $precio, $stock]); // Corregido

    header("Location: index.php?success=Producto creado");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">

    <title>Agregar Producto</title>
</head>
<body>
<h1>Agregar Nuevo Producto</h1>    
<form method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" required><br>

    <label for="descripcion">Descripción</label>
    <textarea name="descripcion"></textarea><br>

    <label for="precio">Precio</label>
    <input type="number" step="0.01" name="precio" required><br>

    <label for="stock">Stock</label>
    <input type="number" name="stock" required><br>

    <input type="submit" value="Guardar producto">
    <a href="index.php">Cancelar</a> 
</form>
</body>
</html>