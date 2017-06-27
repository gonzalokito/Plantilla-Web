<!DOCTYPE html>
<?php 
session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente. 
?>
<html lang="es" data-current-user-id="" class="turbolinks-progress-bar"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Log In</title>
    <link rel="stylesheet" media="screen" href="./css/application-53523c481b0762fedc07b8a19a71a8c4f5c06ebe0617a04e0a8b14e6861d4d2b.css">
	
 <link rel="shortcut icon" type="image/x-icon" href="./css/icono.bmp">

</head>
  <body class="auth-page">
    <div class="wrapper margin-top">
      <div class="row">
        <div class="small-12 medium-8 large-5 column small-centered margin-top">
          <h1>
            <a href="./Main.php">
              <img class="show-for-medium float-left" alt="Madrid" src="./css/logo_header-7ffa742c7ffca6e7c1090ee66359b54816619563ddb615f4eaec882e9e1026ea.png" width="96" height="96">
              Stars4All
</a>          </h1>
        </div>
      </div>

      <div class="row auth">
        <main>
          <div class="small-12 medium-8 large-5 column small-centered panel padding margin-bottom">

<h2 <?php if ($_SESSION['login']==1 or $_SESSION['logout']==1 or $_SESSION['delprofile']==1){ echo 'style="display:none;"'; } ?>>Log in</h2>
<h2 <?php if ($_SESSION['logout']==0 or $_SESSION['delprofile']==1){ echo 'style="display:none;"'; } ?>>You log out successfully</h2>
<h2 <?php if ($_SESSION['delprofile']==0){ echo 'style="display:none;"';}?>>Your User was Delete</h2>

<?php if ($_SESSION['login']==0 or $_SESSION['logout']==1){include("php/login.php");} ?>

<a <?php if ($_SESSION['logout']==0 ){ echo 'style="display:none;"'; } ?> href="./Main.php">
Return to main page
</a>

<h2 <?php if ($_SESSION['login']==0 ){ echo 'style="display:none;"'; }?> > You are connect now </h2>
  
      <a <?php if ($_SESSION['login']==1 or $_SESSION['logout']==1){ echo 'style="display:none;"'; } ?> class="button-twitter button expanded" href="./Construccion.html">Log in with Twitter</a>

      <a <?php if ($_SESSION['login']==1 or $_SESSION['logout']==1){ echo 'style="display:none;"'; } ?> class="button-facebook button expanded" href="./Construccion.html">Log in with Facebook</a>


    <hr>



<p <?php if ($_SESSION['login']==1 or $_SESSION['logout']==1 or $_SESSION['delprofile']==1){ echo 'style="display:none;"'; } ?> >
  Don´t have an account? <a href="./Registrarse.php">Register</a>
</p>

<form <?php if ($_SESSION['login']==1 or $_SESSION['logout']==1 or $_SESSION['delprofile']==1){ echo 'style="display:none;"'; } ?> class="new_user" id="new_user" action="./Entrar.php" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="no60/1jELEEPhm8n2Lzf4kKk+Xcts6mMvAfR7iXjuBMrw1h+lefaYZkvRxryz99INcON//fVb0V/KX2HXRtLYQ==">
  <div class="row">
    <div class="small-12 columns">
      <label for="user_email">Email</label>
	  <input autofocus="autofocus" placeholder="Email" tabindex="1" type="email" value="" name="loginemail" id="user_email">
    </div>

    <div class="small-12 columns">
      <a class="float-right" tabindex="3" href="./Construccion.html">Forget your password?</a>
      <label for="user_password">Password</label>
	  <input autocomplete="off" placeholder="Password" tabindex="2" type="password" name="loginpassword" id="user_password">
    </div>

    <div class="small-12 columns">
      <input type="submit" name="commit" value="Log in" class="button expanded">
    </div>
  </div>
</form>
<div class="text-center">

</div>

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
        <a href="./Condiciones%20de%20uso.html">Terms of use</a>&nbsp;|&nbsp;
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
	
</footer>

    </div>
  

</body></html>
<?php if ($_SESSION['delprofile']==1){$_SESSION['delprofile']=0;$_SESSION['logout']=0;}?>