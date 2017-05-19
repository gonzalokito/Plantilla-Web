<?php 
//session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente.
include_once "includes/conexion.php"; 
/*Creamos el formulario con el campo de username que se llamara $_POST['user[username]'] y 2 campos para la clave y uno mas para confirmar si escribió bien la clave, se llamaran $_POST['user[password]'] y $_POST['user[user_password_confirmation]'] respectivamente, procedemos a escribir el codigo que procesara y validara lo que el username ingrese:*/
if(isset($_POST['preg']))//para saber si el botón crear propuesta fue presionado. 
{  
        $title = $_POST['title']; 
		$lenguaje = $_POST['lenguage'];
		if(strlen($title)<>0){
        $sql = "INSERT INTO preguntas 
		(Cuerpo_Pregunta,Idioma,N_Respuestas,Fecha_Creacion)
		VALUES ('$title', '$lenguaje', '0' , CURRENT_TIMESTAMP)"; 
        $rec = mysql_query($sql);
		header('Location: ./Debates.php');
		}else{echo "<div style=background-color:red;color:white> Error:No Question Include </div>";}
        

		}?> 