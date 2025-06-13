<?php
header('Content-Type: application/json');
$config = require __DIR__ . '/config.php';

try {
    $pdo = new PDO(
        "mysql:host={$config['host']};dbname={$config['db']};charset=utf8",
        $config['user'],
        $config['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Trage heutigen Gießvorgang ein
    $sql = "INSERT INTO bewasserung (datum, anzahl) VALUES (CURDATE(), 1)
            ON DUPLICATE KEY UPDATE anzahl = anzahl + 1";
    $pdo->prepare($sql)->execute();

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
