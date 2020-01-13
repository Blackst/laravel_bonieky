<!DOCTYPE html>
<head>
    <title>@yield('title') - LARAVEL 1</title>
    <meta charset="UTF-8">
</head>
<body>
    <header>
        <h1>Header</h1>
    </header>
    <hr>
    <section>
        @yield('content')
    </section>
    <hr>
    <footer>
        Rodapé.
    </footer>
</body>
</html>