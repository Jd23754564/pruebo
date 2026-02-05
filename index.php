<?php
session_start();
require_once 'config.php';

// Initialize game
if (!isset($_SESSION['game_id'])) {
    $_SESSION['game_id'] = uniqid();
    $_SESSION['moves'] = 0;
    $_SESSION['matches'] = 0;
}

// Handle score submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_score'])) {
    $player_name = $_POST['player_name'] ?? 'Anonymous';
    $moves = $_POST['moves'] ?? 0;
    $time = $_POST['time'] ?? 0;
    
    $stmt = $pdo->prepare("INSERT INTO scores (player_name, moves, time_seconds) VALUES (?, ?, ?)");
    $stmt->execute([$player_name, $moves, $time]);
    
    header("Location: leaderboard.php");
    exit();
}

// Reset game
if (isset($_GET['reset'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Memoria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>🎮 Juego de Memoria</h1>
        
        <div class="stats">
            <div class="stat-item">
                <span>Movimientos:</span>
                <span id="moves">0</span>
            </div>
            <div class="stat-item">
                <span>Parejas:</span>
                <span id="matches">0/8</span>
            </div>
            <div class="stat-item">
                <span>Tiempo:</span>
                <span id="timer">0s</span>
            </div>
        </div>

        <div class="game-board" id="gameBoard"></div>

        <div class="controls">
            <button onclick="resetGame()" class="btn">Nuevo Juego</button>
            <a href="leaderboard.php" class="btn btn-secondary">Ver Ranking</a>
        </div>
    </div>

    <!-- Modal de victoria -->
    <div id="winModal" class="modal">
        <div class="modal-content">
            <h2>¡Felicitaciones! 🎉</h2>
            <p>Completaste el juego en <span id="finalMoves">0</span> movimientos</p>
            <p>Tiempo: <span id="finalTime">0</span> segundos</p>
            
            <form method="POST" action="">
                <input type="text" name="player_name" placeholder="Tu nombre" required maxlength="50">
                <input type="hidden" name="moves" id="hiddenMoves">
                <input type="hidden" name="time" id="hiddenTime">
                <button type="submit" name="save_score" class="btn">Guardar Puntuación</button>
            </form>
            <button onclick="closeModal()" class="btn btn-secondary">Cerrar</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
