<?php
session_start();
include_once "includes/conexion.php";  
$cantidad_resultados_por_pagina = 10;

//Comprueba si está seteado el GET de HTTP
if (isset($_GET["pagina"])) {

	//Si el GET de HTTP SÍ es una string / cadena, procede
	if (is_string($_GET["pagina"])) {

		//Si la string es numérica, define la variable 'pagina'
		 if (is_numeric($_GET["pagina"])) {

			 //Si la petición desde la paginación es la página uno
			 //en lugar de ir a 'index.php?pagina=1' se iría directamente a 'index.php'
			 if ($_GET["pagina"] == 1) {
				 header("Location: PropuestasCiudadanas.php");
				 die();
			 } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
				 $pagina = $_GET["pagina"];
			};

		 } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
			 header("Location: PropuestasCiudadanas.php");
			die();
		 };
	};

} else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
	$pagina = 1;
};

//Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
$empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;
?>
<!DOCTYPE html>

<html lang="es" data-current-user-id="" class="turbolinks-progress-bar"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    


    <title>Proposals</title>
    <link rel="stylesheet" media="screen" href="./css/application-53523c481b0762fedc07b8a19a71a8c4f5c06ebe0617a04e0a8b14e6861d4d2b.css">
    <link rel="shortcut icon" type="image/x-icon" href="./css/icono.bmp">

</head>
  <body>
    <div class="wrapper">
      <header >


 <div class="row">
    <div class="top-bar">
     
      <a class="logo show-for-small-only" href="./Main.php">Stars4ALL Proposals</a>

      <span data-responsive-toggle="responsive-menu" data-hide-for="medium" class="float-right" style="display: none;">
        <span class="menu-icon dark" data-toggle=""></span>
        Menu
      </span>

      <div id="responsive-menu">
        <div class="top-bar-title">
          <a class="hide-for-small-only" accesskey="/" href="./Main.php">
            <img class="hide-for-small-only float-left" src="./css/logo_header-7ffa742c7ffca6e7c1090ee66359b54816619563ddb615f4eaec882e9e1026ea.png" width="80" height="80">
               Stars4ALL Proposals
</a>        </div>

        <div class="top-bar-right">
          <ul class="menu">
            
  <li>
    <form <?php if ($_SESSION['login']==1){ echo 'style="display:none;"'; } ?> method="post" action="./Main.php" >
	
	<input style="color:blue;" type="submit" name="commit1" value="Log in">
	
	</form>
    <form <?php if ($_SESSION['login']==0){ echo 'style="display:none;"'; } ?> method="post" action="./Main.php" >
	
	<input style="color:blue;" type="submit" name="commit" value="Log out">
	
	</form>
	
	


  </li>
  <li>
    <a <?php if ($_SESSION['login']==1){ echo 'style="display:none;"'; } ?> class="button" href="./Registrarse.php">Sign in</a>
	<a <?php if ($_SESSION['login']==0){ echo 'style="display:none;"'; } ?> href="./Perfil.php" style="font-size:larger;color:#242084;"><?php echo $_SESSION['usuario']; ?></a>
  </li>

          </ul>
 
          <div class="show-for-small-only">
            <div class="subnavigation row">
              <div class="small-12 medium-9 column">
  <ul>
      <li>
        <a accesskey="d" href="./Construccion.html">Debates</a>
      </li>
    <li>
      <a accesskey="p" href="./PropuestasCiudadanas.php">Proposals</a>
    </li>
    <li>
      <a accesskey="v" href="./Construccion.html">Vote</a>
    </li>
  </ul>
</div>

              <div class="small-12 medium-3 column">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="subnavigation expanded">
    <div class="row">


<form action="subir_archivo.php" method="post" enctype="multipart/form-data">
  <label for="archivo">Archivo:</label>
  <input type="file" name="archivo" id="archivo" />
  <br/>
  <input type="submit" value="Enviar" />
  Only extensions PDF, DOC or DOCX
</form>
	
</body></html>

