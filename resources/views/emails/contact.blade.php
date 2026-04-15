<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #0f0f0f; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #1a1a1a; border-radius: 16px; overflow: hidden; border: 1px solid #2a2a2a; }
        .header { background: linear-gradient(135deg, #d4af37, #b8860b); padding: 32px; text-align: center; }
        .header h1 { color: #0f0f0f; margin: 0; font-size: 24px; font-weight: 700; }
        .body { padding: 32px; }
        .field { margin-bottom: 20px; }
        .label { color: #d4af37; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px; }
        .value { color: #e5e5e5; font-size: 15px; line-height: 1.6; background: #252525; padding: 12px 16px; border-radius: 8px; border-left: 3px solid #d4af37; }
        .footer { padding: 20px 32px; background: #111; text-align: center; color: #555; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📬 Pesan Baru dari Portofolio</h1>
        </div>
        <div class="body">
            <div class="field">
                <div class="label">Nama Pengirim</div>
                <div class="value">{{ $name }}</div>
            </div>
            <div class="field">
                <div class="label">Email</div>
                <div class="value">{{ $email }}</div>
            </div>
            <div class="field">
                <div class="label">Pesan</div>
                <div class="value">{{ $userMessage }}</div>
            </div>
        </div>
        <div class="footer">
            Email ini dikirim otomatis dari website portofolio Ant &bull; {{ now()->format('d M Y, H:i') }}
        </div>
    </div>
</body>
</html>
