<?php
require_once 'config.php';

// Get top 10 scores
$stmt = $pdo->query("
    SELECT player_name, moves, time_seconds, created_at 
    FROM scores 
    ORDER BY moves ASC, time_seconds ASC 
    LIMIT 10
");
$scores = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking - Juego de Memoria</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>🏆 Tabla de Clasificación</h1>
        
        <div class="leaderboard">
            <table>
                <thead>
                    <tr>
                        <th>Posición</th>
                        <th>Jugador</th>
                        <th>Movimientos</th>
                        <th>Tiempo</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($scores)): ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">No hay puntuaciones aún</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($scores as $index => $score): ?>
                            <tr>
                                <td><?php echo $index + 1; ?></td>
                                <td><?php echo htmlspecialchars($score['player_name']); ?></td>
                                <td><?php echo $score['moves']; ?></td>
                                <td><?php echo $score['time_seconds']; ?>s</td>
                                <td><?php echo date('d/m/Y', strtotime($score['created_at'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="controls">
            <a href="index.php" class="btn">Jugar de Nuevo</a>
        </div>
    </div>
</body>
</html>
