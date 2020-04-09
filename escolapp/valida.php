<?php

session_start();

include("inc/conexao.php");

$login = $_POST["login"];
$senha = $_POST["senha"];

$txt = "select * from usuarios where login='$login'";

$sql = mysqli_query($conn, $txt);

if(mysqli_num_rows($sql) > 0){
	//usuario encontrado

		$dados = mysqli_fetch_object($sql);
		
			if($senha == $dados->senha){
				//achei a senha
				
				$_SESSION["nome"] = $dados->nome;
				$_SESSION["login"] = $dados->login;
				$_SESSION["senha"] = $dados->senha;

				header("Location: agenda-aulas.php");

			} else {
				//senha inválida

				header("Location: index.php?erro=2");

			}


} else {
	//usuario não encontrado

	header("Location: index.php?erro=1");

}
	
?>