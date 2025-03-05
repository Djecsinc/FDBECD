<?php
// Incluir la conexión a la base de datos (se asume que la conexión está configurada con PostgreSQL)
include('conexion.php');

// Establecer el tipo de respuesta como JSON
header('Content-Type: application/json');

// Verificar el tipo de solicitud HTTP
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Manejar la solicitud GET para obtener usuarios
    $sql = "SELECT * FROM usuarios";
    $resultado = pg_query($conexion, $sql);

    // Verificar si hay resultados
    if ($resultado) {
        $usuarios = array();
        
        // Obtener todos los usuarios y almacenarlos en un array
        while ($fila = pg_fetch_assoc($resultado)) {
            $usuarios[] = $fila;
        }

        // Devolver los usuarios en formato JSON
        echo json_encode($usuarios);
    } else {
        echo json_encode(["message" => "No hay usuarios"]);
    }

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Manejar la solicitud POST para agregar un nuevo usuario
    if (isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['contraseña'])) {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];

        // Insertar el nuevo usuario en la base de datos
        $sql = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";

        $resultado = pg_query($conexion, $sql);

        if ($resultado) {
            echo json_encode(["message" => "Usuario agregado exitosamente"]);
        } else {
            echo json_encode(["message" => "Error al agregar usuario: " . pg_last_error($conexion)]);
        }
    } else {
        echo json_encode(["message" => "Faltan parámetros para agregar el usuario"]);
    }
} else {
    echo json_encode(["message" => "Método no permitido"]);
}

// Cerrar la conexión
pg_close($conexion);
?>
