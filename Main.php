<!DOCTYPE html>
<?php
session_start();
if ($_SESSION['firstconex']=='3') { 
}else{
  $_SESSION['firstconex']='3';
  $_SESSION['login']=0;
  $_SESSION['logout']=0;
  $_SESSION['delprofile']=0;
  header('Location: ./Main.php');
}
if($_SESSION['login']==0)
{
	$_SESSION['logout']=0;
} 

include("php/logout.php");

?>
<html lang="es" data-current-user-id="" class="turbolinks-progress-bar">
<head>


    <title>Stars4ALL Proposals</title>
    <link rel="stylesheet" media="screen" href="./css/application-53523c481b0762fedc07b8a19a71a8c4f5c06ebe0617a04e0a8b14e6861d4d2b.css">
    <link rel="shortcut icon" type="image/x-icon" href="./css/icono.bmp">
    

<meta class="foundation-mq">
</head>
  <body>
  
    <div class="wrapper">
      <header>

  <section class="top-links hide-for-small-only">

</section>


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

          <div class="show-for-small-only">
            <div class="subnavigation row">
              <div class="small-12 medium-9 column">
  <ul>
      <li>
        <a accesskey="d" style="color:black" href="./Debates.php">Questions</a>
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
        <a accesskey="d" style="color:black" href="./Debates.php">Questions</a>
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

</header>

        <div class="expanded home-page padding no-margin-top">
    <div class="row">
      <div class="small-12 medium-8 column small-centered text-center">
        <h1>Stars light up the sky whenever you want.</h1>
        <p>The sky is a property of the Earth and we have to take care of it.</p>
      </div>
    </div> 
  </div>


    <div class="expanded jumbo-proposal-ballots">
      <div class="row">
        <div class="small-12 medium-6 column padding small-centered">
          <h2>New Proposals</h2>
          <h3>Add new ideas to reduce light pollution.</h3>
          <div class="small-12 medium-6 small-centered">
		    <a  <?php if ($_SESSION['login']==1){ echo 'style="display:none;"'; } ?> class="button expanded" href="./Entrar.php">Create New Proposals!</a>
            <a  <?php if ($_SESSION['login']==0){ echo 'style="display:none;"'; } ?> class="button expanded" href="./CrearProp.php">Create New Proposals!</a>
          </div>
        </div>
        <div class="small-12 medium-6 column">
        </div>
      </div>
    </div>

	    <div class="expanded jumbo-brand padding">
      <div class="row">
        <div class="small-12 medium-6 column">
          <h2>Voting Proposals</h2>
          <h3>Choose the best idea!</h3>
          <div class="small-12 medium-6 small-centered">
		    <a <?php if ($_SESSION['login']==1){ echo 'style="display:none;"'; } ?> class="button expanded" href="./Entrar.php">Voting New Proyect</a>
            <a <?php if ($_SESSION['login']==0){ echo 'style="display:none;"'; } ?> class="button expanded" href="./PropuestasCiudadanasV.php">Voting New Proyect</a>
          </div>
        </div>
        <div class="small-12 medium-6 column">
          <img src="./css/plaza_banner-1420decb6e2329a93264a0abdb352b674198a7990d25a87b13c54d95b39cdd3e.jpg" alt="Plaza banner">
        </div>
      </div>
    </div> 	
	
  <div class="expanded featured-welcome">

  <div class="row">
    <div class="small-12 column margin">
    </div>
  </div>

  <div class="row" data-equalizer="o5yach-equalizer" data-resize="xitw2x-eq" data-events="resize">
    <div class="small-12 medium-6 column" data-equalizer-watch="" style="height: 219px;">
      <div class="panel budget">
        <h3>Top Rated Proposals</h3>
        <div class="small-12 medium-6" style="margin:auto">
            <a class="button expanded" href="./PropTopVot.php">See Results</a>
        </div>
      </div>
    </div>

    <div class="small-12 medium-6 column" data-equalizer-watch="" style="height: 219px;">
      <div class="panel proposals">
        <h3>My Proposals</h3>
        <div class="small-12 medium-6" style="margin:auto">
		<a <?php if ($_SESSION['login']==1){ echo 'style="display:none;"'; } ?> class="button expanded" href="./Entrar.php">My Proposals</a>
        <a <?php if ($_SESSION['login']==0){ echo 'style="display:none;"'; } ?> class="button expanded" href="./PropPerfil.php">My Proposals</a>
        </div>
      </div>
    </div>
  </div>
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