$('document').ready(function () {
	$('form').on('submit', function (e) {
		e.preventDefault();

		$.ajax({
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			url: $(this).attr('action'),
			beforeSend: function () {
				blockForm();

				$('.btn-send').html('Cargando...');
			},
			error: function (jqXHR) {
				unblockForm();
				$('.btn-send').html('Enviar');

				if (jqXHR.status == 422) {
					displayMultipleFormErrors(jqXHR.responseJSON.errors);
				}
			},
			success: function (response) {
				unblockForm();
				$('.btn-send').html('Enviar');
			}
		});
	});
});