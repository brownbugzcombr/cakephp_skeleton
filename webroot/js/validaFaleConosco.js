$(document).ready(function() {
	var validator = $(".validaContato").validate({
		rules: {
			'data[Contato][nome]': {
				required: true,
				minlength: 2
			},
			'data[Contato][email]': {
				required: true,
				email: true
			},
			'data[Contato][ddd]': {
				required: true,
				digits: true,
				minlength: 2
			},
			'data[Contato][ddd]': {
				required: true,
				digits: true,
				minlength: 2
			},
			'data[Contato][telefone]': {
				required: true,
				digits: true,
				minlength: 8
			},
			uf: {
				required: true
			},
			cidade: {
				required: true
			},
			motivo: {
				required: true
			},
			'data[Contato][assunto]': {
				required: true
			},
			'data[Contato][mensagem]': {
				required: true
			},
			'data[Contato][motivo]': {required: true},
			'data[Contato][cidade]': {required: true},
			'data[Contato][estado]': {required: true}
		},
		messages: {
			'data[Contato][nome]': "",
			'data[Contato][email]': "",
			'data[Contato][ddd]': "",
			'data[Contato][telefone]': "",
			'data[Contato][estado]': "",
			'data[Contato][cidade]': "",
			'data[Contato][motivo]': "",
			'data[Contato][assunto]': "",
			'data[Contato][mensagem]': ""
		},
		errorContainer: "#messageBox2",
		errorClass: "invalid"
	});

});