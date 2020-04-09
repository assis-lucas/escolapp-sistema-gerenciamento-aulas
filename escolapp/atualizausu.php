<?php
    
	include("inc/conexao.php");
	
	$txt = "update 
	          usuarios
			set
			  nome = '$_POST[nome]',
			  login = '$_POST[login]',
			  senha = '$_POST[senha]'
			where
              id = $_POST[id]			
			 ";
			 
	mysqli_query($conn, $txt);	
	header("Location: usuarios.php");
	
	
 ?>