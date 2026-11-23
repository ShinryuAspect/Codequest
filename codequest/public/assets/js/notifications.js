(function () {
	const container = document.createElement('div');
	container.id = 'toast-container';
	document.body.appendChild(container);

	window.showToast = function (message, type = 'success', duration = 4000) {
		const toast = document.createElement('div');
		toast.className = `toast ${type}`;

		const icon =
			type === 'achievement' ? '🏆' : type === 'error' ? '❌' : '✨';

		toast.innerHTML = `
            <span>${icon}</span>
            <div>${message}</div>
        `;

		container.appendChild(toast);

		setTimeout(() => {
			toast.classList.add('fade-out');
			toast.addEventListener('animationend', () => toast.remove());
		}, duration);
	};
})();
