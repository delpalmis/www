<?php 
include('includes/config.php'); 
include('restrito.php');
	$datass = fetch(query('SELECT * FROM vote_contar WHERE login = "'.$_SESSION['login'].'" AND banner_id = 1'));
	$time = rand(15, 30);
	$mudar = htmlspecialchars($_GET['change']);
	if(isset($mudar)){
		unset($_SESSION['charid']);
	}
	$sql = query('SELECT * FROM characters WHERE account_name = "'.$_SESSION['login'].'"');
	if(isset($_GET['charid'])){
		$char = htmlspecialchars($_GET['charid']);
		$row = rows(query('SELECT * FROM characters WHERE account_name = "'.$_SESSION['login'].'" AND charId = '.$char));
		if($row == 0){
		echo('<script>window.alert("Tentativa de Invasão detectada! Deslogando você para nossa segurança"); window.location="index.php";</script>');
		session_destroy();
		exit();
		}
		else{
			$_SESSION['charid'] = $_GET['charid'];
		}
	}
	
	
if(isset($_GET['link'])){
	$rand = rand(0000000,9999999); 
	$rewrite = base64_decode($_GET['link']);
	$b_id = fetch(query('SELECT * FROM vote_config WHERE link_vote = "'.$rewrite.'" LIMIT 1'));
	$ip = $_SERVER['REMOTE_ADDR'];
	$a_data = date('d/m/Y');
	$conta = rows(query('SELECT * FROM vote_contar WHERE login = "'.$_SESSION['login'].'" AND banner_id = "'.$b_id['id'].'"'));
	$v_ip = rows(query('SELECT * FROM vote_contar WHERE ip = "'.$ip.'" AND banner_id = '.$b_id['id'].' AND data = "'.$a_data.'" ORDER BY data DESC LIMIT 1'));
	$data_old = fetch(query('SELECT * FROM vote_contar WHERE login = "'.$_SESSION['login'].'" AND banner_id = '.$b_id['id'].' ORDER BY data DESC LIMIT 1'));
	$c_data = $data_old['data'];
		if($a_data == $c_data){
			msg('Error! Você já Votou Hoje.', 'votar.php?charid='.$_SESSION['charid']);
			exit();
			if($conta != 0){
				msg('Error! Está conta já votou hoje.', 'votar.php?charid='.$_SESSION['charid']);
				exit();
			}
		}
		elseif($v_ip == 1){
			msg('Error! Você não pode votar com mesmo endereço de IP!', 'votar.php?charid='.$_SESSION['charid']);
			exit();
		}
		else{
			header('Refresh:'.$time.'; votar.php?charid='.$_SESSION['charid'].'&votou='.$rand);
			mysql_query('INSERT INTO vote_contar(login, ip, data, banner_id, chars) VALUES("'.$_SESSION['login'].'", "'.$ip.'", "'.date('d/m/Y').'", '.$b_id['id'].', "'.$_GET['charid'].'")');
			$obj = fetch(query('SELECT * FROM items ORDER BY object_id DESC LIMIT 1'));
			$obj_id = $obj['object_id'] + 1;
			$p_item = query('SELECT * FROM items WHERE owner_id = '.$_SESSION['charid'].' AND item_id = '.$item.' LIMIT 1');
			$pr_item = rows($p_item);
			if($pr_item == 0){
				mysql_query('INSERT INTO items(owner_id, object_id, item_id, count, enchant_level, loc, loc_data) VALUES('.$_SESSION['charid'].', '.$obj_id.', '.$item.', '.$quantidade.', 0, "WAREHOUSE", 0)');
			}
			else{
				$qnt = fetch($p_item);
				$total = $qnt['count'] + $quantidade;
				mysql_query('UPDATE items SET count = '.$total.' WHERE item_id = '.$item.' LIMIT 1');
			}
		}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="includes/estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="includes/js/jquery-1.3.2.min.js"> </script>
<title><?php echo titulo ?></title>
</head>

<body>
<div class="all">
      <div class="center"><div class="central"><table width="789" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td background="images/bgmain.png" style="background-repeat:no-repeat;" width="789" height="358" align="center" class="central">
            <img src="images/logo.png" width="435" height="210" />
<table width="435" border="0" cellpadding="0" cellspacing="0" class="default">
          <tr>
                <td colspan="2" align="left" valign="middle" style="padding:3px;">Voc&ecirc; est&aacute; logado como: <span style="text-transform:uppercase;"><a href="#"><?php echo $_SESSION['login'] ?></a></span></td>
            </tr>
              <tr>
                <td colspan="2" align="center" valign="middle" style="padding:3px; float:"><?php if(!isset($_SESSION['charid'])){ ?><span style="font-weight:normal;">Selecione um Char Primeiro:</span><br />
<?php while( $res = fetch($sql)){ ?>
                  <div align="center" class="chars"><a href="?charid=<?php echo $res['charId'] ?>"><?php echo $res['char_name'] ?></a></div>
                <?php }}else{ $chars = fetch(query('SELECT * FROM characters WHERE charId = '.$_SESSION['charid'])); ?>Char Selecionado: <span style="text-transform:uppercase"><a href="#"><?php echo $chars['char_name'] ?></a></span><br /> 
                | <a href="votar.php">Votar</a> | <a href="votar.php?change=true" title="Trocar de Char">Mudar Char</a> | <?php if($_SESSION['level'] >= 127){ ?><a href="admin/admin.php">Admin</a> |<?php } ?> <a href="logout.php">Sair</a> |                <?php } ?></td>
            </tr>
              <tr>
                <td colspan="2" align="center" valign="middle" style="padding:3px;"><?php $vote = query('SELECT * FROM vote_config'); if(isset($char)){ while( $img = fetch($vote)){ ?>Votar em <?php echo $img['titulo'] ?><br /><a target="_blank" href="<?php echo $img['link_vote']; ?>" onclick="window.location='?charid=<?php echo $_SESSION['charid'] ?>&link=<?php echo base64_encode($img['link_vote']); ?>'"><img src="<?php echo $img['imagem'] ?>" border="0" /></a><br /><br /><?php if(isset($_GET['link'])){ ?><div id="carregando">
                  <div class="destino"><a href="<?php echo url ?>" target="_blank"><img src="images/logo_mini.png" width="162" height="47" border="0" align="absmiddle" style="padding-top:7px;" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/loading.gif" width="32" height="32" align="absmiddle"/> Validando<br />
Est&aacute; a&ccedil;&atilde;o pode demorar de 15 a 30 segundos!<br /><span style="color:red;">Atenção</span>: Desative seu  bloqueador de pop-up ou coloque nosso site na lista de remetentes confiaveis.
</div></div><?php }}} ?></td>
              </tr>
              <tr>
                <td colspan="2" align="left" valign="middle" style="padding:3px;"><span style="color:red;">Aten&ccedil;&atilde;o:</span> Este sistema est&aacute; protegido, qualquer tentativa de burlar o sistema, poder&aacute; resultar em banimento de sua conta.</td>
              </tr>
            </table>
         </td>
        </tr>
        <tr>
          <td height="23" align="right" valign="middle" style="padding:3px; color:#333;">Todos os direitos Reservados &copy; L2 <a href="<?php echo url ?>" target="_blank" class="none">Raptors.com</a>| System Reward Powered by <a href="http://www.monsterz.com.br" target="_blank" class="none">Palmi&eacute;ri Andrioli Hell</a></td>
        </tr>
      </table>
      </div></div>
</div><?php if(isset($_GET['votou'])){ ?> <div class="menu"><a href="<?php echo url ?>" target="_blank"><img src="images/logo_mini.png" width="162" height="47" border="0" align="absmiddle" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/tickmark.png" width="33" height="25" align="absmiddle"/> Voto V&aacute;lidado com Sucesso! Foi adicionado <?php echo $i_name ?> para o Char Selecionado. Verifique na sua WareHouse ou no seu Invent&oacute;rio<br />
</div><?php } ?>
</body>
</html>