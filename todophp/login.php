<?php
session_start();

// Conexión a la base de datos
$conexion = new mysqli("localhost", "lauty", "1234", "pdw");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$user = $_POST['nombre'];
$password = $_POST['contraseña'];

// Buscar al usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE nombre='$user'";
$result = $conexion->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['contraseña'])) 
    {
        $_SESSION['nombre'] = $user;
        header("Location: ../index.php"); // Redirigir al usuario a la página de inicio
        exit;
    }
    else 
    {
        echo "
        <script>
          alert('contraseña incorrecta');
          window.location = '../login/login.html';
        </script>";
    }
} else {
    echo "
    <script>
      alert('Usuario no registrado');
      window.location = '../login/register.html';
    </script>";}

// Cerrar la conexión
$conexion->close();
?>

