<html lang="pl">

<head>
    <title>OLX {{$title ?? null}}</title>
    <meta charset="utf-8">
    <link href="{{URL::asset('style.css')}}" rel="stylesheet">
</head>

<body class="body">
<div class="wrapper">

    <div class="header">
        <h1>OLX</h1>
    </div>

    <div class="container">
        <div class="menu">
            <ul>
                <li><a href="/">Szukaj</a></li>
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="/myAccount/myAdverts/">Moje ogłoszenia</a>
                            <a href="/myAccount/">Moje konto</a>
                            <a href="/myAccount/logout/">Wyloguj się</a>
                        @else
                            <a href="{{ route('login') }}">Zaloguj się</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Zarejestruj się</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </ul>
        </div>

        <div class="page">
            @yield('content')

            @if($errors->any())
                <ui class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li style="color:red">{{$error}}</li>
                    @endforeach
                </ui>
            @endif
        </div>
    </div>

    <div class="footer">
        <p>© 2020 by Dominik Zięba.</p>
    </div>
</div>
</body>

</html>
