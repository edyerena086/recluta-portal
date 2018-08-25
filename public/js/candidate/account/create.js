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
			},
			error: function (jqXHR) {
				unblockForm();

				if (jqXHR.status == 422) {
					displayMultipleFormErrors(jqXHR.responseJSON.errors);
				}
			},
			success: function (response) {
				unblockForm();
			}
		});
	});
});