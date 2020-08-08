@extends('template')

@section('content')
    <div>
        @if($options == true)
            <p align="center"><a href="/myAccount/addAdvert/"><button>Dodaj ogłoszenie</button></a></p>
        @endif
        @if(count($adverts)>0)
            <table class="table">
                <thead>
                <tr>
                    <th>Zdjęcie</th>
                    <th>Tytuł</th>
                    <th>Cena</th>
                    <th>Data dodania</th>
                    <th>Opcje</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($adverts as $advert)
                        <tr>
                            <td>
                                @if($advert->photo1 !=null)
                                    <img src="{{url('uploads/'.$advert->photo1)}}" alt="photo1" width="80" height="60">
                                @else
                                    <p>Brak zdjęcia</p>
                                @endif
                            </td>
                            <td>{{$advert->title}}</td>
                            <td>{{$advert->price}}</td>
                            <td>{{$advert->created_at}}</td>
                            <td>
                                <ul>
                                 <a href="{{url('/show/'.$advert->id)}}">Pokaż</a>
                                    @if($options == true)
                                        <a href="{{url('/myAccount/myAdverts/edit/'.$advert->id)}}">Edytuj</a>
                                        <a href="{{url('/myAccount/myAdverts/delete/'.$advert->id)}}" onclick="return confirm('Czy napewno usunąć ogłoszenie?')">Usuń</a>
                                    @endif
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h3 align="center">{{$footer.' '.count($adverts)}}</h3>
        @else
            <h1>Brak ogłoszeń</h1>
        @endif
    </div>
@endsection('content')
