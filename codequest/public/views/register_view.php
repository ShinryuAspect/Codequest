<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Héroe - CodeQuest</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/auth.css">
</head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-logo">🛡️</div>
                <h1>NUEVO<span>HÉROE</span></h1>
                <p>Elige tu destino y únete a la orden.</p>
            </div>
            
            <form action="api/register.php" method="POST" class="auth-form">
                <div class="input-group">
                    <label>Nombre de Guerra</label>
                    <input type="text" name="username" placeholder="¿Cómo te recordarán?" required>
                </div>

                <div class="input-group">
                    <label>Especialidad (Clase)</label>
                    <select name="avatar" class="auth-select">
                        <option value="Warrior">Guerrero del Código (Fuerza)</option>
                        <option value="Mage">Mago de Scripts (Magia)</option>
                        <option value="Technomancer">Tecnomante de Datos (Agilidad)</option>
                    </select>
                </div>
                
                <div class="input-group">
                    <label>Palabra de Honor (Contraseña)</label>
                    <input type="password" name="password" placeholder="Protégete bien..." required>
                </div>

                <button type="submit" class="btn-auth">FORJAR MI DESTINO</button>
            </form>

            <div class="auth-footer">
                <p>¿Ya tienes las botas puestas? <a href="login.php">Vuelve al combate</a></p>
            </div>
        </div>
    </div>
</body>
</html>