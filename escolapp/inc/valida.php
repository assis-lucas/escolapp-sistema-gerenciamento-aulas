<?php

     session_start();

     $usuario = $_POST["login"];
     $senha = $_POST["senha"];

     $txt = "select * from usuarios where login='$usuario'";

     $sql = mysqli_query($conn, $txt);

     if(mysqli_num_rows($sql) > 0) {
       // eu achei o usuario
       $dados = mysqli_fetch_object($sql);

       if($senha == $dados->senha) {
           // achei a senha

           $_SESSION["nome"] = $dados->nome;
           $_SESSION["login"] = $dados->login;
           $_SESSION["senha"] = $dados->senha;

           header("Location: home.php");


       } else {
            // senha Invalida
            header("Location: index.php?erro=2");
       }



     } else {
       // nao achei o usuario
        header("Location: index.php?erro=1");
     }


 ?>
