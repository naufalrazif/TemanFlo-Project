<!DOCTYPE html>
<html>
<head>
    <title>Kode OTP Verifikasi</title>
</head>
<body>
    <h2>Kode OTP Verifikasi</h2>
    <p>Halo,</p>
    <p>Kode OTP untuk verifikasi akun Anda adalah:</p>
    
    <div style="font-size: 24px; font-weight: bold; color: #333; margin: 20px 0;">
        {{ $otp }}
    </div>
    
    <p>Kode ini akan kadaluarsa dalam 5 menit.</p>
    <p>Jika Anda tidak meminta kode ini, silakan abaikan email ini.</p>
    
    <br>
    <p>Terima kasih,</p>
    <p>Tim Aplikasi</p>
</body>
</html>