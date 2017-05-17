<?php

if(isset($_POST['commit']))
{
	if ($_SESSION['login']==1){
	$_SESSION['logout']=1;
	$_SESSION['login']=0;
	header('Location: ./Entrar.php');
}
}
if(isset($_POST['commit1']))
{
	$_SESSION['logout']=0;
	header('Location: ./Entrar.php');

}
?>

