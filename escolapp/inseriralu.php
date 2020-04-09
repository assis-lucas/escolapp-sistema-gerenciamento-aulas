<?php

	include("inc/conexao.php");

	$txt = "insert into alunos
	 (nome_aluno,cpf,categoria_aluno,aulas_restantes)
		 values
	 ('$_POST[nomeAluno]','$_POST[cpfAluno]','$_POST[categoria]','$_POST[qt_aulas]')";

	mysqli_query($conn, $txt);

	header("Location: alunos.php");


 ?>
