#include <WiFi.h>
#include <HTTPClient.h>
#include <ArduinoJson.h>

/////////////////////////////////////// WLAN-Zugangsdaten
const char* ssid = "NETGEAR15";
const char* password = "ZENSIERT";

/////////////////////////////////////// Server-URL zu alarm.php
const char* serverUrl = "http://cedrichochreuter.ch/alarm.php";

/////////////////////////////////////// Pins
const int sensorPin = 4;        // Bodenfeuchtigkeitssensor (analog)
const int motor_in1 = 11;       // Pumpe ansteuern
const int motor_in2 = 10;       // Zweiter Motorpin (optional, hier nicht benutzt)
const int ledPin = 2;           // Interne LED für Alarmanzeige

int sensorValue = 0;

void setup() {
  Serial.begin(115200);
  delay(1000);

  pinMode(motor_in1, OUTPUT);
  pinMode(motor_in2, OUTPUT);
  pinMode(ledPin, OUTPUT);

  digitalWrite(motor_in1, LOW);
  digitalWrite(ledPin, LOW);

  // WLAN verbinden
  WiFi.begin(ssid, password);
  Serial.print("🔌 Verbinde mit WLAN...");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println(" ✅ WLAN verbunden!");
}

void loop() {
  sensorValue = analogRead(sensorPin);
  Serial.print("Sensorwert: ");
  Serial.println(sensorValue);

  // HTTP-Anfrage an alarm.php
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(serverUrl);
    int httpCode = http.GET();

    if (httpCode == 200) {
      String payload = http.getString();
      Serial.println("📡 Serverantwort: " + payload);

      StaticJsonDocument<200> doc;
      DeserializationError error = deserializeJson(doc, payload);

      if (!error) {
        bool alarm = doc["alarm"];
        int wasserstand = doc["wasserstand"];

        Serial.print("Wasserstand: ");
        Serial.print(wasserstand);
        Serial.print(" ml | Alarm: ");
        Serial.println(alarm ? "JA" : "NEIN");

        if (alarm) {
          // LED blinkt 3x
          for (int i = 0; i < 3; i++) {
            digitalWrite(ledPin, HIGH);
            delay(300);
            digitalWrite(ledPin, LOW);
            delay(300);
          }
          digitalWrite(motor_in1, LOW); // Pumpe sicherheitshalber AUS
        } else {
          digitalWrite(ledPin, LOW);    // LED AUS

          // Wenn Boden trocken → gießen
          if (sensorValue > 1500) {
            Serial.println("🌵 Erde trocken – gießen");
            digitalWrite(motor_in1, HIGH);
            delay(1000);  // 1 Sekunde gießen
            digitalWrite(motor_in1, LOW);
          } else {
            Serial.println("🌱 Erde ist feucht genug");
            digitalWrite(motor_in1, LOW);
          }
        }
      } else {
        Serial.println("❌ Fehler beim JSON-Parsing!");
      }
    } else {
      Serial.print("❌ HTTP Fehler: ");
      Serial.println(httpCode);
    }

    http.end();
  } else {
    Serial.println("⚠ WLAN getrennt – versuche Neuverbindung...");
    WiFi.begin(ssid, password);
  }

  delay(5000);  // Alle 5 Sekunden prüfen
}