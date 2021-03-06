<!DOCTYPE html>
<?php 
session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente. 
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
				 header("Location: VerProp.php?variable1=".$_GET['variable1']."&variable2=".$_GET['variable2']."");
				 die();
			 } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
				 $pagina = $_GET["pagina"];
			};

		 } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
			 header("Location: VerProp.php?variable1=".$_GET['variable1']."&variable2=".$_GET['variable2']."");
			die();
		 };
	};

} else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
	$pagina = 1;
};
$empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;
  
?>
<html lang="es" data-current-user-id="" class="turbolinks-progress-bar"><head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Proposal </title>
    <link rel="stylesheet" media="screen" href="./css/application-53523c481b0762fedc07b8a19a71a8c4f5c06ebe0617a04e0a8b14e6861d4d2b.css">
	<link rel="shortcut icon" type="image/x-icon" href="./css/icono.bmp">
    <link rel="apple-touch-icon" type="image/png" href="./css/icono.bmp" sizes="200x200">
    
<meta class="foundation-mq">
<?php $Propietario= $_GET['variable1']; $N_Prop= $_GET['variable2'];
$consulta_resultados = mysql_query("
SELECT Titulo_Propuesta,Cuerpo_Propuesta,N_Comentarios,Propietario,N_Propuesta,Votos,Etiqueta,Idioma,Confirmacion,Fecha_Creacion 
FROM propuestas WHERE Propietario='$Propietario' and N_Propuesta=$N_Prop");
$datos = mysql_fetch_array($consulta_resultados);
$Conf=$datos['Confirmacion'];
?></head>
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
	
	<input class="button" style="color:white;" type="submit" name="commit1" value="Log in">
	
	</form>
    <form <?php if ($_SESSION['login']==0){ echo 'style="display:none;"'; } ?> method="post" action="./Main.php" >
	
	<input class="button" style="color:white;background-color:red" type="submit" name="commit" value="Log out">
	
	</form>


  </li>
  <li>
    <a <?php if ($_SESSION['login']==1){ echo 'style="display:none;"'; } ?> class="button" href="./Registrarse.php">Register</a>
	<a <?php if ($_SESSION['login']==0){ echo 'style="display:none;"'; } ?> href="./Perfil.php" style="font-size:larger;color:#242084;"><?php echo $_SESSION['usuario']; ?></a>
  </li>

          </ul>
 
          <div class="show-for-small-only">
            <div class="subnavigation row">
              <div class="small-12 medium-9 column">
  <ul>
      <li>
        <a accesskey="d" style="color:black" href="./Debates.php">Questions</a>
      </li>
    <li>
      <a accesskey="p" style="color:blue" href="./PropuestasCiudadanas.php">Proposals</a>
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
        <a accesskey="d" style="color:black" href="./Debates.php">Questions</a>
      </li>
    <li>
      <a accesskey="p" style="color:blue" href="./PropuestasCiudadanas.php">Proposals</a>
    </li>
    <li>
      <a accesskey="v" style="color:black" href="./PropuestasCiudadanasV.php">Vote</a>
    </li>
  </ul>
</div>


      </div>
    </div>
	
  </div>
</header>

<body class="wrapper margin-top">
    <div class="wrapper margin-top">
      <div class="row">
        <div class="small-12 medium-8 large-5 column small-centered margin-top">

        </div>
      </div>

      <div class="row auth">
        <main>
          <div class="column small-centered panel padding margin-bottom">
<div>Title</div>            
<h2><?php echo $datos['Titulo_Propuesta'];?></h2>



<form  class="new_user" id="new_user" action="" accept-charset="UTF-8" method="post">

  <div class="row" >
    <div class="small-12 column">
	
<label>User: <?php echo $datos['Propietario']; ?></label></br>
      <label for="description">Description</label>
	  <p><?php echo $datos['Cuerpo_Propuesta']; ?><p>
	  <label for="etiqueta">Tag</label>
     
  <span id="tags" class="tags">
      <a><?php echo $datos['Etiqueta'] ?></a>
	  

  </span>
  <label for="etiqueta">Lenguage</label> 
     
  <span id="tags" class="tags">
      <a><?php echo $datos['Idioma'] ?></a>
	  

  </span>
    </div>
  </div>
  <?php include("php/comvot.php");?>
    <form class="in-favor" method="post" <?php if ($_SESSION['login']==0){ echo 'style="display:none;"'; } ?>>
        <p <?php if ($Conf==1){ echo 'style="display:none;"'; } ?>>This proposal is not confirmed. You can't vote it.<p>
        <input type="hidden" name="Votar_Usuario1" value=<?php echo $datos['Propietario'];?>>
		<input type="hidden" name="Votar_Usuario2" value=<?php echo $datos['N_Propuesta'];?>>
		<input type="hidden" name="Votar_Usuario3" value=<?php echo $datos['Votos'];?>>
		<input <?php if ($_SESSION['login']==0 or $Conf==0){ echo 'style="display:none;"'; } ?> class="button button-support small expanded" title="Support this proposal" value= "Vote" type="submit" name="comvot">
</input>  </form>
</form>

          </div>
		  <div class="column small-centered panel padding margin-bottom">
		  <?php
include("php/comcom.php");
$obtener_todo_BD = "SELECT * FROM comentarios 
WHERE Propietario='$datos[Propietario]' AND N_Propuesta=$datos[N_Propuesta] 
ORDER BY Fecha";

//Realiza la consulta
$consulta_todo = mysql_query($obtener_todo_BD);


//Cuenta el número total de registros
$total_registros = mysql_num_rows($consulta_todo);

//Obtiene el total de páginas existentes
$total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina); 

