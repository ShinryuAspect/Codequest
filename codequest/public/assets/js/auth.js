document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const messageBox = document.getElementById('authMessage');
    if (loginForm) {
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(loginForm);
            enviarPeticion('../api/auth_handler.php', formData);
        });
    }
    if (registerForm) {
        registerForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(registerForm);
            enviarPeticion('../api/register_handler.php', formData);
        });
    }

    async function enviarPeticion(url, data) {
        messageBox.innerHTML = "Procesando...";
        try {
            const response = await fetch(url, {
                method: 'POST',
                body: data
            });
            const result = await response.json();

            if (result.success) {
                messageBox.style.color = "var(--gold)";
                messageBox.innerHTML = result.message;
                setTimeout(() => {
                    window.location.href = url.includes('auth') ? 'index.php' : 'login.php';
                }, 1500);
            } else {
                messageBox.style.color = "var(--accent-red)";
                messageBox.innerHTML = result.message;
            }
        } catch (error) {
            messageBox.innerHTML = "Error crítico en la conexión.";
        }
    }
});

const passwordInput = document.getElementById('password');
const strengthBar = document.getElementById('strength-bar');
const strengthText = document.getElementById('strength-text');

if (passwordInput && strengthBar) {
    passwordInput.addEventListener('input', () => {
        const val = passwordInput.value;
        let strength = 0;

        if (val.length >= 8) strength++;
        if (/[A-Z]/.test(val) || /[0-9]/.test(val)) strength++;
        if (/[^A-Za-z0-9]/.test(val)) strength++;

        strengthBar.className = 'strength-bar';
        
        if (val.length === 0) {
            strengthText.innerText = '';
        } else if (strength === 1) {
            strengthBar.classList.add('strength-weak');
            strengthText.innerText = 'Poder débil';
            strengthText.style.color = '#ff4d4d';
        } else if (strength === 2) {
            strengthBar.classList.add('strength-medium');
            strengthText.innerText = 'Poder aceptable';
            strengthText.style.color = '#ffa500';
        } else if (strength === 3) {
            strengthBar.classList.add('strength-strong');
            strengthText.innerText = '¡Poder legendario!';
            strengthText.style.color = '#2ecc71';
        }
    });
}