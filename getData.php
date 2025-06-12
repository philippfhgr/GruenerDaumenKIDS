<?php
header('Content-Type: application/json');

// config laden
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

$chart = isset($_GET['chart']) ? $_GET['chart'] : '';

switch ($chart) {
    case 'proTag':
        $startwert = 300;

        // Bewässerungsdaten holen
        $sql = "
            SELECT 
                datum AS label,
                SUM(anzahl) AS anzahl,
                SUM(anzahl) * 5 AS wassermenge
            FROM 
                bewasserung
            GROUP BY 
                datum
            ORDER BY 
                datum ASC
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Auffüllungsdaten holen
        $sql2 = "
            SELECT 
                datum,
                SUM(menge) AS menge
            FROM 
                auffuellung
            GROUP BY datum
        ";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute();
        $fuellungen = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        // In einfaches Array umwandeln für schnellen Zugriff
        $fuellungen_map = [];
        foreach ($fuellungen as $f) {
            $fuellungen_map[$f['datum']] = (int)$f['menge'];
        }

        // Berechnung: kumulierte Bewässerung + Auffüllungen
        $wasserstand = $startwert;
        $result = [];

        foreach ($rows as $row) {
            $datum = $row['label'];
            $anzahl = (int)$row['anzahl'];
            $wassermenge = (int)$row['wassermenge'];

            // Auffüllung an dem Tag berücksichtigen (falls vorhanden)
            if (isset($fuellungen_map[$datum])) {
                $wasserstand += $fuellungen_map[$datum];
            }

            // Verbrauch abziehen
            $wasserstand -= $wassermenge;

            $result[] = [
                'label' => $datum,
                'anzahl' => $anzahl,
                'wassermenge' => $wassermenge,
                'wasserstand_aktuell' => $wasserstand
            ];
        }

        echo json_encode($result);
        break;

    case 'inML':
        $sql = "SELECT datum AS label, ml AS value FROM wassermenge ORDER BY datum ASC";
        break;

    case 'fuellstand':
        $sql = "SELECT zeitpunkt AS label, fuellstand AS value FROM reservoir ORDER BY zeitpunkt ASC";
        break;

    default:
        echo json_encode(['error' => 'Ungültiger Chart-Parameter']);
        exit;
}

// Nur für andere Fälle ausführen
if ($chart !== 'proTag') {
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Abfrage fehlgeschlagen: ' . $e->getMessage()]);
    }
}
