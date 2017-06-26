<?php
//UPDATE usuarios_web SET Usuarios_Name=[value-1],Usuarios_Email=[value-2],Usuarios_Pass=[value-3],Usuarios_Tipo=[value-4] WHERE 1
if(isset($_POST['moduser']))
{       
if (strlen($_POST['changeUser'])==0){echo "<div style=background-color:red;color:white> Empty Username. </div>";}else{
        $prop = $_SESSION['usuario'];
		$chg = $_POST['changeUser'];
	    $sql = 'SELECT * FROM usuarios_web'; 
        $rec = mysql_query($sql); 
        $verificar_usuario = 0;//Creamos la variable $verificar_usuario que empieza con el valor 0 y si la condición que verifica el user[username](abajo), entonces la variable toma el valor de 1 que quiere decir que ya existe ese nombre de username por lo tanto no se puede registrar
        while($result = mysql_fetch_object($rec)) 
        { 
            if($result->Usuarios_Name == $chg) //Esta condición verifica si ya existe el username 
            { 
			    $verificar_usuario = 2; 
			 
			}
		}
		
        if($verificar_usuario == 0) 
        {   
			$sql1 = "UPDATE usuarios_web SET Usuarios_Name='$chg' WHERE Usuarios_Name='$prop'";
			$sql2 = "UPDATE propuestas SET Propietario='$chg' WHERE Propietario='$prop'";
			$sql3 = "UPDATE votos SET Propietario='$chg' WHERE Propietario='$prop'";
			$sql4 = "UPDATE votos SET Usuario_Voto='$chg' WHERE Usuario_Voto='$prop'";
			$sql5 = "UPDATE comentarios SET Usuario_Comentario='$chg' WHERE Usuario_Comentario='$prop'";
			$sql6 = "UPDATE comentarios SET Propietario='$chg' WHERE Propietario='$prop'";
			$rec = mysql_query($sql1);
			$rec = mysql_query($sql2);
			$rec = mysql_query($sql3);
			$rec = mysql_query($sql4);
			$rec = mysql_query($sql5);
			$rec = mysql_query($sql6);
			echo "<div style=background-color:green;color:white> You changed your Username successfully. </div>";
		$_SESSION['usuario']=$chg;
		}
		else {echo "<div style=background-color:red;color:white> Choose other Username. </div>";}

}
}
if(isset($_POST['modemail']))
{
	$prop = $_SESSION['usuario'];
	$olde=$_POST['changeUser1'];
	$newe=$_POST['changeUser2'];
	$newe2=$_POST['changeUser3'];
	if($newe==$newe2){
		$sql = 'SELECT * FROM usuarios_web'; 
        $rec = mysql_query($sql); 
        $verificar_usuario = 0;//Creamos la variable $verificar_usuario que empieza con el valor 0 y si la condición que verifica el user[username](abajo), entonces la variable toma el valor de 1 que quiere decir que ya existe ese nombre de username por lo tanto no se puede registrar
        while($result = mysql_fetch_object($rec)) 
        { 
	        if($result->Usuarios_Email == $olde and $result->Usuarios_Name == $prop)
			{
				if ($verificar_usuario<>2){
					$verificar_usuario=1;
				}
			}
            if($result->Usuarios_Email == $newe) //Esta condición verifica si ya existe el Email 
            { 
			    $verificar_usuario = 2; 
			 
			}
		}
		
        if($verificar_usuario == 1) 
        {   
	       $sql7 = "UPDATE usuarios_web SET Usuarios_Email='$newe' WHERE Usuarios_Email='$olde'"; 
	       $rec = mysql_query($sql7);
		   echo "<div style=background-color:green;color:white> You changed your Email successfully. </div>";
	    }else{if ($verificar_usuario==2){echo "<div style=background-color:red;color:white> This email is on use </div>";}
		else{echo "<div style=background-color:red;color:white> The old email don't match </div>";}}
	    }else{echo "<div style=background-color:red;color:white> Repeat email don't match </div>";}
}
if(isset($_POST['modpwd']))
{
	$prop = $_SESSION['usuario'];
	$oldp=$_POST['changeUser4'];
	$newp=$_POST['changeUser5'];
	$newp2=$_POST['changeUser6'];
	
	if($newp==$newp2){
		$sql = "SELECT * FROM usuarios_web WHERE Usuarios_Name='$prop'"; 
        $rec = mysql_query($sql); 
        $result = mysql_fetch_object($rec);
        
        if($result->Usuarios_Pass == $oldp) //Esta condición verifica si ya existe el username 
            { 
				$sql8 = "UPDATE usuarios_web SET Usuarios_Pass='$newp' WHERE Usuarios_Pass='$oldp' and Usuarios_Name='$prop'";
				$rec = mysql_query($sql8);
				echo "<div style=background-color:green;color:white> You change the password successfully. </div>";
			}else{echo "<div style=background-color:red;color:white> The old password don't match </div>";}
	    }else{echo "<div style=background-color:red;color:white> The new password don't match </div>";}

}

?>
