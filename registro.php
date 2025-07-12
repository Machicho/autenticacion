<?php
require 'conexion.php';

$usuario = $_POST['nombre_usuario'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
$rol = $_POST['rol'];

$sql = "INSERT INTO usuarios (nombre_usuario, contrasena, rol) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $usuario, $contrasena, $rol);

if ($stmt->execute()) {
    echo "Usuario registrado correctamente. <a href='login.html'>Iniciar sesión</a>";
} else {
    echo "Error: " . $stmt->error;
}
$conn->close();
?>
