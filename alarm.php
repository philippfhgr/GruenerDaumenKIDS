<?php
header('Content-Type: application/json');

// Konfiguration laden
$config = require __DIR__ . '/config.php';

// Verbindung zur Datenbank aufbauen
try {
    $pdo = new PDO(
        "mysql:host={$config['host']};dbname={$config['db']};charset=utf8",
        $config['user'],
        $config['pass']
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Letzten Füllstand abrufen
    $sql = "SELECT fuellstand FROM reservoir ORDER BY zeitpunkt DESC LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $fuellstand = (int)$row['fuellstand'];
        $alarm = $fuellstand < 20; // Grenzwert für Alarm, z.B. unter 20 ml

        echo json_encode([
            'wasserstand' => $fuellstand,
            'alarm' => $alarm
        ]);
    } else {
        echo json_encode([
            'error' => 'Kein Eintrag im Reservoir gefunden.'
        ]);
    }

} catch (PDOException $e) {
    echo json_encode([
        'error' => 'Datenbankfehler: ' . $e->getMessage()
    ]);
}
