$(document).ready(function() {
	
	function trocaSecao(secao){
		$('.perfil-empresa-menu').find('li').removeClass('active');		
		$(secao).addClass('active');		
		$('#content-min').find('div#perfil-empresa').hide();		
		$('.'+$(secao).attr('id')).show();
	}
		
	var formAlterado = false;
	
	$('.perfil-empresa-menu li').bind('click',function(){		
		if(formAlterado == false){
			trocaSecao(this);
		} else {
			if(confirm('Suas alterações serão perdidas, deseja continuar?')){					
				trocaSecao(this);
				formAlterado = false;
			}
		}
	});

    $('#content-min input, #content-min textarea, #content-min select').bind('change', function(event) {        
        if (!formAlterado) {
        	formAlterado = true;            
        }
    });
    
    
    
    
    
    var ramo = '#ramo_atividade';
	var tipo = '#ramo_tipo';
	var detalhe = '#ramo_detalhe';

	if(typeof valorBanco != 'boolean'){
		valorBanco = false;
	}
	
	if(valorBanco == false){			
		$(ramo).attr('disabled', 'disabled');
		$(tipo).attr('disabled', 'disabled');
		$(detalhe).attr('disabled', 'disabled');
	
	
//		$.getJSON("/usuarios/getJsonRamoAtividade", {}, function(data)
//		{
//			if (data.length) {
//				$(ramo).append('<option value="">Selecione</option>');
//				$.each (data, function(i, data) {
//					$(ramo).append('<option value="'+data.id+'">'+data.desc+'</option>');
//				});
				$(ramo).removeAttr('disabled');
//			}
//		});
		
	}
	
	$(ramo).bind('change', function(event)
	{
		$(tipo+" option").remove();
		$(detalhe+" option").remove();
		$(tipo).attr('disabled', 'disabled');
		$(detalhe).attr('disabled', 'disabled');

		if ($(this).val()) {
			$.getJSON("/usuarios/getJsonRamoTipo/"+$(this).val(), {}, function(data){
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
			$.getJSON("/usuarios/getJsonRamoDetalhe/"+$(this).val(), {}, function(data){
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