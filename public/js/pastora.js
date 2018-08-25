$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function actionInForm(disabled)
{
	$('input, textarea, select, button, a').each(function ()  {
		$(this).attr('disabled', disabled);
	});
}

function blockForm()
{
	actionInForm(true);
	clearValidationInfo();
}

function unblockForm()
{
	actionInForm(false);
}

function displayMultipleFormErrors(errorBag)
{
	$.each(errorBag, function (key, value) {
		$('.val-' + key).addClass('is-invalid');
		$('.span-' + key).html(value);
	});
}

function clearValidationInfo()
{
	$('input, textarea, select').each(function () {
		$(this).removeClass('is-invalid');
	});

	$('form span').html('');
}