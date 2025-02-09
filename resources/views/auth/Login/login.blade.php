<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/frontend/css/pages/auth.css') }}">

</head>
<body>
    <div class="container-login d-flex justify-content-center align-items-center">
        <div class="login-box">
            <h2 class="text-center">Selamat Datang!</h2>
            <p class="text-center">Silakan masuk untuk melanjutkan.</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" placeholder="Masukkan Email Anda" type="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" name="password" placeholder="Masukkan Password Anda" type="password" class="form-control">
                </div>

                <div class="new-reg">
                    <p>Tidak punya akun?</p>
                    <a href="{{ route('register') }}">Register</a>
                </div>

                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary btn-block">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
