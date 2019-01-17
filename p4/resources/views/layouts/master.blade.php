<!doctype html>
<html lang='en'>
<head>
    <title>@yield('title', 'Apartment Hunter')</title>
    <meta charset='utf-8'>

    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link href='/css/main.css' type='text/css' rel='stylesheet'>

    @stack('head')
</head>
<body>
    @if(session('alert'))
        <div class='flash flashAlert'>{{ session('alert') }}</div>
    @elseif(session('success'))
        <div class='flash flashSuccess'>{{ session('success') }}</div>
    @endif

    <header>
        <a href='/'><img src='/images/logo@2x.png' id='logo' alt='Apartment Hunter Logo'></a>
        <a href='/login'><img src='/images/default-user.png' id='avatar' alt='Default User Avatar'></a>
        @include('modules.nav')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }}
    </footer>
    @stack('body')
</body>
</html>