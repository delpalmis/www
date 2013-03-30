<?php
	include('../includes/config.php'); 
	include('restrito.php');
	$sql = query('SELECT * FROM vote_config ORDER BY data DESC');
	if(isset($_GET['delid'])){
		$id = $_GET['delid'];
		query('DELETE FROM vote_config WHERE id = '.$id);
		msg('Vote excluído com Sucesso', 'delvote.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../includes/estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../includes/js/jquery-1.3.2.min.js"> </script>
<title><?php echo titulo ?></title>
</head>
<style>
.bor{ border-collapse:collapse; }
.bor tr th{ border:1px #CCC solid; }
</style>
<body>
<div class="all">
      <div class="center"><div class="central"><table width="789" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="789" height="358" align="center" class="central" background="../images/bgmain.png" style="background-repeat:no-repeat;">
            <img src="../images/logo.png" width="435" height="210" />
<table width="435" border="0" cellpadding="0" cellspacing="0" class="default">
          <tr>
                <td colspan="2" align="left" valign="middle" style="padding:3px;">Voc&ecirc; est&aacute; logado como: <span style="text-transform:uppercase;"><a href="#"><?php echo $_SESSION['login'] ?></a></span></td>
            </tr>
              <tr>
                <td colspan="2" align="center" valign="middle" style="padding:3px; float:">                | <a href="../home.php">In&iacute;cio</a> | <a href="addvote.php">Adicionar Vote</a> |<a href="delvote.php"> Excluir Vote</a> | <a href="../logout.php">Sair</a> |</td>
            </tr>
              <tr>
                <td colspan="2" align="center" valign="middle" style="padding:3px;"><br />
                  <table width="420" border="0" cellpadding="0" cellspacing="0" class="bor">
                  <tr>
                    <th width="139" scope="col">T&iacute;tulo</th>
                    <th width="222" scope="col">Imagem/Link</th>
                    <th width="59" scope="col">Exclu&iacute;r</th>
                  </tr>
                  <?php while( $res = fetch($sql)){ ?>
                  <tr>
                    <th align="center" valign="middle" scope="col"><?php echo $res['titulo'] ?></th>
                    <th align="center" valign="middle" scope="col"><img src="<?php echo $res['imagem'] ?>" border="0" /><br /><a href="<?php echo $res['link_vote'] ?>"><?php echo $res['link_vote'] ?></a></th>
                    <th align="center" valign="middle" scope="col"><a href="?delid=<?php echo $res['id'] ?>">Sim</a> / <a href="admin.php">N&atilde;o</a></th>
                  </tr>
                  <?php } ?>
                </table></td>
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