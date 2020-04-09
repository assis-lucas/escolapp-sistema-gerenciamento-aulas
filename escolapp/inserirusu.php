<?php
    
	include("inc/conexao.php");
	
	$txt = "insert into usuarios (nome,login,senha) values ('$_POST[nomeUsuario]','$_POST[login]','$_POST[senha]')";
	mysqli_query($conn, $txt);
	
	header("Location: usuarios.php");
	
	
 ?>