<?php

	include("inc/conexao.php");

	$txt = "update
	          instrutores
			set
			  nome_instrutor = '$_POST[nome]',
			  categoria_instrutor = '$_POST[categoria]'
			where
              id_instrutor = $_POST[id]
			 ";

	mysqli_query($conn, $txt);
	header("Location: instrutores.php");


 ?>
