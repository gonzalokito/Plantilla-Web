<?php

if(isset($_POST['delprofile']))
{
	$prop = $_SESSION['usuario'];
	$sql = "DELETE FROM propuestas WHERE propuestas.Propietario = '$prop'"; 
	$rec = mysql_query($sql);
	$sql2 = "DELETE FROM usuarios_web WHERE usuarios_web.Usuarios_Name = '$prop'"; 
	$rec2 = mysql_query($sql2);
	if ($_SESSION['login']==1){
	$_SESSION['logout']=1;
	$_SESSION['login']=0;
	$_SESSION['delprofile']=1;
	header('Location: ./Entrar.php');
	
	}
}
?>
