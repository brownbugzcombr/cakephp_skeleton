$(document).ready(function() {
	var validator = $("#busca").validate({
		rules: {
			'data[Post][busca]': {
				required: true
			}
		},
		messages: {
			'data[Post][busca]': ""
		},
		errorClass: "invalid"
	});

});

