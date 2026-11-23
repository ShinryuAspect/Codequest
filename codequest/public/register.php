<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - CodeQuest</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/auth.css"> </head>
<body class="auth-page">
    <div class="auth-container">
        <h1>ÚNETE A LA ORDEN</h1>
        <p>Crea tu Caballero Escribano para empezar la aventura.</p>
        
        <form id="registerForm">
            <div class="input-group">
                <label>Nombre de Guerrero:</label>
                <input type="text" name="username" id="username" 
                    required 
                    minlength="4" 
                    maxlength="15" 
                    pattern="^[a-zA-Z0-9_]+$" 
                    title="Solo letras, números y guiones bajos (4-15 caracteres)">
            </div>

            <div class="input-group">
                <label>Contraseña Mágica:</label>
                <input type="password" name="password" id="password" required>
                <div class="password-strength-container">
                    <div id="strength-bar" class="strength-bar"></div>
                </div>
                <small id="strength-text"></small>
            </div>
            
            <div class="input-group">
                <label>Tu Clase:</label>
                <select name="avatar_type" id="avatar_type">
                    <option value="Technomancer">Technomancer (JS)</option>
                    <option value="Warrior">Data-Warrior (SQL)</option>
                    <option value="Mage">Bug-Hunter (Debug)</option>
                </select>
            </div>
            
            <button type="submit" class="btn-cast">FORJAR IDENTIDAD</button>
        </form>
        <p><a href="login.php">¿Ya tienes cuenta? Entra aquí</a></p>
        <div id="authMessage"></div>
    </div>

    <script src="assets/js/auth.js"></script>
</body>
</html>