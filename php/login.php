<?php 
//session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente.
include_once "includes/conexion.php"; 
/*Creamos el formulario con el campo de username que se llamara $_POST['user[username]'] y 2 campos para la clave y uno mas para confirmar si escribió bien la clave, se llamaran $_POST['user[password]'] y $_POST['user[user_password_confirmation]'] respectivamente, procedemos a escribir el codigo que procesara y validara lo que el username ingrese:*/
if(isset($_POST['commit']))//para saber si el botón registrar fue presionado. 
{ 
        $sql = 'SELECT * FROM usuarios_web'; 
        $rec = mysql_query($sql); 
        $verificar_usuario = 0;//Creamos la variable $verificar_usuario que empieza con el valor 0 y si la condición que verifica el user[username](abajo), entonces la variable toma el valor de 1 que quiere decir que ya existe ese nombre de username por lo tanto no se puede registrar
  
        while($result = mysql_fetch_object($rec)) 
        { 
            if($result->Usuarios_Email == $_POST['loginemail']) //Esta condición verifica si ya existe el username 
            { 
			 if($result->Usuarios_Pass == $_POST['loginpassword']) //Esta condición verifica si ya existe el username 
            { 
			    $verificar_usuario = 2; 
				$usuariologin =$result->Usuarios_Name;
            }
			 
			}
		}
		
        if($verificar_usuario == 2) 
        {   
            echo 'Login Realizado Correctamente';
			$_SESSION['login']=1;
			$_SESSION['usuario']=$usuariologin;
			header('Location: ./Main.php');
			
        } 
        else 
        {
			echo 'Error de Usuario o Contraseña';
        
		}		
}
?> 
