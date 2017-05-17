<?php 

if(isset($_POST['comvot']))//para saber si el botón de votar fue presionado. 
{ 
        $sqlver = 'SELECT * FROM votos'; 
        $ver = mysql_query($sqlver); 
        $verificar_voto = 0;
        while($result = mysql_fetch_object($ver)) 
        { 
            if($result->Usuario_Voto == $_SESSION['usuario'] and $result->Propietario == $_POST['Votar_Usuario1']
			and $result->N_Propuesta == $_POST['Votar_Usuario2'])
            {
				$verificar_voto = 1;
			}
		}
		if ($verificar_voto==0){
			$voto = $_POST['Votar_Usuario3']+1;
			$prop = $_POST['Votar_Usuario1'];
			$numprop = $_POST['Votar_Usuario2'];
			$sql = "UPDATE propuestas SET Votos = '$voto' 
			WHERE propuestas.Propietario = '$prop' 
			AND propuestas.N_Propuesta = '$numprop' "; 
			$rec = mysql_query($sql); 
			$usuario= $_SESSION['usuario'];
			$sql2 = "INSERT INTO votos VALUES ('$usuario','$prop','$numprop')"; 
			$rec2 = mysql_query($sql2);
			echo "<div style=background-color:green;color:white> You voted successfully. </div>";
		}else {echo "<div style=background-color:red;color:white> Error: You voted the proposal number $_POST[Votar_Usuario2] of user $_POST[Votar_Usuario1] previously. Choose other. </div>";}
}

?> 
