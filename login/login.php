<?php
session_start();
if(isset($_REQUEST["btn-s"])){

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
              alert('contraseña incorrecta');
              window.location = 'login.php';
            </script>";
        }
    } else {
        echo "
        <script>
          alert('Usuario no registrado');
          window.location = 'register.php';
        </script>";}
    
    // Cerrar la conexión
    $conexion->close();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <link rel="stylesheet" href="stilo_registro.css">
    <title>Iniciar Sesión•Cinema</title>
</head>
<body>
  <nav>
    <div class="menu-logo">
    <a href="../index.html">
      <button class="button" data-text="Awesome">
        <span class="actual-text">&nbsp;cinema&nbsp;</span>
        <span aria-hidden="true" class="hover-text">&nbsp;cinema&nbsp;</span>
      </button>
    </a>
    </div>
    <div class="login-nav">
        <button class="buti">
            <a href="register.html">Registrarse</a>
        </button>
        <button class="buti">
            <a href="login.html">iniciar sesion</a>
        </button>
      
    </div>
  </nav>

    <div class="login-container">
        <h1>Iniciar Sesión</h1>

        <form method="post">
            <div class="form-group">
                <input class="input" type="text" id="nombre" name="nombre" placeholder="nombre de usuario" required>
            </div>
            <div class="form-group">
                
                <input class="input" type="password" id="contraseña" name="contraseña" placeholder="contraseña" required>
            </div>
                
            <input class="boton" name="btn-s" type="submit" value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>
