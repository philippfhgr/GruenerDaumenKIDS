<?php
header('Content-Type: application/json');

// config laden
$config = require __DIR__ . '/config.php';

// Verbindung aufbauen und Auffüllung protokollieren
try {
    $pdo = new PDO(
        "mysql:host={$config['host']};dbname={$config['db']};charset=utf8",
        $config['user'],
        $config['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Auffüllung auf 300 ml (als Fixwert) protokollieren
    $sql = "INSERT INTO auffuellung (datum, menge) VALUES (CURDATE(), 300)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    echo json_encode(['success' => true, 'message' => 'Wasserstand wurde auf 300 ml zurückgesetzt.']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