//Realiza la consulta en el orden de ID ascendente (cambiar "id" por, por ejemplo, "nombre" o "edad", alfabéticamente, etc.)
//Limitada por la cantidad de cantidad por página
$consulta_resultados = mysql_query("
SELECT * FROM comentarios 
WHERE Propietario='$datos[Propietario]' AND N_Propuesta=$datos[N_Propuesta] 
ORDER BY Fecha
LIMIT $empezar_desde, $cantidad_resultados_por_pagina");
?>
<?php if ($total_registros==0) {echo "No Comments";}else{echo "Comments";}?>
<?php while($datos = mysql_fetch_array($consulta_resultados)){
	$variable1=$datos['Usuario_Comentario'];
	$variable2=$datos['Comentario'];
	$variable3=$datos['Ind_Comentario'];?>

	<div id="proposal_13745" class="proposal clear " data-type="proposal">
 
  <div class="panel">
   
    <div class="icon-successfull"></div>
    <div class="row">

      <div class="small-12 medium-9 column">
	  
        <div class="proposal-content">
            <span class="label-proposal float-left">User <?php echo $variable1 ?></span>
            <p class="proposal-info">
             </br>
              <span>NºComment: <?php echo $variable3 ?> --</span>
			  <span>Date: <?php echo $datos['Fecha']?></span>

            </p>
            <div class="proposal-description">
              <p><?php echo $variable2 ?></p>
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
if ($total_registros<>0) {
//Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
//Nota: X = $total_paginas

$aux=$pagina-1;
$aux2=$pagina+1; 

echo "<li style='list-style:none;text-align: center;' center;=''>";
if ($pagina<>1){ echo "<a rel=next href='?variable1=".$Propietario."&variable2=".$N_Prop."&pagina=".$aux."'>$aux <--Prev.Pag</a>";}
echo "||";
if ($pagina<>$total_paginas){echo "<a rel=next href='?variable1=".$Propietario."&variable2=".$N_Prop."&pagina=".$aux2."'> Next.Pag--> $aux2</a>";}
echo "</li>";
}?>

    </nav>
  </div>
		  </div>
		  <p <?php if ($_SESSION['login']==0 or $Conf==0){ echo 'style="display:none;"'; } ?>>***This proposal is in the process of voting***</p>
		  <div <?php if ($_SESSION['login']==0 or $Conf==1){ echo 'style="display:none;"'; } ?>>
		<form class="in-favor" method="post" <?php if ($_SESSION['login']==0){ echo 'style="display:none;"'; } ?>>
        <label for="comment">Comment</label>
	    <textarea name="comment" rows="8" cols="40" placeholder="Write here your Comment."></textarea>
		<input type="hidden" name="prop" id="prop" value= <?php echo $_GET['variable1'];?> />
		<input type="hidden" name="n_prop" id="n_prop" value= <?php echo $_GET['variable2'];?> />
		<input type="hidden" name="num" id="num" value= <?php echo $total_registros;?> />
		<input class="button button-support small expanded" title="Comment this proposal" value= "Comment" type="submit" name="comcom">
</input>  </form>
		  </div>
        </main>
      </div>
	  
      <div class="push"></div>
    </div>

 <div class="footer">
 <footer>
  <div class="row">

  <div class="subfooter row">
    <div class="small-12 medium-8 column">
      <p>
        European Proyect, 2016&nbsp;|&nbsp;
        <a href="./Construccion.html">More Information</a>&nbsp;|&nbsp;
        <a href="./Construccion.html">Privacy Policy</a>&nbsp;|&nbsp;
        <a href="./CondicionesUSO.html">Terms of use</a>&nbsp;|&nbsp;
        <a href="./Construccion.html">Accessibility</a>
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
	</div>
</footer>

</div>

</body></html>