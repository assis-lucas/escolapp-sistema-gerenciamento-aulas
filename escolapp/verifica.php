<?php

session_start();

	if($_SESSION["login"] == "" && $_SESSION["senha"] == ""){
		//usuario não está logado
			header("Location: login.php?error=3");
	}
    

	
 ?>