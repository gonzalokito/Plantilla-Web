<?php 
//session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente.
include_once "includes/conexion.php"; 
/*Creamos el formulario con el campo de username que se llamara $_POST['user[username]'] y 2 campos para la clave y uno mas para confirmar si escribió bien la clave, se llamaran $_POST['user[password]'] y $_POST['user[user_password_confirmation]'] respectivamente, procedemos a escribir el codigo que procesara y validara lo que el username ingrese:*/

if(isset($_POST['respreg']))//para saber si el botón crear propuesta fue presionado. 
{ 

 
        $respuesta = $_POST['resp']; 
		$n_preg = $_POST['n_preg'];
		$num_com = $_POST['num'] +1;
		
        $sql = "INSERT INTO respuestas 
		(Id_Pregunta,Respuesta,Fecha)
		VALUES ('$n_preg','$respuesta',CURRENT_TIMESTAMP)";
		$sql2 = "UPDATE preguntas SET N_Respuestas = N_Respuestas+1 
		WHERE Id_Pregunta = '$n_preg'";
		
        $rec = mysql_query($sql);
        $rec2 = mysql_query($sql2);

		}?> 