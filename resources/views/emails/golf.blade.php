<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Neue Termin-Anfrage</title>
    <style>
        body { font-family: system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial; color:#111827; }
        .container { max-width:700px; margin:24px auto; padding:20px; border:1px solid #e5e7eb; border-radius:8px; background:#ffffff; }
        .header { display:flex; align-items:center; gap:12px; margin-bottom:18px; }
        .brand { font-weight:700; color:#0369a1; }
        .row { margin:12px 0; }
        .label { color:#374151; font-size:13px; font-weight:600; margin-bottom:6px; display:block; }
        .value { color:#0f172a; font-size:15px; }
        .footer { margin-top:22px; font-size:12px; color:#6b7280; }
        table.meta { width:100%; border-collapse:collapse; margin-top:12px; }
        table.meta td { padding:6px 0; color:#374151; font-size:13px; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div>
            <div class="brand">B&amp;T Gebäudeservice — Termin-Anfrage</div>
            <div style="font-size:13px;color:#6b7280;">Neue Kontaktanfrage von der Website</div>
        </div>
    </div>

    <div class="row">
        <span class="label">Name</span>
        <div class="value">{{ $data['name'] ?? '-' }}</div>
    </div>

    <div class="row">
        <span class="label">E-Mail</span>
        <div class="value">{{ $data['email'] ?? '-' }}</div>
    </div>

    <div class="row">
        <span class="label">Gewünschter Zeitraum</span>
        <div class="value">{{ $data['zeitraum'] ?? '-' }}</div>
    </div>

    @if(!empty($data['message']))
        <div class="row">
            <span class="label">Message</span>
            <div class="value" style="white-space:pre-line;">{{ $data['message'] }}</div>
        </div>
    @endif

    <table class="meta" role="presentation">
        <tbody>
        <tr>
            <td style="width:140px">Empfangen am:</td>
            <td>{{ now()->setTimezone(config('app.timezone'))->toDateTimeString() }}</td>
        </tr>
        <tr>
            <td>IP:</td>
            <td>{{ $data['ip'] ?? '—' }}</td>
        </tr>
        <tr>
            <td>User Agent:</td>
            <td style="word-break:break-word;">{{ $data['agent'] ?? '—' }}</td>
        </tr>
        </tbody>
    </table>

    <div class="footer">
        Diese E-Mail wurde automatisch vom Kontaktformular auf der Website gesendet.
    </div>
</div>
</body>
</html>
