<?php 
include_once "includes/conexion.php"; 

if(isset($_POST['respreg']))//para saber si el botón crear respuesta fue presionado. 
        { 
        $respuesta = $_POST['resp']; 
		$n_preg = $_POST['n_preg'];
        $sql = "INSERT INTO respuestas 
		(Id_Pregunta,Respuesta,Fecha)
		VALUES ('$n_preg','$respuesta',CURRENT_TIMESTAMP)";
		$sql2 = "UPDATE preguntas SET N_Respuestas = N_Respuestas+1 
		WHERE Id_Pregunta = '$n_preg'";
        $rec = mysql_query($sql);
        $rec2 = mysql_query($sql2);
		}
?> 