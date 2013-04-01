<?php
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