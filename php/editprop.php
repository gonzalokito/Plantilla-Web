<?php 
//session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente.
include_once "includes/conexion.php"; 

/*Creamos el formulario con el campo de username que se llamara $_POST['user[username]'] y 2 campos para la clave y uno mas para confirmar si escribió bien la clave, se llamaran $_POST['user[password]'] y $_POST['user[user_password_confirmation]'] respectivamente, procedemos a escribir el codigo que procesara y validara lo que el username ingrese:*/
if(isset($_POST['editprop']))//para saber si el botón crear propuesta fue presionado. 
{ 
		
        $username = $_SESSION['usuario']; 
        $title = $_POST['title']; 
        $description = $_POST['description'];
		$etiqueta = $_POST['etiqueta'];
		$lenguaje = $_POST['lenguage'];
		$n_prop = $_POST['n_prop'];
		if(strlen($etiqueta==0)){$etiqueta='Sin Etiqueta';}
		if(strlen($title)<>0){
			if(strlen($description)<>0){
        $sql = "UPDATE propuestas SET Cuerpo_Propuesta='$description',Titulo_Propuesta='$title',Etiqueta='$etiqueta',Idioma='$lenguaje' 
		WHERE Propietario='$username' and N_Propuesta='$n_prop'"; 
        $rec = mysql_query($sql);
		echo("<script>alert('Proposal Edited!!')</script>");
        echo("<script>window.location = './PropPerfil.php';</script>");
		}else{echo "<div style=background-color:red;color:white> Error:No Description Include </div>";}
		}else{echo "<div style=background-color:red;color:white> Error:No Title Include </div>";}
        

		}



?> 