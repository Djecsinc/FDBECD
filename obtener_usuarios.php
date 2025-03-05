<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

// Parámetros de conexión a PostgreSQL
$host = "dpg-cv42qprqf0us73b4qolg-a";  // El host de tu base de datos en Render
$port = "5432";                   // Puerto de PostgreSQL (por defecto)
$dbname = "users_3d3a";  // Nombre de tu base de datos en Render
$user = "users_3d3a_user";             // Usuario de conexión
$password = "gsyDQbfhOYFN6X1h6Ac4A9jp9xCszoRa";      // Contraseña de conexión

// Conexión a PostgreSQL
$conexion = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conexion) {
    die(json_encode(["error" => "Error de conexión a la base de datos"]));
}

// Realizar la consulta para obtener los usuarios
$sql = "SELECT id_user, name, lastname, email, age FROM usuarios";
$resultado = pg_query($conexion, $sql);

// Comprobar si la consulta devolvió resultados
if (!$resultado) {
    die(json_encode(["error" => "Error al ejecutar la consulta"]));
}

$usuarios = [];

// Recoger los resultados y almacenarlos en el array $usuarios
while ($fila = pg_fetch_assoc($resultado)) {
    $usuarios[] = $fila;
}

// Devolver los resultados como un JSON
echo json_encode($usuarios);

// Cerrar la conexión
pg_close($conexion);
?>
