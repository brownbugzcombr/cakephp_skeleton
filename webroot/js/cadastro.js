$(document).ready(function() {
	var validator = $("#cadastro").validate({
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
			sexo: {
				required: true
			},
			'data[Usuario][cargo]': {
				required: true,
				minlength: 2
			},
			'data[Usuarios][funcionarios]': {
				required: true
			},
			'data[Usuarios][atividade]': {
				required: true
			},
			'data[Usuarios][tipo]': {
				required: true
			},
			'data[Usuarios][detalhe]': {
				required: true
			},
			idade_empresa: {
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
				required: true,
				equalTo: "#UsuarioSenha"
			},
			li_aceito: {
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
			sexo: "",
			'data[Usuario][cargo]': "",
			'data[Usuarios][funcionarios]': "",
			'data[Usuarios][atividade]': "",
			'data[Usuarios][tipo]': "",
			'data[Usuarios][detalhe]': "",
			idade_empresa: "",
			'data[Usuario][email]': "",
			'data[Usuario][senha]': "",
			'data[Usuario][senha2]': "",
			li_aceito: ""

		},
		errorClass: "invalid"
	});
	debug:true
});