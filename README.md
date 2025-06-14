## IM4

# Grüner Daumen KIDS

Grüner Daumen KIDS bringt den Kindern durch entdecken und beobachten bei, was Pflanzen zum wachsen brauchen. Der Fokus ist dabei auf die Bewässerung gelegt. Daten zur Bewässerung werden auf der Webseite über den Zeitraum von einer Woche angezeigt. Die Daten beinhalten die Menge der Bewässerung in Milliliter, die Häufigkeit der Bewässerung und den Füllstand des Wasserreservoirs. Falls der Füllstand zu tief ausfällt, wird das Kind über die Webseite darüber informiert oder über die LED am Mikrokontroller. Auf der Webseite erscheinen dann Intruktionen zum Befüllen des Reservoirs. So können die Kinder ein Verständnis für den Wasserbedarf von Setzlingen und Samen in Gewächshäuser erlernen.

![Screen Flow](https://github.com/user-attachments/assets/047a1295-1c59-4d43-a455-b64765efa54c)

### Entwicklungsprozess:
Als wir uns die Box mit den Sensoren und Aktoren angesehen haben, wussten wir noch nicht so genau, was wir damit machen sollten. Wir wollten etwas, was tatsächlich einen Nutzen bietet und wir dann auch nicht nur als Lernprojekt benutzen könnten. Uns kam dann die Idee eines Gewächshauses, weil wir dort sehr viele Sensoren und auch Aktoren verwenden können. Nur die Zielgruppe von 50+ hat noch nicht gepasst, weswegen wir das Projekt als Lernumgebung für Kinder umsetzen wollten. So können die Kinder durch Beobachten lernen, wie viel Wasser ein Setzling benötigt, um zu wachsen oder einfach nur Spass am Entdecken und den eigenen Pflanzen haben.

### Verworfenen Lösungsansätze:
Wir hatten verschiedene Sensoren in der Auswahl. So haben wir uns überlegt, einen Kohlenstoffmonoxid Sensor einzubauen oder einen Helligkeitssensor, um das Tageslicht zu tracken. Durch die Interviews haben wir aber gelernt, dass das schon zu fortgeschritten ist für Kinder. Weswegen wir uns auf die grundlegenden Bedürfnisse der Pflanzen fokussiert haben.

### Designentscheidung:
Da unsere Zielgruppe Kinder sind, haben wir die Webseite bewusst sehr einfach gestaltet. Die Texte sollen den Lerneffekt erweitern, ohne zu weit ins Detail zu gehen. Auch haben wir die Warnungen und Meldungen deutlich dargestellt und mit klaren Instruktionen versehen.
Die Instruktionen helfen auch Erziehungsberechtigten bei der Betreuung. Sei es mit dem Kind oder auch in Abwesenheit dessen.

![Adobe Express - file](https://github.com/user-attachments/assets/8a9de563-e6f7-48c0-b56c-47c856c20c98)

### Schritt für Schritt:
<li>Konzeptarbeit wie Figma Mockup und Screen Flow sollte zuerst erledigt werden.</li>

<li>Bedürfnissanylse durch Interviews und Austausch mit der Zielgruppe.</li>

<li>Projektstruktur anlegen für HTML, CSS, PHP und IMG in Visual Studio Code.</li>

<li>HTML Datei codieren und Webseite nach Figma Vorlage erstellen. Design mit CSS erstellen und Bilder einfügen.</li>

<li>Diagramme mit chart.js einbinden und designen. Für die Mindestlinie ist ein separates chart.js plugin erforderlich. (chartjs-plugin-annotation)</li>

<li>Daten schonmal in php simulieren als Vorbereitung für die gesammelten Daten.</li>

<li>Datenbank vorbereiten mit den passenden Parameter.</li>

<li>Microcontroller nach Steckplan vorbereiten.</li>

![Steckplan](https://github.com/user-attachments/assets/1d67e73a-674d-4bef-81c6-55896895571f)

<li>Über den passenden Port den Code zur Messung und Bewässerung aufspielen.</li>

![Mikrocontrollercode](https://github.com/user-attachments/assets/a4208e1a-702a-4096-a42b-0897d9b750de)

<li>Gewächshaus für die Aufnahme des Mikrocontrollers und die Sensoren vorbereiten. Optional kann ein Gehäuse für den Mikrocontroller 3D-gedruckt werden.</li>

<li>Gesammelte Daten in die Datenbank hochladen.</li>

<li>Überprüfen des Resultats und allfällige Verbesserungen vornehmen.</li>

![Komponentenplan](https://github.com/user-attachments/assets/99441069-93c1-4a09-bf30-f852e9e6ab83)

### Inspirationen:
Bei der Suche nach geeigneten Gewächshäusern für unser Projekt haben wir die Spielsets von Galileo entdeckt. Diese möchten auf dieselbe Weise den Kindern Wissen vermitteln und gehen dabei noch etwas mehr ins Detail oder sind auch oft etwas spezifizierter.
Ein grosser Unterschied ist, dass unsere Lösung kein einmaliges Produkt ist und es kann immer wieder verwendet werden. Ausserdem bieten wir über die Webseite eine Visualisierung der gesammelten Daten über einen definierten Zeitraum.

### Known Bugs:
Wir haben die Hardware zu Beginn des Projekts getestet und den Code zumindest zum testen schon aufgespielt. Trotzdem sind wir kurz vor Schluss noch mit Hardare-Problemen geplagt worden. Die Pumpe hat teilweise entweder durchgehend gepumpt oder dann gar nicht mehr. Wir nehmen an, dass es am Sensor liegt aber genau können wir es nicht betiteln. Cédrics Vater hat beruflich viel mit Elektronik zu tun und ist privat leidenschaftlicher Modelbauer. Auch er kam leider auf keinen grünen Zweig. So sahen wir uns gedrungen mit Beispieldaten zu arbeiten.  
Desweiteren ist uns bewusst, dass die LED Anzeige nicht optimal ist und eine direktere Anzeige zum Beispiel per Bildschirm schöner wäre. Dort könnten auch gleich die Daten von der Webseite angezeigt und die Einstellungen zur Bewässerung getroffen werden. Ebenfalls würde sich eine App wohl besser eignen als eine Webseite.

### Planung:
Wir haben uns immer wieder Rückmeldungen zum aktuellen Stand gegeben. So konnten wir uns abstimmen und schon Vorbereitungen treffen, sobald die andere Person soweit ist. Mit dem Code für die Webseite hat Philipp zum Beispiel schon begonnen, bevor das Hosting überhaupt final stand. Das hat uns erlaubt, zeiteffizient und zuweilen unabhängig voneinander zu arbeiten. Wir haben aber auch per Videoanruf zeitgleich am Projekt gearbeitet.

### Aufgabenverteilung:
Im Unterricht haben wir die Konzeption und die ersten physical Computing Schritte zusammen gemacht. Danach haben wir aufgrund der physischen Grösse des Gewächshauses die Aufgaben aufgeteilt. Cédric hat die Webseite bereitgestellt, wofür Philipp den Code geschrieben hat. Cédric hat den physical Computing Teil übernommen und die Sensoren und Aktoren im Gewächshaus eingebaut. Die gesammelten Daten sollten dann über den Code von Philipp auf der Webseite sichtbar werden. Den Arduino Code haben wir zusammen geschrieben. Die Dokumentation wurde auch von Philipp erstellt.

### Hilfsmittel:
CoPilot, ChatGPT und W3Schools haben wir zum Coden genutzt. Cédrics Vater hat seine unterstützende Hand bei den Hardware-Problemen angeboten. Hilfreich waren auch die Folien aus dem Unterricht und natürlich der Präsenzunterricht an sich, welcher uns enorm beim physical Computing vorangebracht hat.

### Lerneffekt:

Wir haben die letzten Tage vor der Abgabe eingeplant, um alle Puzzelstücke miteinander zu verbinden. Dass wir auf ein derart unlösbares Hardware-Problem stossen, haben wir aber nicht eingerechnet. Für ein nächstes Projekt würden wir definitiv am Ende noch mehr Zeit einplanen um wirklich alle Eventualitäten abzudecken. So hätten wir noch einen Ersatz organisieren können. Alternativ hätten wir auch früher reagieren können und es nicht noch so lange verzweifelt versuchen müssen. Dann hätten wir auch wieder mehr Zeit zur Verfügung für einen Ersatz. Alles in allem ist die Situation so für uns sehr unbefriedigend. Nach all den Stunden, Tagen und Wochen, die wir in dieses Projekt gesteckt haben, hätten wir es wirklich gerne zum laufen bekommen. Wir nehmen diesen Fehlschlag als Learning auf unseren Weg. Nichtsdestotrotz oder gerade deswegen haben wir beide wahrscheinlich noch mehr gelernt, als wenn alles geklappt hätte, weil wir uns bis ins Detail mit unserem Code und der Hardware auseinander setzen mussten.

Philipp:
Bei diesem Projekt ist mir aufgefallen, wie viel ich über die Semester schon beim Thema Coding gelernt habe. Ich brauche für eine Webseite nicht mehr vier Wochen, sondern eher vier Tage und habe dann mehr Zeit für weiterführende Funktionen.
Ich habe gelernt, welche verschiedenen Sensoren es gibt und wie diese funktionieren. Auch habe ich jetzt ein Verständnis für die Kommunikation zwischen Sensoren und Mikrocontroller. Das hat mir auch für das Projekt in Creative Technology geholfen, da dort für mich der Gedankenprozess ähnlich ist.
Physical Computing hat meinen Wissensstand nochmals viel breiter gestaltet als er durch das Studium schon ist und Lücken zwischen der digitalen und analogen Welt geschlossen. Ich denke, ich werde auch in Zukunft noch weiter davon profitieren. 

Cédric:


### Coding Protokoll:
<li>16. Mai:
Aufsetzen HTML und erste CSS arbeiten</li>

<li>18. Mai:
Weiter optimiert. Button für automatische Bewässerung, Footer, CSS</li>

<li>18. Mai:
HTML + CSS grundsätzlich fertiggestellt. Vorbereitungen für Datenbankverlinkung getroffen.</li>

<li>12. Juni:
Resetbutton für Reservoir eingefügt und Berechungen im PHP vorgenommen für den Füllstand.
Onboard LED Alarm für niedrigen Füllstand initiert.</li>

<li>13. Juni:
Arduino Code Finalisierung und troubleshooting Hardware.</li>

<li>14. Juni: 
Troubleshooting Tag 2.</li>

<li>15. Juni:
Troubleshooting Tag 3 und Finalisierung.</li>
