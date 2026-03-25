<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nieuw bericht</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: #f4f4f4; font-family: 'Helvetica Neue', Arial, sans-serif; color: #1a1a1a; }
        .wrapper { max-width: 600px; margin: 0 auto; background: #ffffff; }
        .bar { display: flex; height: 6px; }
        .bar-red    { background: #e03a3e; flex: 4; }
        .bar-yellow { background: #f7b11c; flex: 3; }
        .bar-blue   { background: #0d5c9c; flex: 5; }
        .header { padding: 40px 40px 24px; border-bottom: 2px solid #1a1a1a; }
        .header-label { font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.15em; color: #888; }
        .header-title { font-size: 36px; font-weight: 700; text-transform: uppercase; letter-spacing: -0.02em; line-height: 1; margin-top: 8px; }
        .body { padding: 40px; }
        .field { margin-bottom: 28px; }
        .field-label { font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; color: #888; margin-bottom: 6px; }
        .field-value { font-size: 16px; font-weight: 400; color: #1a1a1a; line-height: 1.6; }
        .field-value.bold { font-weight: 700; font-size: 18px; }
        .divider { height: 2px; background: #1a1a1a; margin: 8px 0 28px; width: 40px; }
        .message-box { background: #f4f4f4; padding: 24px; border-left: 4px solid #e03a3e; }
        .message-box p { font-size: 15px; line-height: 1.8; color: #1a1a1a; }
        .reply-btn { display: inline-block; margin-top: 32px; padding: 14px 32px; background: #1a1a1a; color: #ffffff !important; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.12em; text-decoration: none; }
        .footer { padding: 24px 40px; border-top: 2px solid #1a1a1a; background: #f4f4f4; }
        .footer p { font-size: 10px; color: #888; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 700; }
        .meta { display: inline-block; margin-right: 16px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Bauhaus colour bar -->
        <div class="bar">
            <div class="bar-red"></div>
            <div class="bar-yellow"></div>
            <div class="bar-blue"></div>
        </div>

        <!-- Header -->
        <div class="header">
            <div class="header-label">Portfolio — Nieuw contactbericht</div>
            <div class="header-title">Nieuw<br>Bericht.</div>
        </div>

        <!-- Body -->
        <div class="body">
            <div class="field">
                <div class="field-label">Van</div>
                <div class="field-value bold">{{ $contactMessage->name }}</div>
                <div class="field-value" style="font-size:14px; color:#555; margin-top:2px;">{{ $contactMessage->email }}</div>
            </div>
            <div class="divider"></div>

            @if($contactMessage->subject)
            <div class="field">
                <div class="field-label">Onderwerp</div>
                <div class="field-value bold">{{ $contactMessage->subject }}</div>
            </div>
            @endif

            <div class="field">
                <div class="field-label">Bericht</div>
                <div class="message-box">
                    <p>{{ $contactMessage->message }}</p>
                </div>
            </div>

            <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ urlencode($contactMessage->subject ?: 'Je bericht') }}" class="reply-btn">
                Beantwoord dit bericht
            </a>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>
                <span class="meta">Ontvangen: {{ $contactMessage->created_at->format('d/m/Y \o\m H:i') }}</span>
                <span class="meta">Via je portfolio contactformulier</span>
            </p>
        </div>
    </div>
</body>
</html>
