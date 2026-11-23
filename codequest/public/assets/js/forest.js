let nivelCompletado = false;

function aplicarEstilo() {
	if (nivelCompletado) return;

	const code = document.getElementById('cssEditor').value.toLowerCase();
	const cofre = document.getElementById('cofre');
	const output = document.getElementById('output');


	const cleanCode = code
		.replace('#cofre', '')
		.replace('{', '')
		.replace('}', '')
		.trim();
	cofre.style.cssText = cleanCode;


	const tieneColor =
		code.includes('saddlebrown') || code.includes('rgb(139, 69, 19)');
	const tieneAncho = code.includes('width: 100px');
	const tieneAlto = code.includes('height: 100px');
	const tieneBorde = code.includes('border:');

	if (tieneColor && tieneAncho && tieneAlto && tieneBorde) {
		ganarNivel(cofre, output);
	} else {
		output.innerHTML =
			"<p class='error-msg'>El cofre se materializa, pero algo no encaja. Revisa el color (saddlebrown) y las medidas (100px).</p>";
	}
}

function ganarNivel(cofre, output) {
	nivelCompletado = true;
	output.innerHTML =
		"<h4 style='color: gold;'>✨ ¡EL GLITCH HA SIDO CURADO!</h4><p>Has ganado 50 XP.</p>";

	cofre.innerHTML = '💰';
	cofre.style.fontSize = '50px';
	cofre.style.display = 'flex';
	cofre.style.alignItems = 'center';
	cofre.style.justifyContent = 'center';

	finalizarNivel(50);
}

async function finalizarNivel(xp) {
	try {
		const response = await fetch('../api/game_handler.php?action=add_xp', {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			body: `xp=${xp}`,
		});
		const data = await response.json();
		if (data.success) console.log('¡XP sincronizada!');
	} catch (error) {
		console.error('Error de conexión:', error);
	}
}
