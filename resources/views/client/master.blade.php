<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('plugins/frontend/css/components/Index.css') }}">
    @include('admin.assets.css')
    <title>BEM IM | BANDUNG</title>
</head>

<body>
    @include('client.components.navbar')


    <div class="wrapper">

        <div class="content">
          <!-- Konten Anda di sini -->
          @yield('about')
        </div>
        <div class="content">
          <!-- Konten Anda di sini -->
          @yield('feedback')
        </div>
    </div>


    @include('client.components.footer')
    @stack('js')
</body>

</html>
