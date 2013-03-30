<?php
							//###### Script Desenvolvido por Palmieri Andrioli Hell ######//
								//###### Exclusivo para Servidores de L2J ######//
								//###### Quer ter o Seu Personalizado? ######//
								//###### Contato: suporte@monsterz.com.br ######//
//###### Desenvolvido exclusivamente para a Galera de L2JBrasil, qualquer cópia com a retirada dos Créditos pode resultar em Prisão prevista em lei por Plágio. ######//

	function query($sql){
		return @mysql_query($sql);
	}
	function fetch($query){
		return @mysql_fetch_array($query);
	}
	function rows($linhas){
		return @mysql_num_rows($linhas);
	}
	function pass_cod($pass){
		return base64_encode(pack('H*', sha1(utf8_encode($pass))));
	}
	function msg($value, $value1){
		echo('<script>window.alert("'.$value.'"); window.location="'.$value1.'";</script>');
	}
	define('titulo', $sitename);
	define('url', $siteurl);
	define('host', $host);
	define('db', $data);
	define('user', $user);
	define('pass', $senha);
	define('port', $porta);
	$connect = mysql_connect(host.':'.port, user, pass);
	mysql_select_db(db, $connect);
?>