let bossHP = 100;
let batallaFinalizada = false;

const challenges = [
	{
		q: '¿Qué propiedad CSS centra un flex-item verticalmente?',
		options: ['justify-content', 'align-items', 'display-center'],
		correct: 1,
	},
	{
		q: 'En SQL, ¿cómo borras todos los datos de una tabla?',
		options: ['DELETE FROM', 'REMOVE *', 'DROP DATABASE'],
		correct: 0,
	},
	{
		q: "¿Cuál es el resultado de '2' + 2 en JavaScript?",
		options: ['4', '22', 'Error'],
		correct: 1,
	},
	{
		q: '¿Cómo se llama el método para añadir un elemento al final de un Array?',
		options: ['pop()', 'shift()', 'push()'],
		correct: 2,
	},
];

const log = document.getElementById('battle-log');
const hpFill = document.getElementById('hp-fill');
const hpText = document.getElementById('hp-text');

function loadChallenge() {
	if (bossHP <= 0 || batallaFinalizada) return;

	const randomIdx = Math.floor(Math.random() * challenges.length);
	const c = challenges[randomIdx];

	document.getElementById('challenge-text').innerText = c.q;
	const container = document.getElementById('options-container');
	container.innerHTML = '';

	c.options.forEach((opt, idx) => {
		const btn = document.createElement('button');
		btn.className = 'btn-option';
		btn.innerText = opt;
		btn.onclick = () => checkAnswer(idx, c.correct);
		container.appendChild(btn);
	});
}

function checkAnswer(selected, correct) {
	if (batallaFinalizada) return;

	if (selected === correct) {
		bossHP -= 25;
		updateLog('✨ ¡Hechizo Certero! SirLink causa 25 de daño.');
	} else {
		updateLog('⚠️ El Centinela bloquea y contraataca. ¡Fallo!');
	}

	updateBossUI();
}

function updateBossUI() {
	if (bossHP < 0) bossHP = 0;
	hpFill.style.width = bossHP + '%';
	hpText.innerText = `HP: ${bossHP} / 100`;

	if (bossHP <= 0 && !batallaFinalizada) {
		victoriaTotal();
	} else if (!batallaFinalizada) {
		loadChallenge();
	}
}

async function victoriaTotal() {
	if (batallaFinalizada) return;
	batallaFinalizada = true;

	const sprite = document.getElementById('boss-sprite');

	sprite.style.animation = 'none';
	void sprite.offsetWidth;

	sprite.innerText = '💀';
	sprite.classList.add('boss-vanish');

	document.getElementById('challenge-text').innerHTML =
		"<h2 style='color: gold;'>¡VICTORIA!</h2>";
	updateLog('✨ El Centinela se desintegra...');

	await finalizarNivel(100);

	const formData = new FormData();
	formData.append('item_name', 'Orbe de Sintaxia');
	formData.append('item_type', 'legendario');

	await fetch('../api/game_handler.php?action=grant_item', {
		method: 'POST',
		body: formData,
	});

	setTimeout(() => {
		window.location.href = 'index.php';
	}, 2500);
}

function updateLog(msg) {
	const p = document.createElement('p');
	p.innerText = msg;
	log.prepend(p);
}

async function finalizarNivel(xp) {
	try {
		const response = await fetch('../api/game_handler.php?action=add_xp', {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			body: `xp=${xp}`,
		});
		const data = await response.json();
		return data.success;
	} catch (error) {
		console.error('Error al reportar la victoria:', error);
		return false;
	}
}

loadChallenge();
loadChallenge();
