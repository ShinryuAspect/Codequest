[English](README.md) · **Español**

# CodeQuest: El Reino de Sintaxia

Juego de navegador que enseña programación mediante retos cortos de estilo RPG. Encarnas a un Caballero Escribano que devuelve el orden al fragmentado Reino de Sintaxia resolviendo puzles reales de SQL, CSS y JavaScript.

Proyecto del curso hecho con PHP, MySQL y JavaScript vanilla. La interfaz está en español.

## Cómo se juega

Crea un personaje (Guerrero del Código, Mago de Scripts o Tecnomante de Datos) y recorre el mapa:

| Zona | Habilidad | Reto |
|---|---|---|
| Minas de SQL | SQL | Escribe consultas sobre una base de datos de pruebas para encontrar la Llave de Plata. |
| Bosque del Debugger | CSS | Arregla los estilos de un cofre invisible con vista previa en vivo. |
| Altar de JS | JavaScript | Define variables para abrir una cerradura lógica. |
| Torre de Desafíos | Mixto | Combate contra el Centinela de Sintaxis, se desbloquea con 100 XP. |

Completar misiones da XP y objetos; tu perfil guarda el progreso y el inventario.

## Estado

CodeQuest es un prototipo en desarrollo:

- Los sistemas de botín y logros existen en el código, pero aún no están conectados a todos los retos.
- El asistente de pistas con Gemini (`config/gemini_api.php`) no está conectado al juego.
- Algunas entradas del mapa (por ejemplo la Cripta del Servidor) son provisionales.

## Tecnologías

PHP 8 · MySQL / MariaDB (PDO) · JavaScript vanilla · CSS

## Puesta en marcha

Requisitos: PHP 8+ con `pdo_mysql`, y MySQL o MariaDB.

1. Clona el repositorio.
2. Importa las dos bases de datos:
   ```bash
   mysql -u root -p < codequest/db/codequest_main.sql
   mysql -u root -p < codequest/db/codequest_sandbox.sql
   ```
3. Crea el usuario de solo lectura del sandbox (cambia antes la contraseña):
   ```bash
   mysql -u root -p < codequest/db/sandbox_user.sql
   ```
4. Configura tus credenciales con variables de entorno (`CQ_DB_USER`, `CQ_DB_PASS`, `CQ_SANDBOX_USER`, `CQ_SANDBOX_PASS`), o edita los valores por defecto en `codequest/config/db.php` y `codequest/game/sql_dungeon/engine.php`.
5. Arranca el servidor de desarrollo:
   ```bash
   php -S localhost:8000 -t codequest/public
   ```
6. Abre `http://localhost:8000` y forja una nueva identidad.

### Opcional: pistas con IA

Pon tu propia clave de la API de Google Gemini en `codequest/config/gemini_api.php`. No subas nunca una clave real al repositorio.

## Estructura del proyecto

```
codequest/
  api/        autenticación, estado de juego, botín y logros
  config/     ajustes de base de datos y sesión
  db/         esquemas principal y de pruebas
  game/       motor del sandbox SQL
  public/     páginas, vistas, CSS y JavaScript
```

## Nota de seguridad

Es un proyecto de aprendizaje. El sandbox de las Minas de SQL solo acepta sentencias `SELECT` y se conecta con un usuario de MySQL dedicado y de solo lectura sobre la base de datos del sandbox.
