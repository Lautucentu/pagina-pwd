<?php

session_start();

if(!isset($_SESSION['nombre'])){
    echo "
        <script>
            alert('Por favor debes iniciar sesion');
            window.location = 'login/login.html';
        </script>
    ";
    header("location: login/login.html");
    session_destroy();
    die();
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="estilos/estilodemipaginaweb.css">
  <title>Cinema</title>
</head>
<body>
  <!-- barra de navegacion -->
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
  <!-- costado -->
  <aside>
    <div class="text-top" id="arriba">  
      <div>TOP 10</div>
      <div>peliculas mejores valoradas</div>
    </div>

    <div class="costado">
      <ul class="pelisbox" id="lista-pelis">
        
      </ul>
    </div>
    <div class="top-completo">
      <a href="mejores_valoradas.php">Top completo ></a>
    </div>
  </aside>
  <!-- main -->
<div class="text-y-cartelera">
  <div class="cartelera">
    <span class="originalText">En cartelera</span>
    <span class="nuevoText"><a href="cartelera.php">ver todo ></a></span>
  </div>
    <div id="carouselExample" class="carousel slide">
      <div id="hola" class="carousel-inner">
      
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
  <!-- pie de pagina-->
    
    <script src="javascript/top_rated_cartelera.js"></script> <!--top 10 de peliculas mejores valoradas-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

  </html>