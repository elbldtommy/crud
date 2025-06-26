<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de productos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<h1>Lista de productos</h1>
<a href="crear.php">Agregar Nuevo Producto</a>
<br><br>

<table>
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Fecha creación</th>
    <th>Acciones</th>
</tr>

<?php
$sql = "SELECT * FROM productos";
$res = $conn->query($sql);

while ($fila = $res->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
        <td>" . htmlspecialchars($fila['id']) . "</td>
        <td>" . htmlspecialchars($fila['nombre']) . "</td>
        <td>" . htmlspecialchars($fila['descripcion']) . "</td>
        <td>" . htmlspecialchars($fila['precio']) . "</td>
        <td>" . htmlspecialchars($fila['stock']) . "</td>
        <td>" . (isset($fila['fecha_creacion']) ? htmlspecialchars($fila['fecha_creacion']) : '') . "</td>
        <td>
            <a href='editar.php?id={$fila['id']}'>Editar</a> |
            <a href='eliminar.php?id={$fila['id']}' onclick='return confirm(\"¿Estás seguro?\")'>Eliminar</a>
        </td>
    </tr>";
}
?>
</table>

</body>
</html>
