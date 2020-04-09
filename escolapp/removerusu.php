<?php
    
	include("inc/conexao.php");
	
	$txt = "delete from usuarios where id=$_GET[id]";
	mysqli_query($conn, $txt);
	
	
	
	header("Location: usuarios.php");
	
	
 ?>