<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if(empty($_SESSION['login'])){
		echo('<script>window.alert("Usu�rios e/ou Senha Inv�lidos."); window.location="../index.php";</script>');
		session_destroy();
		exit();
	}
	if(!isset($_SESSION['login'])){
		echo('<script>window.alert("Usu�rios e/ou Senha Inv�lidos."); window.location="../index.php";</script>');
		session_destroy();
		exit();
	}
	if($_SESSION['level'] < 7){
		echo('<script>window.alert("Voc� n�o tem permiss�o para acessar essa p�gina."); window.location="../index.php";</script>');
		session_destroy();
		exit();
	}
		if(empty($_SESSION['level'])){
		echo('<script>window.alert("Voc� n�o tem permiss�o para acessar essa p�gina."); window.location="../index.php";</script>');
		session_destroy();
		exit();
	}
	if(!isset($_SESSION['level'])){
		echo('<script>window.alert("Voc� n�o tem permiss�o para acessar essa p�gina."); window.location="../index.php";</script>');
		session_destroy();
		exit();
	}
?>