<?php
$servidor = "localhost"; //el servidor que utilizaremos, en este caso ser� el localhost
$usuario = "prueba"; //El usuario que acabamos de crear en la base de datos
$contrasenha = "prueba1"; //La contrase�a del usuario que utilizaremos
$BD = "usuarios"; //El nombre de la base de datos
 
/*Aqu� abrimos la conexi�n en el servidor.
Normalmente se envian 3 parametros (los datos del servidor, usuario y contrase�a) a la funci�n mysql_connect,
si no hay ning�n error la conexi�n ser� un �xito
El @ que se ponde delante de la funcion, es para que no muestre el error al momento de ejecutarse, ya crearemos un c�digo para eso*/
$conexion = @mysql_connect($servidor, $usuario, $contrasenha);
 
/* Aqu� preguntamos si la conexi�n no pudo realizarse, de ser as� lanza un mensaje en la pantalla con el siguiente texto "No pudo conectarse:"
y le agrega el error ocurrido con "mysql_error()"
*/
if (!$conexion) {
    die('<strong>No pudo conectarse:</strong> ' . mysql_error());
}
/*En esta linea seleccionaremos la BD con la que trabajaremos y le pasaremos como referencia la conexi�n al servidor.
Para saber si se conecto o no a la BD podr�amos utilizar el IF de la misma forma que la utilizamos al momento de conectar al servidor, pero usaremos otra forma de comprobar eso usando die().
*/
mysql_select_db($BD, $conexion) or die(mysql_error($conexion));
 
?>