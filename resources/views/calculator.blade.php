<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kostenrechner | B&T Gebäudeservice</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f5f5f5; }
        h2 { color: #004d7a; }
        select, input, button { margin: 10px 0; padding: 8px; width: 100%; max-width: 400px; }
        #ergebnis { font-weight: bold; margin-top: 20px; }
        .hinweis { font-size: 0.9em; color: gray; margin-top: 30px; }
        form { margin-top: 40px; }
    </style>
</head>
<body>

<h2>Kostenrechner Gebäudereinigung</h2>
<p>Berechnen Sie Ihren Reinigungspreis direkt online – schnell & unverbindlich.</p>

<label for="leistung">Leistung auswählen:</label>
<select id="leistung" onchange="anzeigeWechsel()">
    <option value="">Bitte wählen</option>
    <option value="fenster_einseitig">Fensterreinigung – einseitig</option>
    <option value="fenster_beidseitig">Fensterreinigung – beidseitig</option>
    <option value="glas_schwer">Glasreinigung – schwer erreichbar</option>
    <option value="glas_klein">Glasreinigung unter 100 m²</option>
    <option value="wintergarten">Wintergärten / Glasdächer</option>
    <option value="sonder">Sonderreinigung</option>
    <option value="unterhalt">Unterhaltsreinigung</option>
    <option value="boden">Bodenbeschichtung</option>
</select>

<div id="eingabefeld"></div>
<p id="ergebnis"></p>

<p class="hinweis">
    Alle Preise dienen der Orientierung. Endpreise werden nach kostenloser Besichtigung angeboten.<br>
    Bei <strong>Fensterreinigung beidseitig</strong> berechnen wir den doppelten Preis pro m².<br>
    Alle Preisangaben verstehen sich inklusive gesetzlicher Mehrwertsteuer.
</p>

<a href="https://wa.me/4917662239796" target="_blank" style="display:inline-block;margin-top:20px;padding:10px 15px;background:#25d366;color:#fff;text-decoration:none;border-radius:5px;">Jetzt per WhatsApp anfragen</a>

<form action="/kontakt-senden" method="post">
    <h3>Direkt anfragen:</h3>
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="E-Mail" required>
    <input type="tel" name="telefon" placeholder="Telefonnummer" required>
    <textarea name="nachricht" rows="5" placeholder="Ihre Nachricht"></textarea>
    <label><input type="checkbox" required> Ich habe die Datenschutzerklärung gelesen.</label><br><br>
    <button type="submit">Anfrage senden</button>
</form>

<script>
    function anzeigeWechsel() {
        const leistung = document.getElementById('leistung').value;
        const feld = document.getElementById('eingabefeld');
        const ergebnis = document.getElementById('ergebnis');
        feld.innerHTML = "";
        ergebnis.innerHTML = "";

        if (["fenster_einseitig", "fenster_beidseitig", "glas_schwer"].includes(leistung)) {
            feld.innerHTML = `
          Quadratmeter: <input type="number" id="menge" min="100">
          <button onclick="berechne()">Berechnen</button>
        `;
        } else if (["glas_klein", "wintergarten", "boden"].includes(leistung)) {
            feld.innerHTML = Diese Leistung wird individuell kalkuliert. Bitte kontaktieren Sie uns.;
        } else if (["sonder", "unterhalt"].includes(leistung)) {
            feld.innerHTML = `
          Stunden: <input type="number" id="menge" min="1">
          <button onclick="berechne()">Berechnen</button>
        `;
        }
    }

    function berechne() {
        const leistung = document.getElementById('leistung').value;
        const menge = parseFloat(document.getElementById('menge').value);
        let preis = 0;

        if (leistung === "fenster_einseitig") preis = 3.5;
        if (leistung === "fenster_beidseitig") preis = 7.0;
        if (leistung === "glas_schwer") preis = 4.5;
        if (leistung === "sonder") preis = 49.90;
        if (leistung === "unterhalt") preis = 36.00;

        if (!isNaN(menge)) {
            const gesamt = (menge * preis).toFixed(2);
            document.getElementById('ergebnis').innerText = Gesamtpreis (inkl. MwSt): ${gesamt} €;
        }
    }
</script>

</body>
</html>
