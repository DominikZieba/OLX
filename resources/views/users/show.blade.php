@extends('template')

@section('content')
    <div>
        <ui>
            <h2>Twój profil:</h2>
            <h4>Nick: {{$user['nick']}}</h4>
            <h4>Imie i nazwisko: {{$user['name']." ".$user['surname']}}</h4>
            <h4>Numer telefonu: {{$user['phone']}}</h4>
            <h4>Adres e-mail: {{$user['email']}}</h4>

            <a href="/myAccount/edit/"><button type="button">Edytuj profil</button></a>
            <a href="/myAccount/delete/" onclick="return confirm('Czy napewno chcesz usunąć swoje konto?')">
                <button type="button">Usuń konto</button>
            </a>
        </ui>
    </div>
@endsection('content')
