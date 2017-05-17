<?php 
//session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente.
include_once "includes/conexion.php"; 
/*Creamos el formulario con el campo de username que se llamara $_POST['user[username]'] y 2 campos para la clave y uno mas para confirmar si escribió bien la clave, se llamaran $_POST['user[password]'] y $_POST['user[user_password_confirmation]'] respectivamente, procedemos a escribir el codigo que procesara y validara lo que el username ingrese:*/
if(isset($_POST['commit3']))//para saber si el botón crear propuesta fue presionado. 
{ 
		
        $username = $_SESSION['usuario']; 
        $title = $_POST['title']; 
        $description = $_POST['description'];
		$etiqueta = $_POST['etiqueta'];
		$lenguaje = $_POST['lenguage'];
		$sqlprev = "SELECT N_Propuesta FROM propuestas 
		WHERE Propietario = '$username' GROUP BY 1 DESC LIMIT 1";
		$recprev = mysql_query($sqlprev);
		$res = mysql_fetch_object($recprev);
		$n_propuesta=$res ->N_Propuesta +1;
		echo 'holaaaaa';
		if(strlen($etiqueta==0)){$etiqueta='Sin Etiqueta';}
		if(strlen($title)<>0){
			if(strlen($description)<>0){
        $sql = "INSERT INTO propuestas 
		(Titulo_Propuesta,Cuerpo_Propuesta,N_Comentarios,Propietario,N_Propuesta,Votos,Etiqueta,Idioma,Ruta_Fichero,Fecha_Creacion)
		VALUES ('$title', '$description', 0, '$username', '$n_propuesta', 0, '$etiqueta' ,'$lenguaje' ,'' , CURRENT_TIMESTAMP)"; 
        $rec = mysql_query($sql);
		header('Location: ./PropuestasCiudadanas.php');
		}else{echo "<div style=background-color:red;color:white> Error:No Description Include </div>";}
		}else{echo "<div style=background-color:red;color:white> Error:No Title Include </div>";}
        

		}?> 