$.ajaxSetup({'beforeSend': function(xhr) {
	if (xhr.overrideMimeType) xhr.overrideMimeType("text/plain");
}});

$(function()
{
	var ramo = 'form#cadastro select#ramo-atividade';
	var tipo = 'form#cadastro select#tipo';
	var detalhe = 'form#cadastro select#detalhe';

	$(ramo).attr('disabled', 'disabled');
	$(tipo).attr('disabled', 'disabled');
	$(detalhe).attr('disabled', 'disabled');

	$.getJSON("http://www.suaempresanossonegocio.com.br/json.php?/ra/", {}, function(data)
	{
		if (data.length) {
			$.each (data, function(i, data) {
				$(ramo).append('<option value="'+data.id+'">'+data.desc+'</option>');
			});
			$(ramo).removeAttr('disabled');
		}
	});

	$(ramo).bind('change', function(event)
	{
		$(tipo+" option").remove();
		$(detalhe+" option").remove();
		$(tipo).attr('disabled', 'disabled');
		$(detalhe).attr('disabled', 'disabled');

		if ($(this).val()) {
			$.getJSON("http://www.suaempresanossonegocio.com.br/json.php?/rt/"+$(this).val()+"/", {}, function(data){
				if (data.length) {
					$(tipo).append('<option value="">Selecione</option>');

					$.each (data, function(i, data){
						$(tipo).append('<option value="'+data.id+'">'+data.desc+'</option>');
					});
					$(tipo).removeAttr('disabled');
				}
			});
		}
	});

	$(tipo).bind('change', function(event)
	{
		$(detalhe+" option").remove();
		$(detalhe).attr('disabled', 'disabled');

		if ($(this).val()) {
			$.getJSON("http://www.suaempresanossonegocio.com.br/json.php?/rd/"+$(this).val()+"/", {}, function(data){
				if (data.length) {
					$(detalhe).append('<option value="">Selecione</option>');

					$.each (data, function(i, data){
						$(detalhe).append('<option value="'+data.id+'">'+data.desc+'</option>');
					});
					$(detalhe).removeAttr('disabled');
				}
			});
		}
	});
});


<form enctype="form/data" method="post" action="/index.php?option=com_content&amp;view=article&amp;id=17&amp;Itemid=33" class="cmxform" id="cadastro">

<div class="empresa-destaque">
<label for="ramo_atividade"><span class="campo-txt1">Ramo de Atividade*</span>
    <select validate="required:true" title="Selecione!" name="ramo-atividade" id="ramo-atividade">
        <option selected="selected" value="">Selecione</option>
    <option value="1">AGRICULTURA E PECUARIA</option><option value="2">ALIMENTOS</option><option value="3">ANIMAIS</option><option value="4">ANIMAIS DOMESTICOS</option><option value="5">ARTE E CULTURA</option><option value="6">ASSESSORIAS, AUDITORIAS E CONSULTORIAS</option><option value="7">ASSOCIACAO</option><option value="8">AUTOMOVEIS</option><option value="9">BARES, COMIDAS E ENTRETENIMENTO</option><option value="10">BAZAR/MAGAZINE</option><option value="11">BEBIDAS</option><option value="12">BENS E INVESTIMENTOS</option><option value="13">BRINQUEDOS</option><option value="14">CASA E DECORACAO</option><option value="15">COMERCIO EXTERIOR</option><option value="16">COMUNICACAO E PROPAGANDA</option><option value="17">CONDOMINIOS</option><option value="18">CONSTRUCAO E REFORMA</option><option value="19">COOPERATIVA</option><option value="20">CURSOS E ENSINO COMPLEMENTAR</option><option value="21">DIVERSAO E LAZER</option><option value="22">ELETRODOMESTICOS</option><option value="23">ELETROELETRONICOS</option><option value="24">EMBALAGENS</option><option value="25">EMPREENDIMENTOS</option><option value="26">ENSINO SUPERIOR</option><option value="27">ENSINOS INFANTIL, FUNDAMENTAL E MEDIO</option><option value="28">ESCOLAS DIVERSAS</option><option value="29">ESOTERISMO</option><option value="30">ESPORTES</option><option value="31">EVENTOS E FESTAS</option><option value="32">FACHADAS</option><option value="33">GERAL</option><option value="34">GRAFICAS</option><option value="35">INDUSTRIA</option><option value="36">INDUSTRIA QUIMICA</option><option value="37">INFORMATICA E TELECOMUNICACAO</option><option value="38">INSTITUICAO</option><option value="39">INSTITUICOES FINANCEIRAS</option><option value="40">MEIO AMBIENTE</option><option value="41">MODA E TEXTIL</option><option value="42">MOTORES</option><option value="43">ORGAOS PUBLICOS</option><option value="44">OUTROS</option><option value="45">PREVIDENCIA E SEGUROS</option><option value="46">RESTAURANTE</option><option value="47">SAUDE</option><option value="48">SAUDE ANIMAL</option><option value="49">SAUDE E BEM-ESTAR</option><option value="50">SAUDE, ESTETICA E BELEZA</option><option value="51">SEGURANCA EQUIP E SISTEMAS</option><option value="52">SERVICOS ADMINISTRATIVOS</option><option value="53">SERVICOS DE INFORMATICA</option><option value="54">SERVICOS DE SEGURANCA</option><option value="55">SERVICOS DOMESTICOS E DE LIMPEZA</option><option value="56">TABACO</option><option value="57">TACOGRAFO</option><option value="58">TELECOMUNICACOES</option><option value="59">TRANSPORTE</option><option value="60">TURISMO</option></select>
</label>
<label for="tipo"><span class="campo-txt1">Tipo*</span>
    <select validate="required:true" title="Selecione!" name="tipo" id="tipo" disabled="">
    	<option value=""></option>
    </select>
</label>
<label for="detalhe"><span class="campo-txt1">Detalhe*</span>
    <select validate="required:true" title="Selecione!" name="detalhe" id="detalhe" disabled="">
    	<option value=""></option>
    </select>
</label>
</div>
</form>