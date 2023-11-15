<?php

session_start();

if(!isset($_SESSION['usuario'])){
    echo "
        <script>
            alert('Por favor debes iniciar sesion');
            window.location = 'index.php';
        </script>
    ";
    header("location: index.php");
    session_destroy();
    die();
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/cartelera-top.css">
    <title>mejores valoradas•Cinema</title>
</head>
<body>
  <!-- nav -->
    <div class="barra-negra"></div><!--barra de nav negra-->
  <nav>
    <div class="menu-logo">
    <a href="index.php">
      <button class="button" data-text="Awesome">
        <span class="actual-text">&nbsp;cinema&nbsp;</span>
        <span aria-hidden="true" class="hover-text">&nbsp;cinema&nbsp;</span>
      </button>
    </a>
    </div>
    <div class="login-nav">
      <button class="buti">
        <a href="login/register.html">Registrarse</a>
    </button>
    <button class="buti">
        <a href="login/login.html">iniciar sesion</a>
    </button>
    </div>
  </nav>
  <!-- fin nav -->
  <!-- main -->
  <main>
    <div id="coleccion-pelis">
        
        <div id="carga" class="loader"></div>
        
    </div>
<div class="botones">

  <button id="anterior" class="but">

  
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
    </svg>
  
    
    <div class="text">
      anterior
    </div>
  
  </button>

  <button id="siguiente" class="but">

  
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
    </svg>
  
    
    <div class="text">
      siguiente
    </div>
  
  </button></div>
</main>
<!-- fin main -->
<script src="javascript/top_cartelera_completo.js"></script>
</body>
</html>
