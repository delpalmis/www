<?php
/* 
Theme Name: Theme Light
Theme URI: http://www.aionbrasil.net
Author: Palmieri Andrioli Hell
Author URI: http://www.aionbrasil.net
Description: Theme Developer by Palmieri Andrioli Andrioli Hell. All rights reserved.
Version: 1.5
*/

function tmp_not_open($page){
	if(eregi($_SERVER['PHP_SELF'])){
		die("<script>window.alert('Você não tem permissão para acessar essa página!'</script>");
	}
}
function tmp_get_pages($pagina){
	//empty
}
tmp_not_open("tmp-functions.php");
?>