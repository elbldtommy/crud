<?PHP include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de productos</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    
<h1>Listas de productos</h1>
<a href="crear.php">Agregar Nuevo Producto</a>
<br><br>
<table>
<tr>
<th>ID</th>
<th>nombre</th>
<th>descripcion</th>
<th>stock</th>
<th>fecha creacion</th>
<th>acciones</th>
</tr>
<?php
$sql = "SELECT * FROM productos";
$res = $conn->query($sql);

while ($fila = $res->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>
<td>{$fila['id']}</td>
<td>{$fila['nombre']}</td>
<td>{$fila['descripcion']}</td>
<td>{$fila['stock']}</td>
<td>{$fila['fecha creacion']}</td>
</tr>
 <a href='editar.php?id={$fila['id']}'>Editar</a> |
 <a href='eliminar.php?id={$fila['id']}'onclink='return confirm(\"¿estas seguroo?\")'>/Eliminar</a> 
 </td>
 </tr>";

}
?>

</table>

