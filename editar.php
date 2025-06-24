<?php
include 'conexion.php';

// Procesar la actualizacion cuando se envia el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Actualizar producto
    $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ? WHERE id = ?";
    $res = $conn->prepare($sql);
    $res->execute([$nombre, $descripcion, $precio, $stock, $id]);

    header("Location: index.php?success=Producto actualizado correctamente");
    exit();
}

// Obtener datos del producto para editar
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$sql = 'SELECT * FROM productos WHERE id = ?';
$res = $conn->prepare($sql);
$res->execute([$id]);
$producto = $res->fetch(PDO::FETCH_ASSOC);

if (!$producto) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/kurt_clase/styles/styles.css">
    <title>Editar Producto</title>
</head>
<body>
        <!-- Corazones flotantes -->
<span class="heart">💖</span>
<span class="heart">💗</span>
<span class="heart">💘</span>
<span class="heart">💕</span>
<span class="heart">💞</span>
<span class="heart">💓</span>

<!-- Contenido principal -->
<div class="container">
    <h1>Editar Producto</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $producto['id'] ?>">

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
        <br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"><?= htmlspecialchars($producto['descripcion']) ?></textarea>
        <br>

        <label for="precio">Precio:</label>
        <input type="number" step="0.01" name="precio" value="<?= $producto['precio'] ?>" required>
        <br>

        <label for="stock">Stock:</label>
        <input type="number" name="stock" value="<?= $producto['stock'] ?>" required>
        <br>

        <input type="submit" value="Acualizar Producto">
        <a href="index.php">Cancelar</a>
    </form>
</div>
</body>
</html>