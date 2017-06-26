<!DOCTYPE html>
<?php 
session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente. 
$aux=0
?>
<html lang="es" data-current-user-id="" class="turbolinks-progress-bar"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Sign In</title>
    <link rel="stylesheet" media="screen" href="./css/application-53523c481b0762fedc07b8a19a71a8c4f5c06ebe0617a04e0a8b14e6861d4d2b.css">
	<link rel="shortcut icon" type="image/x-icon" href="./css/icono.bmp">
    <link rel="apple-touch-icon" type="image/png" href="./css/icono.bmp" sizes="200x200">
    

<meta class="foundation-mq"></head>
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
            
<h2>Sign In</h2>

<?php include("php/registro.php"); ?>

      <a <?php if ($aux==1){ echo 'style="display:none;"'; } ?> class="button-twitter button expanded" href="./Construccion.html">Sign In by Twitter</a>

      <a <?php if ($aux==1){ echo 'style="display:none;"'; } ?> class="button-facebook button expanded" href="./Construccion.html">Sign In by Facebook</a>


    <hr>



<form <?php if ($aux==1){ echo 'style="display:none;"'; } ?> class="new_user" id="new_user" action="" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓">


  <div class="row">
    <div class="small-12 column">

      <input type="hidden" name="user[use_redeemable_code]" id="user_use_redeemable_code">
      <input value="es" type="hidden" name="user[locale]" id="user_locale">

      <label for="user_username">Username</label>
      <input maxlength="60" placeholder="Username of your publications" size="60" type="text" name="username" id="user_username">

      <div id="user_1476098925"><style type="text/css" media="screen" scoped="scoped">#user_1476098925 { display:none; }
	  </style><label for="user_family_name">Si eres humano, por favor ignora este campo</label><input type="text" name="user_family_name" id="user_family_name"></div>

      <label for="user_email">Email</label>
	  <input placeholder="Email" type="email" value="" name="useremail" id="user_email">


      <label for="user_password">Password</label>
	  <input autocomplete="off" placeholder="Password of your account" type="password" name="userpassword" id="user_password">

      <label for="user_password_confirmation">Repit Password</label>
	  <input autocomplete="off" placeholder="Repit the password" type="password" name="userpasswordconf" id="user_password_confirmation">


      <label for="user_terms_of_service">
        <input name="terms_of_service" type="hidden" value="0">
		<input title="Al registrarte aceptas las condiciones de uso" type="checkbox" value="1" name="terms_of_service" id="user_terms_of_service">
        <span class="checkbox">
          Accept the conditions <a title=" (New page open)" target="_blank" href="./CondicionesUso.html">of use</a>
        </span>
</label>
      <input type="submit" name="commit" value="Sing In" class="button expanded">
    </div>
  </div>
</form>


<div class="text-center">
	  <a href="./Entrar.php">Log In</a><br>
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
	
</footer>

    </div>
  

</body></html>