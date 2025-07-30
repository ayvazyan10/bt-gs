<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
    <style>
        body { background: #f4f6f8; font-family: Arial, sans-serif; color: #222; }
        .mail-container { background: #fff; max-width: 540px; margin: 24px auto; padding: 32px 24px; border-radius: 8px; box-shadow: 0 2px 8px #0002; }
        h2 { font-size: 1.2rem; margin-bottom: 24px; color: #1967d2; }
        .field { margin-bottom: 18px; }
        .field-label { font-weight: 600; font-size: .95rem; color: #888; display: block; margin-bottom: 2px; }
        .field-value { font-size: 1.07rem; }
        .msg-label { font-weight: 600; font-size: .96rem; color: #1967d2; margin-bottom: 6px; }
        .msg-body { background: #f4f6f8; border-left: 4px solid #1967d2; padding: 16px; border-radius: 4px; font-size: 1rem; white-space: pre-line; }
    </style>
</head>
<body>
<div class="mail-container">
    <h2>Neue Kontaktanfrage</h2>

    <div class="field">
        <span class="field-label">Name:</span>
        <span class="field-value">{{ $senderName }}</span>
    </div>
    <div class="field">
        <span class="field-label">E-Mail:</span>
        <span class="field-value">{{ $senderEmail }}</span>
    </div>
    <div class="field">
        <span class="msg-label">Nachricht:</span>
        <div class="msg-body">{{ $bodyText }}</div>
    </div>
</div>
</body>
</html>
