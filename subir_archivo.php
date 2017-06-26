<?php
session_start();

if( !isset($_FILES['archivo']) ){
}else{
 
  $nombre = $_FILES['archivo']['name'];
  $nombre_tmp = $_FILES['archivo']['tmp_name'];
  $tipo = $_FILES['archivo']['type'];
  $tamano = $_FILES['archivo']['size'];
  $ext_permitidas = array('pdf','doc','docx','png');
  $partes_nombre = explode('.', $nombre);
  $extension = end( $partes_nombre );
  $ext_correcta = in_array($extension, $ext_permitidas);
  $limite = 500 * 1024;
 
  if( $ext_correcta && $tamano <= $limite ){
    if( $_FILES['archivo']['error'] > 0 ){
      echo 'Error: ' . $_FILES['archivo']['error'] . '<br/>';
    }else{
      echo 'Nombre: ' .$_SESSION['usuario']. $nombre . '<br/>';
      echo 'Tipo: ' . $tipo . '<br/>';
      echo 'Tamaño: ' . ($tamano / 1024) . ' Kb<br/>';
      echo 'Guardado en: ' . $nombre_tmp;
 
      if( file_exists( '.subidas/'.$_SESSION['usuario'].$nombre) ){
        echo '<br/>El archivo ya existe: ' . $nombre;
      }else{
        move_uploaded_file($nombre_tmp,
          "subidas/" .$_SESSION['usuario']. $nombre);
 
        echo "<br/>Guardado en: " .$_SESSION['usuario']. "subidas/" . $nombre;
      }
    }
  }else{
    echo 'Archivo inválido';
  }
}
?>