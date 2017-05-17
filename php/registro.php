<?php 
//session_start();//crea una sesión para ser usada mediante una petición GET o POST, o pasado por una cookie y la sentencia include_once es la usaremos para incluir el archivo de conexión a la base de datos que creamos anteriormente.
include_once "includes/conexion.php"; 
/*Creamos el formulario con el campo de username que se llamara $_POST['user[username]'] y 2 campos para la clave y uno mas para confirmar si escribió bien la clave, se llamaran $_POST['user[password]'] y $_POST['user[user_password_confirmation]'] respectivamente, procedemos a escribir el codigo que procesara y validara lo que el username ingrese:*/
if(isset($_POST['commit']))//para saber si el botón registrar fue presionado. 
{ 
    if($_POST['username'] == '' or $_POST['userpassword'] == '' or $_POST['userpasswordconf'] == '')
    { 
        echo 'Por favor llene todos los campos.';//Si los campos están vacíos muestra el siguiente mensaje, caso contrario sigue el siguiente codigo.
    } 
    else 
    { 
        $sql = 'SELECT * FROM usuarios_web'; 
        $rec = mysql_query($sql); 
        $verificar_usuario = 0;//Creamos la variable $verificar_usuario que empieza con el valor 0 y si la condición que verifica el user[username](abajo), entonces la variable toma el valor de 1 que quiere decir que ya existe ese nombre de username por lo tanto no se puede registrar
  
        while($result = mysql_fetch_object($rec)) 
        { 
            if($result->Usuarios_Name == $_POST['username']) //Esta condición verifica si ya existe el username 
            { 
                $verificar_usuario = 1; 
            } 
			if($result->Usuarios_Email == $_POST['useremail']) //Esta condición verifica si ya existe el username 
            { 
                $verificar_usuario = 2; 
            } 
        } 
		
		if ($_POST['terms_of_service']==0){
			$verificar_usuario = 3; 
		}
		
        if($verificar_usuario == 0) 
        { 
            if($_POST['userpassword'] == $_POST['userpasswordconf'])//Si los campos son iguales, continua el registro y caso contrario saldrá un mensaje de error.
            { 
                $username = $_POST['username']; 
                $userpassword = $_POST['userpassword']; 
				$useremail = $_POST['useremail'];
                $sql = "INSERT INTO usuarios_web (Usuarios_Name,Usuarios_Pass,Usuarios_Email,Usuarios_Tipo) VALUES ('$username','$userpassword','$useremail','W')";//Se insertan los datos a la base de datos y el username ya fue registrado con exito.
				$prin = mysql_query($sql);				
                echo '########################################';
				echo "<br>";
				echo 'USTED SE HA REGISTRADO CORRECTAMENTE';
				echo "<br>";
				echo '########################################'; 
				$aux=1;
            } 
            else 
            { 
                echo 'Las claves no son iguales, intente nuevamente.'; 
            } 
        } 
        else 
        {
			if($verificar_usuario == 1) {
				echo 'Este username ya ha sido registrado anteriormente.';
			}else{
			if($verificar_usuario == 2) {
					echo 'Este email ya ha sido registrado anteriormente.';
			}else{
				echo 'Acepta las condiciones de Uso.';
			}
			}
        } 
    } 
}?> 