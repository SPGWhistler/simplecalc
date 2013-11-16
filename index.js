/*global $ */
$(document).ready(function () {
	var height, html5audio, sourceel;
	document.body.addEventListener('touchstart', function (e) { e.preventDefault(); });
	height = $(window).height();
	$('.btn, #display').css('height', (height / 5) + 'px');
	$('#clear').on('vclick', function () {
		//html5audio.playclip();
		$('#display').val('');
		$('.number').removeClass('disabled');
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
				out = value + String(number);
			}
			if (out.search(/^\d*\.\d{2}$/) !== -1) {
				$('.number').addClass('disabled');
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
});
