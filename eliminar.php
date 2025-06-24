<?php
include "conexion.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM productos WHERE id = ?";
    $res = $conn->prepare($sql);
    $res->execute([$id]);

    header("Location: index.php?succes=Producto eliminar");
    exit();
}

header("Location: index.php");
exit();
?>