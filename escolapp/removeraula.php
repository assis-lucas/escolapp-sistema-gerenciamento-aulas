<?php
    
	include("inc/conexao.php");
	
	$txt = "delete from aulas where id_aula=$_GET[id]";
	mysqli_query($conn, $txt);
	
	
	
	header("Location: agenda-aulas.php");
	
	
 ?>