<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if(empty($_SESSION['login'])){
		echo('<script>window.alert("Usu�rios e/ou Senha Inv�lidos."); window.location="index.php";</script>');
		session_destroy();
		exit();
	}
	if(!isset($_SESSION['login'])){
		echo('<script>window.alert("Usu�rios e/ou Senha Inv�lidos."); window.location="index.php";</script>');
		session_destroy();
		exit();
	}
?>