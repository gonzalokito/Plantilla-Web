<?php
$servidor = "localhost"; //el servidor que utilizaremos, en este caso ser� el localhost
$usuario = "prueba"; //El usuario que acabamos de crear en la base de datos
$contrasenha = "prueba1"; //La contrase�a del usuario que utilizaremos
$BD = "usuarios"; //El nombre de la base de datos
 
/*Aqu� abrimos la conexi�n en el servidor.*/
$conexion = @mysql_connect($servidor, $usuario, $contrasenha);
 
if (!$conexion) {
    die('<strong>No pudo conectarse:</strong> ' . mysql_error());
}

mysql_select_db($BD, $conexion) or die(mysql_error($conexion));
 
?>