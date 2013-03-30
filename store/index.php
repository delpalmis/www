<?php include('includes/config.php'); 
	if(isset($_POST['enviar'])){
		$login = $_POST['login'];
		$senha  = $_POST['pass'];
		$pass = pass_cod($senha);
		
		$sql = query('SELECT * FROM accounts WHERE login = "'.$login.'" AND password = "'.$pass.'" LIMIT 1');
		$row = rows($sql);
		if($row != 1){
			echo('<script>window.alert("Usuários e/ou Senha Inválidos."); window.location="index.php";</script>');
			exit();
		}
		else{
			$res = fetch($sql);
			if(!isset($_SESSION)){
				session_start();
				$_SESSION['login'] = $res['login'];
				$_SESSION['level'] = $res['accessLevel'];
				header('Location: home.php');
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="includes/estilos.css" rel="stylesheet" type="text/css" />
<title><?php echo titulo ?></title>
</head>

<body>
<div class="all">
      <div class="center"><table width="789" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="789" height="358" align="center" class="central" background="images/bgmain.png"><form id="form1" name="form1" method="post" action="">
            <img src="images/logo.png" width="435" height="210" />
            <table width="435" border="0" cellpadding="0" cellspacing="0" class="default">
              <tr>
                <td width="43%" align="right" valign="middle" style="padding:3px;">Login:</td>
                <td width="57%" align="left" valign="middle" style="padding:3px;"><label>
                  <input name="login" type="text" id="login" value="Nome de Usu&aacute;rio" onfocus="if(this.value == 'Nome de Usu&aacute;rio'){this.value = '';}" onblur="if(this.value == ''){ this.value = 'Nome de Usu&aacute;rio';}" maxlength="45" />
                </label></td>
              </tr>
              <tr>
                <td align="right" valign="middle" style="padding:3px;">Senha:</td>
                <td align="left" valign="middle" style="padding:3px;"><label>
                  <input name="pass" type="password" id="pass" value="Nome de Usu" onfocus="if(this.value == 'Nome de Usu'){this.value = '';}" onblur="if(this.value == ''){ this.value = 'Nome de Usu';}" maxlength="45" />
                </label></td>
              </tr>
              <tr>
                <td align="right" valign="middle">&nbsp;</td>
                <td align="left" valign="middle" style="padding:3px;"><label>
                  <input name="enviar" type="submit" class="btn" id="enviar" value=" " />
                </label></td>
              </tr>
            </table>
          </form></td>
        </tr>
        <tr>
          <td height="23" align="right" valign="middle" background="images/bgmain2.png" class="td_bot" style="padding:3px;">Todos os direitos Reservados &copy; L2 <a href="<?php echo url ?>" target="_blank" class="none">Valente.com.br</a>| System Reward Powered by <a href="http://www.monsterz.com.br" target="_blank" class="none">Palmi&eacute;ri Andrioli Hell</a></td>
        </tr>
      </table>
      </div>
</div>
</body>
</html>