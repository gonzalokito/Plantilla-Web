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
				 header("Location: QuestBusc.php?search=".$_GET["search"]."");
				 die();
			 } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
				 $pagina = $_GET["pagina"];
				 $search = $_GET["search"];
			};

		 } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
			 header("Location: QuestBusc.php?search=".$_GET["search"]."");
			die();
		 };
	};

} else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
	$pagina = 1;
	if (isset($_GET["search"])) {
	$search = $_GET["search"];}
	else{$search = $_POST['search'];}
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
        <a accesskey="d" style="color:blue" href="./Debates.php">Questions</a>
      </li>
    <li>
      <a accesskey="p" style="color:black" href="./PropuestasCiudadanas.php">Proposals</a>
    </li>
    <li>
      <a accesskey="v" style="color:black" href="./PropuestasCiudadanasV.php">Vote</a>
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
      <div class="hide-for-small-only">
        <div class="small-12 medium-9 column">
  <ul>
      <li>
        <a accesskey="d" style="color:blue" href="./Debates.php">Questions</a>
      </li>
    <li>
      <a accesskey="p" style="color:black" href="./PropuestasCiudadanas.php">Proposals</a>
    </li>
    <li>
      <a accesskey="v" style="color:black" href="./PropuestasCiudadanasV.php">Vote</a>
    </li>
  </ul>
</div>

        <div class="small-12 medium-3 column">
            <div id="search_form" class="search-form-header">
  <form action="./QuestBusc.php" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓">
    <div class="input-group">
      <label class="sr-only">Search</label>
      <input type="text" name="search" placeholder="Search Proposals..." class="input-group-field" value="">
      <div class="input-group-button">
        <button type="submit" class="button" title="Buscar">
          <span class="sr-only">Search</span>
          Find
        </button>
      </div>
    </div>
</form></div>


        </div>
      </div>
    </div>
  </div>

</header>

<main>
  <div class="wrap row">
    <div id="proposals" class="proposals-list small-12 medium-9 column">

      <div class="small-12 search-results">
      </div>


      <section class="submenu">
    <a class="" href="./Debates.php">Most Response</a>
    <a class="active" href="./DebatesTopOld.php">Old Questions</a>
    <a class="" href="./DebatesTopNew.php">News Questions</a>
</section>
      
  <div id="proposals-list">
  <?php
//Obtiene TODO de la tabla
$obtener_todo_BD = "SELECT * FROM preguntas WHERE Cuerpo_Pregunta LIKE '%$search%'";

//Realiza la consulta
$consulta_todo = mysql_query($obtener_todo_BD);


//Cuenta el número total de registros
$total_registros = mysql_num_rows($consulta_todo);

//Obtiene el total de páginas existentes
$total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina); 

