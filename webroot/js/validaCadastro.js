$().ready(function() {
	$(".validacadastro").validate({
		rules: {
			'data[Usuario][ddd]': {
				required: true,
				minlength: 2,
				digits: true
			},
			'data[Usuario][telefone]': {
				required: true,
				minlength: 8,
				digits: true
			},
			'data[Usuario][nu_documento]': {
				required: true,
				digits: true
			},
			'data[Usuario][razaosocial]': {
				required: true,
				minlength: 2
			},
			'data[Usuario][nome]': {
				required: true,
				minlength: 2
			},
			'data[Usuario][responsavel]': {
				required: true,
				minlength: 2
			},
			'data[Usuario][sexo]': {
				required: true
			},
			'data[Usuario][cargo]': {
				required: true,
				minlength: 2
			},
			'data[Usuario][funcionarios]': {
				required: true
			},
			'data[Usuario][atividade]': {
				required: true
			},
			'data[Usuario][tipo]': {
				required: true
			},
			'data[Usuario][detalhe]': {
				required: true
			},
			'data[Usuario][idade]': {
				required: true
			},
			'data[Usuario][email]': {
				required: true,
				email: true
			},
			'data[Usuario][senha]': {
				required: true
			},
			'data[Usuario][senha2]': {
				required: true
			},
			'data[Usuario][sobre]': {
				maxlength: 500
			},
			'data[Usuario][aceito]': {
				required: true
			},
			'data[Usuario][ramo]': {
				required: true
			},
			'data[Usuario][outroddd]': {
				digits: true
			},
			'data[Usuario][outrotelefone]': {
				digits: true
			},
			'data[Usuario][celddd]': {
				digits: true
			},
			'data[Usuario][celtelefone]': {
				digits: true
			},
			'data[Usuario][contato]': {
				required: true
			}
		},
		messages: {
			'data[Usuario][ddd]': "",
			'data[Usuario][telefone]': "",
			'data[Usuario][nu_documento]': "",
			'data[Usuario][razaosocial]': "",
			'data[Usuario][nome]': "",
			'data[Usuario][responsavel]': "",
			'data[Usuario][sexo]': "",
			'data[Usuario][cargo]': "",
			'data[Usuario][funcionarios]': "",
			'data[Usuario][atividade]': "",
			'data[Usuario][tipo]': "",
			'data[Usuario][detalhe]': "",
			'data[Usuario][idade]': "",
			'data[Usuario][email]': "",
			'data[Usuario][senha]': "",
			'data[Usuario][senha2]': "",
			'data[Usuario][sobre]': "",
			'data[Usuario][aceito]': "",
			'data[Usuario][ramo]': "",
			'data[Usuario][outroddd]': "",
			'data[Usuario][outrotelefone]': "",
			'data[Usuario][celddd]': "",
			'data[Usuario][celtelefone]': "",
			'data[Usuario][contato]': ""
		},
		errorContainer: "#messageBox2",
		errorClass: "invalid"
	});
	//debug:true
});