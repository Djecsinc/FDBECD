<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

$servidor = "127.0.0.1";
$usuario = "Djecs";  // El usuario predeterminado de Laragon es "root"
$password = "8264";   // Sin contraseña por defecto
$bd = "users";

$conexion = new mysqli($servidor, $usuario, $password, $bd);

if ($conexion->connect_error) {
    die(json_encode(["error" => "Error de conexión a la base de datos"]));
}

$sql = "SELECT id_user, name, lastname, email, age FROM usuarios";
$resultado = $conexion->query($sql);

$usuarios = [];

while ($fila = $resultado->fetch_assoc()) {
    $usuarios[] = $fila;
}

echo json_encode($usuarios);

$conexion->close();
?>
