<!doctype html>
<html lang="en">
<head>
    <title>@yield('title', 'Bill Splitter')</title>
    <meta charset='utf-8'>
    <link href='/css/main.css' type='text/css' rel='stylesheet'>

    @stack('head')
</head>
<body>

    <header>
        <h1><a href='/'>@yield('title', 'Bill Splitter')</a></h1>
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    @stack('body')

</body>
</html>