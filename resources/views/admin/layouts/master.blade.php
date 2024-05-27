<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @include('admin.assets.css')
    <link rel="stylesheet" href="{{ asset('plugins/frontend/css/App.css') }}">

    <title>Bem IM | Admin Page</title>
</head>

<body>
    <div class="l3odY">
        {{-- Sidebar Session --}}
        <x-sidebar></x-sidebar>

        {{-- Main Content Session --}}
        <div class="m4Inc0">
            @yield('content')
        </div>
    </div>

    @stack('js')
</body>

</html>
