<?php 
//session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente.
include_once "includes/conexion.php"; 
/*Creamos el formulario con el campo de username que se llamara $_POST['user[username]'] y 2 campos para la clave y uno mas para confirmar si escribió bien la clave, se llamaran $_POST['user[password]'] y $_POST['user[user_password_confirmation]'] respectivamente, procedemos a escribir el codigo que procesara y validara lo que el username ingrese:*/

if(isset($_POST['comcom']))//para saber si el botón crear propuesta fue presionado. 
{ 
        $username = $_SESSION['usuario']; 
        $comentario = $_POST['comment']; 
        $propietario = $_POST['prop'];
		$n_propuesta = $_POST['n_prop'];
		$num_com = $_POST['num'] +1;

        $sql = "INSERT INTO comentarios 
		(Ind_Comentario,Propietario_Prop,N_Prop,Usuario_Comentario,Comentario,Fecha)
		VALUES ('$num_com', '$propietario', '$n_propuesta', '$username', '$comentario',CURRENT_TIMESTAMP)";
		$sql2 = "UPDATE propuestas SET N_Comentarios = N_Comentarios+1 
		WHERE Propietario = '$propietario' AND N_Propuesta = $n_propuesta;";
		
        $rec = mysql_query($sql);
        $rec2 = mysql_query($sql2);

		}?> 