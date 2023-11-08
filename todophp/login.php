<?php
session_start();

// Conexión a la base de datos
$conexion = new mysqli("localhost", "lauty", "1234", "personas");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$user = $_POST['nombre'];
$password = $_POST['contraseña'];

// Buscar al usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE usuario='$user'";
$result = $conexion->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['contraseña'])) 
    {
        $_SESSION['usuario'] = $user;
        header("Location: ../index.php"); // Redirigir al usuario a la página de inicio
        exit;
    }
    else 
    {
        echo "
        <script>
          alert('Usuario inexistente');
          window.location = 'login.php';
        </script>";
    }
} else {
    echo "Usuario no registrado. <a href='../login/register.html'>Registrarse</a>";
}

// Cerrar la conexión
$conexion->close();
?>

