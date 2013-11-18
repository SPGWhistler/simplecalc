/*global $, alert */
$(document).ready(function () {
	var height, html5audio, sourceel;
	document.body.addEventListener('touchstart', function (e) { e.preventDefault(); });
	height = $(window).height();
	$('#clear, #save, .number, #display').css('height', (height / 5) + 'px');
	$('#clear').on('vclick', function () {
		//html5audio.playclip();
		$('#display').val('');
		$('.number').removeClass('disabled');
		$('#save').addClass('disabled');
	});
	$('.number').on('vclick', function () {
		var number = $(this).text();
		$('#display').val(function (i, value) {
			//html5audio.playclip();
			var out = value;
			if (number !== '.' || value.indexOf('.') === -1) {
				if (value === '' && number === '.') {
					value = '0';
				}
				if (number === '.') {
					$('#point').addClass('disabled');
				}
				out = value + String(number);
			}
			if (out.indexOf('-') === -1) {
				out = '-' + out;
			}
			if (out.search(/^-\d*\.\d{2}$/) !== -1) {
				$('.number').addClass('disabled');
			}
			if (parseFloat(out) < 0) {
				$('#save').removeClass('disabled');
			}
			return out;
		});
	});
	html5audio = document.createElement('audio');
	sourceel = document.createElement('source');
	sourceel.setAttribute('src', 'click.mp3');
	sourceel.setAttribute('type', 'audio/mpeg');
	html5audio.appendChild(sourceel);
	html5audio.load();
	html5audio.playclip = function () {
		html5audio.pause();
		html5audio.currentTime = 0;
		html5audio.play();
	};
	$.getJSON('api.php', {
		'action' : 'getbalance',
		'account_name' : 'checking_bill'
	}, function (data) {
		if (!data.error) {
			$('#display').attr('placeholder', data.balance);
		}
	});
	$('#save').on('vclick', function () {
		console.log('saving');
		$.getJSON('api.php', {
			'action' : 'addtransaction',
			'account_name' : 'checking_bill',
			'amount' : $('#display').val()
		}, function (data) {
			console.log(data);
			if (!data.error) {
				$('#display').attr('placeholder', data.balance).val('');
				$('.number').removeClass('disabled');
				$('#save').addClass('disabled');
			} else {
				alert('Error saving transaction');
			}
		});
	});
	$(document).on('swiperight', function () {
		$("#panel").panel("open");
	});
});
