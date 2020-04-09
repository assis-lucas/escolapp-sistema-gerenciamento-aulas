<?php
    
	include("inc/conexao.php");
	
	$txt = "insert into instrutores (nome_instrutor,categoria_instrutor) values ('$_POST[nomeInstrutor]','$_POST[categoria]')";
	mysqli_query($conn, $txt);
	
	header("Location: instrutores.php");
	
	
 ?>