<?php
include ("inc/conexao.php");
include ("inc/verifica.php");


$alunoField = $_GET['aluno'];
$cpf = $_GET['cpf'];
$aulas = $_GET['aulas'];
$cat = $_GET['cat'];

      $txt = "select * from alunos where nome_aluno='$alunoField'";
      $sql = mysqli_query($conn, $txt);
      $dados = mysqli_fetch_object($sql);
      $linhasAluno = mysqli_num_rows($sql);

      $txtA = "select * from alunos where cpf='$cpf'";
      $sqlA = mysqli_query($conn, $txtA);
      $dadosA = mysqli_fetch_object($sqlA);
      $linhasCpf = mysqli_num_rows($sqlA);

    if ($linhasAluno != 0){
      ?> <script>alert("Já existe um aluno com esse NOME cadastrado!");</script> <?php
    }
    if ($linhasCpf != 0){
      ?> <script>alert("Já existe um aluno com esse CPF cadastrado!");</script> <?php
    }
    if($linhasAluno == 0 && $linhasCpf == 0){

          $txtAlunos = "insert into alunos
           (nome_aluno,cpf,aulas_restantes,categoria_aluno)
             values
           ('$alunoField','$cpf','$aulas','$cat')";

          if(mysqli_query($conn, $txtAlunos)){
            ?> <script>alert("Aluno cadastrado com sucesso!");
            $("#nAluno").val('');
            $("#cpf").val('');
            </script> <?php
          } else {
            ?> <script>alert("Erro ao cadastrar Aluno!");</script> <?php
          }
    }

?>
