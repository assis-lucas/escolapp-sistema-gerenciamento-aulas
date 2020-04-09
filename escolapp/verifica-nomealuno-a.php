<?php
include ("inc/conexao.php");
include ("altera-alunos.php");

$alunoField = $_GET['aluno'];
$cpf = $_GET['cpf'];
$aulas = $_GET['aulas'];
$cat = $_GET['cat'];

/*

      $txt = "select * from alunos where nome_aluno='$alunoField'";
      $sql = mysqli_query($conn, $txt);
      $info = mysqli_fetch_object($sql);
      $linhasAluno = mysqli_num_rows($sql);

      $txtA = "select * from alunos where cpf='$cpf'";
      $sqlA = mysqli_query($conn, $txtA);
      $infoa = mysqli_fetch_object($sqlA);
      $linhasCpf = mysqli_num_rows($sqlA);


      $alunoDb = $info->nome_aluno;
      $cpfDb = $infoa->cpf;

            ?> <script>alert(<? echo $cpfDb; ?>);</script> <?php

    if ( $alunoDb != $alunoField ) {

          if ($linhasAluno != 0){
            ?> <script>alert("Já existe um aluno com esse NOME cadastrado!");</script> <?php
          }

    } else if ( $cpfDb != $cpf ) {

          if ($linhasCpf != 0){
            ?> <script>alert("Já existe um aluno com esse CPF cadastrado!");</script> <?php
          }

    } else {*/

          $txtAlunos = "update
        	          alunos
        			set
        			  nome_aluno = '$alunoField',
        			  cpf = '$cpf',
        			  aulas_restantes = '$aulas',
        			  categoria_aluno = '$cat'
        			where
                id_aluno = '$getId'
                ";

          if(mysqli_query($conn, $txtAlunos)){
            ?> <script>alert("Aluno alterado com sucesso!");</script> <?php
              $red;
          } else {
            ?> <script>alert("Erro ao cadastrar Aluno!");</script> <?php
          }


?>
