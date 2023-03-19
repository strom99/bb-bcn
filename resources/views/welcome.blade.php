<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/general.css">
    @yield('css')
</head>
<body>
    <header>
        <h3><a href="/">Biblioteca Bcn</a></h3>
        <a class="btn" href="books/create">Crear</a>
    </header>
    @yield('content')
    @yield('js')
</body>
</html>