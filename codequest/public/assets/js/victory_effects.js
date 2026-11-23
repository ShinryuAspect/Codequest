(function () {
	const lootContainer = document.getElementById('loot-container');

	if (lootContainer) {
		console.log('¡Loot reclamado con éxito!');
		lootContainer.classList.add('pulse-effect');
	}
})();
