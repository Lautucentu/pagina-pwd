<?php
// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST["nombre"];
    $contra = password_hash($_POST["contraseña"],PASSWORD_DEFAULT);

    // Realizar la inserción en la base de datos
    $servidor = "localhost";
    $usuario = "lauty";
    $contrasena = "1234";
    $basededatos = "personas";

    $conexion = mysqli_connect($servidor, $usuario, $contrasena, $basededatos) or die("error");

    $sql = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$nombre', '$contra')";


   if ($conexion->query($sql) === TRUE) 
    {
        header("Location: ../login/login.html");
        exit;
    } 
    else
    {
        echo "Error al registrar datos: " . $conexion->error;
    }

   // $conexion->close();
}
?>
