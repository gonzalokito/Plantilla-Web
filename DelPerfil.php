<!DOCTYPE html>
<?php 
session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente. 
include_once "includes/conexion.php";
include("php/delprofile.php");
if($_SESSION['login']==0){header('Location: ./Entrar.php');}
?>
<html lang="es" data-current-user-id="" class="turbolinks-progress-bar"><head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>My Profile </title>
    <link rel="stylesheet" media="screen" href="./css/application-53523c481b0762fedc07b8a19a71a8c4f5c06ebe0617a04e0a8b14e6861d4d2b.css">
	<link rel="shortcut icon" type="image/x-icon" href="./css/icono.bmp">
 
<meta class="foundation-mq">
</head>
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
  <section class="submenu">
      <li>
        <a  style="color:black" href="./PropPerfil.php">My Proposals</a>
      </li>
    <li>
      <a  style="color:black" href="./Perfil.php">My Profile</a>
    </li>
    <li>
      <a  style="color:blue" class="active" style="background-color: #e7f2fc" href="./DelPerfil.php">Delete User</a>
    </li>
		<li>
	<a  style="background-color: grey" href="./Main.php">Exit Settings</a>
    </li>
	</section>
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
  <section >
      <li>
        <a style="color:black" href="./PropPerfil.php">My Proposals</a>
      </li>
    <li>
      <a style="color:black" href="./Perfil.php">My Profile</a>
    </li>
    <li>
      <a style="color:blue" class="active" style="background-color: #e7f2fc" href="./DelPerfil.php">Delete User</a>
    </li>
		<li>
	<a  style="background-color: grey" href="./Main.php">Exit Settings</a>
    </li>
	</section>
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
<div><h1>Delete Profile</h1></div>
</br>           


<form  class="new_user" id="new_user" action="" accept-charset="UTF-8" method="post">

  <div class="row" >
    <div class="small-12 column">
</div>

<label>User--> <?php echo $_SESSION['usuario']; ?></label></br>
<div style="display: inline">
<div >
<li> All Proposals that you created will be delete</li>
<li> All Data of you will be delete</li>
<li> Other user could choose your username for create new profile</li>
<li> Your comments and votes will remain in the system </li>
<br>
</div>
<div ><input class="button button-support small expanded" title="Delete Profile" value= "Delete Profile" type="submit" name="delprofile">
</input></div>

</div>
          </div>
		  
        </main>
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