<?php
include "conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM productos WHERE id = ?";
    $res = $conn->prepare($sql);
    $res->execute([$id]);

    header("Location: index.php?success=Producto eliminado");
    exit();
}

// Si no se recibe ID válido
header("Location: index.php?error=ID no especificado");
exit();
?>
