<?php

	include("inc/conexao.php");

  $txt = "select * from alunos";
  $sql = mysqli_query($conn, $txt);

  $dados = array();

  foreach ($sql as $registro) {
      array_push($dados, array(
      'nome'=>$registro['nome_aluno'],
      'cpf'=>$registro['cpf'],
      ));

  }

  echo utf8_encode(json_encode($dados));

?>
