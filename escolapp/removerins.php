<?php
    
	include("inc/conexao.php");
	
	$txt = "delete from instrutores where id_instrutor=$_GET[id]";
	mysqli_query($conn, $txt);
	
	
	
	header("Location: instrutores.php");
	
	
 ?>