<?php

	include("inc/conexao.php");

	$txt = "update
	          alunos
			set
			  aulas_restantes = '$_GET[qt_aulas]',
			  categoria_aluno = '$_GET[categoria]'
			where
              id_aluno = $_GET[idAluno]";

	mysqli_query($conn, $txt);
	header("Location: alunos.php");


 ?>
