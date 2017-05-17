<?php 
//session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente.
include_once "includes/conexion.php"; 

/*Creamos el formulario con el campo de username que se llamara $_POST['user[username]'] y 2 campos para la clave y uno mas para confirmar si escribió bien la clave, se llamaran $_POST['user[password]'] y $_POST['user[user_password_confirmation]'] respectivamente, procedemos a escribir el codigo que procesara y validara lo que el username ingrese:*/
if(isset($_POST['rmvprop']))//para saber si el botón crear propuesta fue presionado. 
{ 
		
        $username = $_SESSION['usuario']; 
		$n_prop = $_POST['Rmv_Prop'];
        $sql = "DELETE FROM propuestas
		WHERE Propietario='$username' and N_Propuesta='$n_prop'"; 
        $rec = mysql_query($sql);
		$sql2 = "DELETE FROM votos
		WHERE Propietario='$username' and N_Propuesta='$n_prop'"; 
        $rec = mysql_query($sql2);
		$sql3 = "DELETE FROM comentarios
		WHERE Propietario_Prop='$username' and N_Prop='$n_prop'"; 
        $rec = mysql_query($sql3);
		echo("<script>alert('Proposal Removed!!')</script>");
        echo("<script>window.location = '/.PropPerfil.php';</script>");
        

		}


?> 