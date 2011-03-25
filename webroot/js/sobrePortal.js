$(document).ready(function() {
		$('.perguntas-frequentes ul').find("p:first").show();
		$('.perguntas-frequentes ul li:first').addClass("aberta");
		$('.perguntas-frequentes h2').click(function() {
		$(this).next('p').slideToggle('fast');
		$(this).parent().toggleClass("aberta");
		return false;
	});
});