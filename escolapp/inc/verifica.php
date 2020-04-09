<?php
    session_start();

    if($_SESSION["login"] == "" && $_SESSION["senha"] == "") {
                // usuario nao esta logado.
               header("Location: index.php?erro=3");

    }



 ?>
