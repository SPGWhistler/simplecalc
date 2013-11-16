/*global $ */
$(document).ready(function () {
	document.body.addEventListener('touchstart', function (e) { e.preventDefault(); });
	var height = $(window).height();
	$('.btn, #display').css('height', (height / 5) + 'px');
	$('#clear').on('vclick', function () {
		$('#display').val('');
		$('.number').removeClass('disabled');
	});
	$('.number').on('vclick', function () {
		var number = $(this).text();
		$('#display').val(function (i, value) {
			var out = value;
			if (number !== '.' || value.indexOf('.') === -1) {
				if (value === '' && number === '.') {
					value = '0';
				}
				out = value + String(number);
			}
			if (out.search(/^\d*\.\d{2}$/) !== -1) {
				$('.number').addClass('disabled');
			}
			return out;
		});
	});
});
