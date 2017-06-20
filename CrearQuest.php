<!DOCTYPE html>
<?php 
session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente. 
?>
<html lang="es" data-current-user-id="" class="turbolinks-progress-bar"><head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>New Question</title>
    <link rel="stylesheet" media="screen" href="./css/application-53523c481b0762fedc07b8a19a71a8c4f5c06ebe0617a04e0a8b14e6861d4d2b.css">
	<link rel="shortcut icon" type="image/x-icon" href="./css/icono.bmp">
    <link rel="apple-touch-icon" type="image/png" href="https://decide.madrid.es/assets/apple-touch-icon-200-6c25d8d55a31c81a0d22a208ac3d981d66bd93911a614a54e1116b8548a22e90.png" sizes="200x200">
    
<meta class="foundation-mq"></head>
  <body class="auth-page">
    <div class="wrapper margin-top">
      <div class="row">
        <div class="small-12 medium-8 large-5 column small-centered margin-top">
          <h1>
            <a href="./Main.php">
              <img class="show-for-medium float-left" alt="Madrid" src="./css/logo_header-7ffa742c7ffca6e7c1090ee66359b54816619563ddb615f4eaec882e9e1026ea.png" width="96" height="96">
              Stars4All
           </a>          
          </h1>
        </div>
      </div>

      <div class="row auth">
        <main>
          <div class="column small-centered panel padding margin-bottom">
            
<h2>New Question</h2>

<?php include("php/pregunta.php"); ?>


<form  class="new_user" id="new_user" action="" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓">

  <div class="row" >
    <div class="small-12 column">
      <label for="title">Question</label>
      <textarea autocomplete="off" maxlength="250" rows="3" cols="40" placeholder="Write Question" size="250" type="text" name="title" id="title"></textarea>
      <label for="lenguage">Language</label> 
        <select id="lenguage" name="lenguage">
            <option value="ESP" selected="selected">ESP</option>
            <option value="ENG">ENG</option>
            <option value="FRE">FRE</option>
            <option value="DEU">DEU</option>
	  <br/>
      <input type="submit" name="preg" value="Create Question" class="button expanded">
    </div>
  </div>
</form>

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