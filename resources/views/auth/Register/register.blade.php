<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <div class="container-register">
        <div class="register-box">
            <h2 class="text-center">Register</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input id="name" name="name" placeholder="Nama" type="text" class="form-control" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
                <div class="form-group">
                    <input id="email" name="email" placeholder="Email" type="email" class="form-control" value="{{ old('email') }}" required autocomplete="email">
                </div>
                <div class="form-group">
                    <input id="password" name="password" placeholder="Password" type="password" class="form-control" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <input id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" type="password" class="form-control" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="" selected disabled hidden>Pilih Jenis Kelamin</option>
                        <option value="0" {{ old('gender') == '0' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="d-flex">
                    <div class="d-flex justify-content-start">
                        <p>Sudah punya akun?</p>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('login')}}">Login</a>
                    </div>
                </div>

                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary btn-block">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
