// JavaScript Document
<script>
$(document).ready(function(){
$("#linkajax").click(function(evento){
evento.preventDefault();
$("#carregando").css("display", "inline");
$("#destino").css("display", "none");
$("#destino").load("processa.php", function(){
$("#carregando").css("display", "none");
$("#destino").css("display", "inline");
});
});
})
function acert(valor){
	window.confirm(valor);
}
</script>