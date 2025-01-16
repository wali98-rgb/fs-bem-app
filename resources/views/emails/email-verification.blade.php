<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Email</title>
</head>

<body>
    <div class="container">
        <h1>Verifikasi Email</h1>
        <center>
            <a href="{{ config('app.url') }}/login">
                <img src="{{ config('app.url') }}/plugins/frontend/img/bem.png" alt="" width="20%">
            </a>
            <br>
            <h2 class="" style="font-weight: 700">BEM Indonesia Mandiri</h2>
        </center>

        {{-- <p>Hai, {{ Str::ucfirst(Auth::user()->name) }}</p> --}}
        <p>Hai Member,</p>
        <p>Terima kasih sudah mendaftar di BEM Indonesia Mandiri! Untuk menyelesaikan pendaftaran Anda yaitu dengan
            mengklik tombol berikut:</p>
        <p><a href="{{ $verificationLink }}"><button class="button">Verifikasi Email</button></a></p>

        <p>Salam,</p>
        <p>BEM Indonesia Mandiri Bandung</p>
    </div>
</body>

</html>
