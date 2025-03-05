<?php
header("Content-Type: text/plain");

// Parámetros de conexión a PostgreSQL
// Parámetros de conexión a PostgreSQL (reemplaza con los valores de tu cadena de conexión)
$host = "dpg-cv42qprqf0us73b4qolg-a";  // El host de tu base de datos en Render
$port = "5432";                   // Puerto de PostgreSQL (por defecto)
$dbname = "users_3d3a";  // Nombre de tu base de datos en Render
$user = "users_3d3a_user";             // Usuario de conexión
$password = "gsyDQbfhOYFN6X1h6Ac4A9jp9xCszoRa";      // Contraseña de conexión

// Conexión a PostgreSQL
$conexion = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Error de conexión: " . pg_last_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $age = $_POST['age'];

    // Comprobar si los campos no están vacíos
    if (!empty($name) && !empty($lastname) && !empty($email) && !empty($password) && !empty($age)) {
        // Crear la consulta SQL para insertar los datos
        $query = "INSERT INTO usuarios (name, lastname, email, password, age) VALUES ('$name', '$lastname', '$email', '$password', '$age')";

        // Ejecutar la consulta
        $result = pg_query($conn, $query);

        if ($result) {
            echo "Usuario agregado correctamente";
        } else {
            echo "Error al agregar usuario: " . pg_last_error($conn);
        }
    } else {
        echo "Faltan datos";
    }
} else {
    echo "Método no permitido";
}

// Cerrar la conexión
pg_close($conn);
?>
