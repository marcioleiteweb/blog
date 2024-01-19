<?php
	session_start();
	unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'],
		$_SESSION['usuarioNiveisAcessoId'] ,
		$_SESSION['usuarioEmail']
	);
	unset(
		$_SESSION['usuarioId_adv'],
		$_SESSION['usuarioNome_adv'],
		$_SESSION['usuarioNiveisAcessoId_adv'] ,
		$_SESSION['usuarioEmail_adv']
	);
	unset(
		$_SESSION['usuarioId_cli'],
		$_SESSION['usuarioNome_cli'],
		$_SESSION['usuarioNiveisAcessoId_cli'] ,
		$_SESSION['usuarioEmail_cli']
	);
	$_SESSION['loginDeslogado'] = "Deslogado com Sucesso";
	header("Location: index.php");
?>