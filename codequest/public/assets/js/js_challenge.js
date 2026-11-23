let completado = false;

function ejecutarLogica() {
	if (completado) return;

	const code = document.getElementById('jsEditor').value;
	const output = document.getElementById('output');
	const digit = document.getElementById('digit');

	try {
		eval(code);

		if (
			typeof fuerza !== 'undefined' &&
			typeof magia !== 'undefined' &&
			typeof codigoFinal !== 'undefined'
		) {
			digit.innerText = codigoFinal;

			if (fuerza === 10 && magia === 20 && codigoFinal === 30) {
				ganar(output);
			} else {
				output.innerHTML =
					"<p class='error-msg'>Las variables existen, pero la suma o los valores son incorrectos.</p>";
			}
		} else {
			output.innerHTML =
				"<p class='error-msg'>Asegúrate de declarar: var fuerza, var magia y var codigoFinal.</p>";
		}
	} catch (e) {
		output.innerHTML = `<p class='error-msg'>Error de Sintaxis: ${e.message}</p>`;
	}
}

function ganar(output) {
	completado = true;
	output.innerHTML =
		"<h4 style='color: #00ff00;'>¡CLACK! La cerradura se abre.</h4><p>+50 XP para SirLink.</p>";
	document.getElementById('lock-display').style.borderColor = '#00ff00';
	document.getElementById('lock-display').style.boxShadow =
		'0 0 20px #00ff00';

	finalizarNivel(50);
}

async function finalizarNivel(xp) {
	await fetch('../api/game_handler.php?action=add_xp', {
		method: 'POST',
		headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
		body: `xp=${xp}`,
	});
}
