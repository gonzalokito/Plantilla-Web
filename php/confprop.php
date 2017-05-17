<?php 
//session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente.
include_once "includes/conexion.php"; 

/*Creamos el formulario con el campo de username que se llamara $_POST['user[username]'] y 2 campos para la clave y uno mas para confirmar si escribió bien la clave, se llamaran $_POST['user[password]'] y $_POST['user[user_password_confirmation]'] respectivamente, procedemos a escribir el codigo que procesara y validara lo que el username ingrese:*/
if(isset($_POST['cnfprop']))//para saber si el botón confirmar propuesta fue presionado. 
{ 
		
        $username = $_SESSION['usuario']; 
		$n_prop = $_POST['Conf_Prop'];
        $sql = "UPDATE propuestas
		SET Confirmacion=1 WHERE Propietario='$username' and N_Propuesta='$n_prop'"; 
        $rec = mysql_query($sql);
		echo("<script>alert('Proposal Confirmed!!')</script>");
        echo("<script>window.location = './PropPerfil.php';</script>");
        
		}


?> 