<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>

<body>
    <div class="container">
        <h1>Reset Password</h1>
        <center>
            <a href="{{ config('app.url') }}/login">
                <img src="{{ config('app.url') }}/plugins/frontend/img/bem.png" alt="" width="20%">
            </a>
            <br>
            <h2 class="" style="font-weight: 700">BEM Indonesia Mandiri</h2>
        </center>

        {{-- <p>Hai, {{ Str::ucfirst(Auth::user()->name) }}</p> --}}
        <p>Hai Member,</p>
        <p>Kami menerima permintaan reset password untuk akun Anda di BEM Indonesia Mandiri Bandung. Silahkan klik
            tombol di bawah untuk mengatur ulang password Anda:</p>
        <p><a href="{{ $resetPasswordLink }}"><button class="button">Reset Password</button></a></p>

        <p>Jika Anda tidak meminta reset password, Anda bisa mengabaikan email ini.</p>
        <p>Salam,</p>
        <p>BEM Indonesia Mandiri Bandung</p>
    </div>
</body>

</html>
