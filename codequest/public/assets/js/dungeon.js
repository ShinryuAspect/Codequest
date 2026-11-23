async function lanzarHechizo() {
	const editor = document.getElementById('codeEditor');
	const output = document.getElementById('output');

	if (!editor.value.trim()) {
		output.innerHTML =
			"<p style='color: orange;'>Escribe un hechizo antes de lanzar.</p>";
		return;
	}

	output.innerHTML = 'Consultando el Oráculo...';

	try {
		const response = await fetch('../game/sql_dungeon/engine.php', {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			body: 'query=' + encodeURIComponent(editor.value),
		});

		if (!response.ok) throw new Error('Error en la conexión');

		const data = await response.text();
		output.innerHTML = data;
	} catch (error) {
		output.innerHTML = `<p class='error'>Error mágico: ${error.message}</p>`;
	}
}
