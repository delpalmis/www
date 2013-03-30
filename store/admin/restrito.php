<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if(empty($_SESSION['login'])){
		echo('<script>window.alert("Usuários e/ou Senha Inválidos."); window.location="../index.php";</script>');
		session_destroy();
		exit();
	}
	if(!isset($_SESSION['login'])){
		echo('<script>window.alert("Usuários e/ou Senha Inválidos."); window.location="../index.php";</script>');
		session_destroy();
		exit();
	}
	if($_SESSION['level'] < 7){
		echo('<script>window.alert("Você não tem permissão para acessar essa página."); window.location="../index.php";</script>');
		session_destroy();
		exit();
	}
		if(empty($_SESSION['level'])){
		echo('<script>window.alert("Você não tem permissão para acessar essa página."); window.location="../index.php";</script>');
		session_destroy();
		exit();
	}
	if(!isset($_SESSION['level'])){
		echo('<script>window.alert("Você não tem permissão para acessar essa página."); window.location="../index.php";</script>');
		session_destroy();
		exit();
	}
?>