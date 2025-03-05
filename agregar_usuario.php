<?php
header("Content-Type: text/plain");

// Conexión manual a la base de datos
$host = "127.0.0.1";
$user = "Djecs"; // Cambia si usas otro usuario
$pass = "8264"; // Cambia si tienes contraseña
$db = "users"; // Nombre de tu BD

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $age = $_POST['age'];

    if (!empty($name) && !empty($lastname) && !empty($email) && !empty($password) && !empty($age)) {
        $query = "INSERT INTO usuarios (name, lastname, email, password, age) VALUES ('$name', '$lastname', '$email', '$password', '$age')";

        if (mysqli_query($conn, $query)) {
            echo "Usuario agregado correctamente";
        } else {
            echo "Error al agregar usuario: " . mysqli_error($conn);
        }
    } else {
        echo "Faltan datos";
    }
} else {
    echo "Método no permitido";
}

mysqli_close($conn);
?>
