<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso al Reino - CodeQuest</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/auth.css">
</head>
<body class="auth-page">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-logo">⚔️</div>
                <h1>CODE<span>QUEST</span></h1>
                <p>Identifícate, viajero. Tu leyenda te espera.</p>
            </div>
            
            <form action="api/login.php" method="POST" class="auth-form">
                <div class="input-group">
                    <label><i class="icon">👤</i> Nombre del Héroe</label>
                    <input type="text" name="username" placeholder="Tu alias en el reino..." required autofocus>
                </div>
                
                <div class="input-group">
                    <label><i class="icon">🔑</i> Contraseña Maestra</label>
                    <input type="password" name="password" placeholder="Tu palabra secreta..." required>
                </div>

                <button type="submit" class="btn-auth">ENTRAR AL REINO</button>
            </form>

            <div class="auth-footer">
                <p>¿Aún no tienes equipo? <a href="register.php">Ficha por nosotros aquí</a></p>
            </div>
        </div>
    </div>
</body>
</html>