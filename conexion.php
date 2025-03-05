<?php
$servidor = "127.0.0.1";
$usuario = "Djecs";  // El usuario predeterminado de Laragon es "root"
$contrasena = "8264";   // Sin contraseña por defecto
$bd = "users";  // Nombre de la base de datos que creaste

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $contrasena, $bd);

// Comprobar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
echo "Conexión exitosa";
?>
