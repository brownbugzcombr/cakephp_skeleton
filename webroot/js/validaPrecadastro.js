$(document).ready(function() {
	var validator = $(".precadastro").validate({
		rules: {
			'data[Importado][ddd]': {
				required: true,
				minlength: 2,
				maxlength: 2,
				digits: true
			},
			'data[Importado][nu_telefone]': {
				required: true,
				minlength: 8,
				maxlength: 8,
				digits: true
			}
		},
		messages: {
			'data[Importado][ddd]': "",
			'data[Importado][nu_telefone]': "",
			'data[Importado][nu_documento]': ""
		},
		errorContainer: "#messageBox2",
		errorClass: "invalid"
	});

});