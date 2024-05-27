<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('plugins/frontend/css/components/Navbar.css') }}">
    @include('admin.assets.css')

    <title>Bem IM | Bandung</title>
</head>

<body>
    @include('client.components.navbar')


    @stack('js')
</body>

</html>
