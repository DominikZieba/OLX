@extends('template')

@section('content')
    <div>
        <h2>{{$advert['title']}}</h2>
        <h3>Cena: {{$advert['price']}}</h3>
        <h3>Opis:</h3>
        <h4>{{$advert['description']}}</h4>
        <h3>
            @for($i=1;$i<=8;$i++)
                @if($advert['photo'.$i]!=null)
                    <a href="{{url('uploads/'.$advert['photo'.$i])}}" target="_blank"><img src="{{url('uploads/'.$advert['photo'.$i])}}" alt="photo.{{$i}}" width="80" height="60"></a>
                @endif
            @endfor
        </h3>
        <h3>Data dodania: {{$advert['created_at']}}</h3>
        <a href="{{url()->previous()}}"><button>Powrót do listy ogłoszeń</button></a>
    </div>
@endsection('content')
