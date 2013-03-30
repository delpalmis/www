<?php
	include('../includes/config.php'); 
	include('restrito.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../includes/estilos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../includes/js/jquery-1.3.2.min.js"> </script>
<title><?php echo titulo ?></title>
</head>
<style type="text/css">
table tr th{
	padding:3px;
}
.central{background:url(../images/bgmain1.png) repeat-y bottom;}
</style>
<body>
<div class="all">
      <div class="center"><div class="central"><table width="789" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
         <td background="../images/bgmain.png" style="background-repeat:no-repeat;" width="789" height="358" align="center">
            <img src="../images/logo.png" width="435" height="210" />
<table width="435" border="0" cellpadding="0" cellspacing="0" class="default">
          <tr>
                <td colspan="2" align="left" valign="middle" style="padding:3px;">Voc&ecirc; est&aacute; logado como: <span style="text-transform:uppercase;"><a href="#"><?php echo $_SESSION['login'] ?></a></span></td>
            </tr>
              <tr>
                <td colspan="2" align="center" valign="middle" style="padding:3px; float:">                | <a href="../home.php">In&iacute;cio</a> | <a href="addvote.php">Adicionar Vote</a> |<a href="delvote.php"> Excluir Vote</a> | <a href="../logout.php">Sair</a> |</td>
            </tr>
              <tr>
                <td colspan="2" align="center" valign="middle" style="padding:3px;"><form id="form1" name="form1" method="post" action=""><?php
		if(isset($_POST['enviar'])){
			$titulo = $_POST['titulo'];
			$image = $_POST['imagem'];
			$link = $_POST['link'];
			
			if(empty($titulo) || empty($image) || empty($link)){
				msg('Alguns campos ficaram vazios, volte e preencha-os', 'addvote.php');
				exit();
			}
			else{
				query('INSERT INTO vote_config(titulo, imagem, link_vote) VALUES("'.$titulo.'", "'.$image.'", "'.$link.'")');
				msg('Dados Inseridos com Sucesso!', 'addvote.php');
				exit();
			}
		}
	?>
                  <table width="363" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <th width="77" align="right" scope="col">T&iacute;tulo:</th>
                      <th width="286" align="left" scope="col"><label>
                        <input name="titulo" type="text" id="titulo" value="Título do Site do Vote" onfocus="if(this.value == 'Título do Site do Vote'){this.value = '';}" onblur="if(this.value == ''){ this.value = 'Título do Site do Vote';}" size="45" />
                      </label></th>
                    </tr>
                    <tr>
                      <th align="right" scope="col">Imagem:</th>
                      <th align="left" scope="col"><label>
                        <input name="imagem" type="text" id="imagem" size="45" value="http://www.seusite.com/imagem/logo.png" onfocus="if(this.value == 'http://www.seusite.com/imagem/logo.png'){this.value = '';}" onblur="if(this.value == ''){ this.value = 'http://www.seusite.com/imagem/logo.png';}" />
                      </label></th>
                    </tr>
                    <tr>
                      <th align="right" scope="col">Link:</th>
                      <th align="left" scope="col"><label>
                        <input name="link" type="text" id="link" value="http://www.sitedovote.com/refid=suaref" onfocus="if(this.value == 'http://www.sitedovote.com/refid=suaref'){this.value = '';}" onblur="if(this.value == ''){ this.value = 'http://www.sitedovote.com/refid=suaref';}" size="45" />
                      </label></th>
                    </tr>
                    <tr>
                      <th colspan="2" align="center" scope="col"><label>
                        <input type="submit" name="enviar" id="enviar" value="Adicionar" />
                        <input type="reset" name="limpar" id="limpar" value="Limpar" />
                      </label></th>
                    </tr>
                  </table>
                </form></td>
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