//Realiza la consulta en el orden de ID ascendente (cambiar "id" por, por ejemplo, "nombre" o "edad", alfabéticamente, etc.)
//Limitada por la cantidad de cantidad por página
$consulta_resultados = mysql_query("
SELECT Id_Pregunta,Cuerpo_Pregunta,Idioma,N_Respuestas,Fecha_Creacion
FROM preguntas WHERE Cuerpo_Pregunta LIKE '%$search%' ORDER BY N_Respuestas DESC
LIMIT $empezar_desde, $cantidad_resultados_por_pagina");

//Crea un bluce 'while' y define a la variable 'datos' ($datos) como clave del array
//que mostrará los resultados por nombre
Echo "<div style=background-color:green;color:white> You find $total_registros questions with '$search'. </div>";

?>
<?php while($datos = mysql_fetch_array($consulta_resultados)){
	$variable1=$datos['Cuerpo_Pregunta'];
	$variable2=$datos['Id_Pregunta'];
	$variable3=$datos['Idioma'];
	$variable4=$datos['Fecha_Creacion'];
	$variable5=$datos['N_Respuestas'];?>
<div id="proposal_13745" class="proposal clear " data-type="proposal">
  <div class="panel">
    <div class="icon-successfull"></div>
    <div class="row">

      <div class="small-12 medium-9 column">
        <div class="proposal-content">
            <span class="label-proposal float-left">Question <?php echo $variable2 ?></span>
            <br>
			<p class="proposal-info">
             
              <span>Responses: <?php echo $variable5; ?></span>

              <span class="bullet">&nbsp;•&nbsp;</span>
              <?php echo $variable4; ?>

				<span class="bullet">&nbsp;•&nbsp;</span>
                <span class="idioma">
				
                  Lenguage: <?php echo $variable3; ?>
                </span>

            </p>
			</span>
			<br>
            <div class="proposal-description">
              <p><?php echo $variable1 ?></p>
              <div class="truncate"></div>
            </div>
          
        </div>
      </div>

      <div id="proposal_13745_votes" class="small-12 medium-3 column">
          <div class="text-center">
            <div class="supports">
  <div  class="in-favor">
  <span class="total-supports">
      <?php echo $variable5;?> Responses
    </span>
      <a class="button button-support small expanded" title="Responder esta pregunta" data-remote="true" href="./VerPreg.php?variable1=<?php echo $variable1 ?>&variable2=<?php echo $variable2 ?>">
	  Respond/<br>
	  See Comments
</a> 
</div>

</div>

          </div>
      </div>
    </div>
  </div>
</div>
<?php
};
?>

<div class="pagination-centered">
    <nav>

<?php

//Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
//Nota: X = $total_paginas
if ($total_registros<>0) {
$aux=$pagina-1;
$aux2=$pagina+1; 

echo "<li style='list-style:none;text-align: center;' center;=''>";
if ($pagina<>1){ echo "<a rel=next href='?pagina=".$aux."'> $aux <--Prev.Pag </a>";}
echo "||";
if ($pagina<>$total_paginas){echo "<a rel=next href='?pagina=".$aux2."'> Next.Pag--> $aux2 </a>";}
echo "</li>";
} ?>
    </nav>
  </div>

      </div>
    </div>

    <div class="small-12 medium-3 column">
      <aside class="margin-bottom">
        <a class="button expanded" href="./CrearQuest.php">New Question</a>
            <div id="tag-cloud" class="tag-cloud">
  <div class="sidebar-divider"></div>
  <h3 class="sidebar-title">Instruccions</h3>
  <br>
  <li>Only 250 Characters</li>
  <li>Public Questions</li>
  <li>Doubts about light pollution</li>
      </aside>
    </div>

  </div>
</main>

      <div class="push"></div>
    </div>
    <div class="footer">
      <footer>
	<div class="row">
  <div class="subfooter row">
    <div class="small-12 medium-8 column">
      <p>
        European Proyect, 2016&nbsp;|&nbsp;
        <a target="_blank" href="./Construccion.html">More Information</a>&nbsp;|&nbsp;
        <a target="_blank" href="./Construccion.html">Privacy Policy</a>&nbsp;|&nbsp;
        <a target="_blank" href="./CondicionesUSO.html">Terms of use</a>&nbsp;|&nbsp;
        <a target="_blank" href="./Construccion.html">Accessibility</a>
      </p>
    </div>

    <div class="small-12 medium-4 column social">
      <div class="text-right">
        <ul>
            <li class="inline-block">
              <a target="_blank" title="Twitter (se abre en ventana nueva)" href="https://twitter.com/stars4all_es">
                <span class="sr-only">Twitter</span>
                <span class="icon-twitter" aria-hidden="true"></span>
</a>            </li>
            <li class="inline-block">
              <a target="_blank" title="Facebook (se abre en ventana nueva)" href="https://es-la.facebook.com/stars4all/?ref=page_internal">
                <span class="sr-only">Facebook</span>
                <span class="icon-facebook" aria-hidden="true"></span>
</a>            </li>
            <li class="inline-block">
              <a target="_blank" title="Blog (se abre en ventana nueva)" href="http://www.stars4all.eu/">
                <span class="sr-only">Blog</span>
                <span class="icon-blog" aria-hidden="true"></span>
</a>            </li>
            <li class="inline-block">
              <a target="_blank" title="YouTube (se abre en ventana nueva)" href="https://www.youtube.com/.../UCIYulJmvihMGfRB2SsUkDpQ">
                <span class="sr-only">YouTube</span>
                <span class="icon-youtube" aria-hidden="true"></span>
</a>            </li>
        </ul>
      </div>
    </div>
  </div>
  
      <div class="small-12 large-4 column">
      <h1 class="logo">
        <a href="./Main.php">Open Proyect</a>
      </h1>

      <p class="info">
	  This is a European project in collaboration by several universities in the European Union.
      </p>
    </div>
	
</footer>

    </div>

</body></html>

