<?php
header('Content-Type: application/json');

// config.php laden
$config = require __DIR__ . '/config.php';

// Verbindung aufbauen
try {
    $pdo = new PDO(
        "mysql:host={$config['host']};dbname={$config['db']};charset=utf8",
        $config['user'],
        $config['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Datenbankverbindung fehlgeschlagen: ' . $e->getMessage()]);
    exit;
}

$chart = $_GET['chart'] ?? '';

// 1. Chart: Anzahl Bewässerungen pro Tag (value-Summe)
if ($chart === 'proTag') {
    $stmt = $pdo->prepare("
        SELECT DATE(datum) AS label, SUM(value) AS value
        FROM bewaesserung
        GROUP BY DATE(datum)
    ");
    $stmt->execute();
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    exit;
}

// 2. Chart: Wasserverbrauch in ml (direkt aus Tabelle)
if ($chart === 'inML') {
    $stmt = $pdo->prepare("
        SELECT datum AS label, ml AS value
        FROM wassermenge
        ORDER BY datum ASC
    ");
    $stmt->execute();
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    exit;
}

// 3. Chart: Füllstand des Reservoirs (direkt aus Tabelle reservoir)
if ($chart === 'fuellstand') {
    $stmt = $pdo->prepare("
        SELECT zeitpunkt AS label, fuellstand AS value
        FROM reservoir
        ORDER BY zeitpunkt ASC
    ");
    $stmt->execute();
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    exit;
}

// Fehlerfall
echo json_encode(['error' => 'Ungültiger Chart-Parameter']);
