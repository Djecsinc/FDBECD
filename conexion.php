<?php
// Parámetros de conexión a PostgreSQL (reemplaza con los valores de tu cadena de conexión)
$host = "dpg-cv42qprqf0us73b4qolg-a";  // El host de tu base de datos en Render
$port = "5432";                   // Puerto de PostgreSQL (por defecto)
$dbname = "users_3d3a";  // Nombre de tu base de datos en Render
$user = "users_3d3a_user";             // Usuario de conexión
$password = "gsyDQbfhOYFN6X1h6Ac4A9jp9xCszoRa";      // Contraseña de conexión

// Conexión a PostgreSQL
$conexion = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conexion) {
    die("Error de conexión a la base de datos");
} else {
    echo "Conexión exitosa";
}
?>
