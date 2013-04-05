// JavaScript Document
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
	$(document).ready(function(){
 
    $('input[type=text]').focus(function() {
        if($(this).val() == 'Usuário...') $(this).val(''); $(this).addClass('textform1');
    }).blur(function() {
        if( $(this).val() == '') $(this).val('Usuário...'); $(this).removeClass('textform1');
    });
});
	$(document).ready(function(){
 
    $('input[type=password]').focus(function() {
        if($(this).val() == 'Senha...') $(this).val(''); $(this).addClass('textform1');
    }).blur(function() {
        if( $(this).val() == '') $(this).val('Senha...'); $(this).removeClass('textform1');
    });
});