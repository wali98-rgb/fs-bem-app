<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.assets.css')
    <link rel="stylesheet" href="{{ asset('plugins/backend/css/App.css') }}">

    <title>Bem IM | Admin Page</title>
</head>

<body>
    <div class="l3odY">
        {{-- Sidebar Session --}}
        <x-sidebar></x-sidebar>

        {{-- Main Content Session --}}
        <div class="m4Inc0" style="height: 100dvh">

            @yield('content')
        </div>
    </div>

    @include('admin.assets.js')
</body>

</html>
