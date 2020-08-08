@extends('template')

@section('content')
    <div>
        <h2>Edycja profilu:</h2>

        <form action="/myAccount/edit/storeData" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

            <h2>Zmień dane kontaktowe</h2>

            <h4>Nick:
                <input type="text" id="nick" name="nick" value="{{$user['nick']}}" required minlength="4" maxlength="30" size="30">
            </h4>
            <h4>Imie:
                <input type="text" id="name" name="name" value="{{$user['name']}}" required minlength="2" maxlength="30" size="30">
            </h4>

            <h4>Nazwisko:
                <input type="text" id="surname" name="surname" value="{{$user['surname']}}" required minlength="2" maxlength="30" size="30">
            </h4>

            <h4>Numer telefonu:
                <input type="numeric" id="phone" name="phone" value="{{$user['phone']}}" required minlength="9" maxlength="9" size="9">
            </h4>

            <input type="submit" value="Zapisz">
        </form>

        <form action="/myAccount/edit/storeEmail" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

            <h2>Zmień adres e-mail</h2>

            <h4>Adres e-mail:
                <input type="email" id="email" name="email" value="{{$user['email']}}" required minlength="4" maxlength="30" size="30">
            </h4>

            <input type="submit" value="Zapisz">
        </form>

        <form action="/myAccount/edit/storePassword" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <h2>Zmień hasło</h2>

            <h4>Stare hasło:
                <input type="password" id="old_password" name="old_password" required minlength="4" maxlength="30" size="30">
            </h4>

            <h4>Nowe hasło:
                <input type="password" id="new_password" name="new_password" required minlength="4" maxlength="30" size="30">
            </h4>

            <h4>Potwierdź nowe hasło:
                <input type="password" id="new_password_confirm" name="new_password_confirm" required minlength="4" maxlength="30" size="30">
            </h4>

            <input type="submit" value="Zapisz">
        </form>

    </div>
@endsection('content')
