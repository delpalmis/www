<?php
function tmp_not_open($page){
	if(eregi($page, $_SERVER['SCRIPT_NAME'])){
		die("<script>window.alert('Você não tem permissão para acessar essa página!'</script>");
	}
}
tmp_not_open("tmp_functions.php");
?>