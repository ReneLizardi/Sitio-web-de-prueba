<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: usuario.html#INGRESAR');
    exit();
}

$user_id = $_SESSION['user_id'];
$producto_id = $_POST['producto_id'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO pedidos (usuario_id, producto_id, cantidad, fecha) VALUES ('$user_id', '$producto_id', '$cantidad', NOW())";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo pedido creado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: usuarios.php#PEDIDOS');
?>
