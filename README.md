**English** · [Español](README.es.md)

# CodeQuest: The Kingdom of Sintaxia

A browser game that teaches programming through short RPG-style challenges. You play a Scribe Knight who restores order to the fragmented Kingdom of Sintaxia by solving real SQL, CSS and JavaScript puzzles.

Built as a course project (PHP, MySQL and vanilla JavaScript). The interface is in Spanish.

## Gameplay

Create a character (Code Warrior, Script Mage or Data Technomancer), then travel across the map:

| Zone | Skill | Challenge |
|---|---|---|
| SQL Mines | SQL | Write queries against a sandbox database to find the lost Silver Key. |
| Debugger Forest | CSS | Fix the styles of an invisible chest, with a live preview. |
| JS Altar | JavaScript | Define variables so a logic lock opens. |
| Tower of Challenges | Mixed | Boss fight against the Syntax Sentinel, unlocked at 100 XP. |

Completing missions grants XP and items; the player profile keeps your progress and inventory.

## Status

CodeQuest is a work-in-progress prototype:

- The loot and achievement systems exist in code but are not wired into every challenge yet.
- The Gemini-powered hint helper (`config/gemini_api.php`) is not connected to the game.
- Some map entries (for example the Server Crypt) are placeholders.

## Tech stack

PHP 8 · MySQL / MariaDB (PDO) · Vanilla JavaScript · CSS

## Getting started

Requirements: PHP 8+ with `pdo_mysql`, and MySQL or MariaDB.

1. Clone the repository.
2. Import both databases:
   ```bash
   mysql -u root -p < codequest/db/codequest_main.sql
   mysql -u root -p < codequest/db/codequest_sandbox.sql
   ```
3. Create the read-only sandbox user (change the password first):
   ```bash
   mysql -u root -p < codequest/db/sandbox_user.sql
   ```
4. Set your credentials with environment variables (`CQ_DB_USER`, `CQ_DB_PASS`, `CQ_SANDBOX_USER`, `CQ_SANDBOX_PASS`), or edit the defaults in `codequest/config/db.php` and `codequest/game/sql_dungeon/engine.php`.
5. Start the development server:
   ```bash
   php -S localhost:8000 -t codequest/public
   ```
6. Open `http://localhost:8000` and forge a new identity.

### Optional: AI hints

Copy your own Google Gemini API key into `codequest/config/gemini_api.php`. Never commit a real key.

## Project structure

```
codequest/
  api/        auth, game state, loot and achievements
  config/     database and session settings
  db/         main and sandbox schemas
  game/       SQL sandbox engine
  public/     pages, views, CSS and JavaScript
```

## Security note

This is a learning project. The SQL Mines sandbox only accepts `SELECT` statements and connects with a dedicated MySQL user that has read-only access to the sandbox database.
