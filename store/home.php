<?php 
include('includes/config.php'); 
include('restrito.php');
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
      <div class="center"><table width="789" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="789" height="358" align="center" class="central" background="images/bgmain.png">
            <img src="images/logo.png" width="435" height="210" />
<table width="435" border="0" cellpadding="0" cellspacing="0" class="default">
          <tr>
                <td colspan="2" align="left" valign="middle" style="padding:3px;">Voc&ecirc; est&aacute; logado como: <span style="text-transform:uppercase;"><a href="#"><?php echo $_SESSION['login'] ?></a></span></td>
            </tr>
              <tr>
                <td colspan="2" align="center" valign="middle" style="padding:3px; float:">                | <a href="votar.php">Votar</a> | <a href="votar.php?change=true" title="Trocar de Char">Mudar Char</a> | <?php if($_SESSION['level'] >= 7){ ?><a href="admin/admin.php">Admin</a> |<?php } ?> <a href="logout.php">Sair</a> |</td>
            </tr>
              <tr>
                <td colspan="2" align="left" valign="middle" style="padding:3px;"><span style="color:red;">Aten&ccedil;&atilde;o:</span> Este sistema est&aacute; protegido, qualquer tentativa de burlar o sistema, poder&aacute; resultar em banimento de sua conta.</td>
              </tr>
            </table>
         </td>
        </tr>
        <tr>
          <td height="23" align="right" valign="middle" background="images/bgmain2.png" class="td_bot" style="padding:3px;">Todos os direitos Reservados &copy; L2 <a href="<?php echo url ?>" target="_blank" class="none">Raptors.com</a>| System Reward Powered by <a href="http://www.monsterz.com.br" target="_blank" class="none">Palmi&eacute;ri Andrioli Hell</a></td>
        </tr>
      </table>
      </div>
</div>
</body>
</html>