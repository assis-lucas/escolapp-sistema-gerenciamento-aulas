<?php
    
	include("inc/conexao.php");
	
	$txt = "delete from alunos where id_aluno=$_GET[id]";
	mysqli_query($conn, $txt);
	
	
	
	header("Location: alunos.php");
	
	
 ?>