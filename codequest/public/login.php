<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Entrar - CodeQuest</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/auth.css">
</head>
<body class="auth-page">
    <div class="auth-container">
        <h1>IDENTIFÍCATE</h1>
        <p>Introduce tus credenciales de Caballero.</p>
        
        <form id="loginForm">
            <div class="input-group">
                <label>Nombre de Usuario:</label>
                <input type="text" name="username" required>
            </div>
            
            <div class="input-group">
                <label>Contraseña:</label>
                <input type="password" name="password" required>
            </div>
            
            <button type="submit" class="btn-cast">ENTRAR AL REINO</button>
        </form>
        <p><a href="register.php" style="color: var(--accent-blue);">¿No eres caballero? Regístrate</a></p>
        <div id="authMessage"></div>
    </div>

    <script src="assets/js/auth.js"></script>
</body>
</html>